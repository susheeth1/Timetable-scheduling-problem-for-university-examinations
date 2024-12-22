from flask import Flask, render_template, request, redirect, url_for, flash, send_from_directory, Response
import os
from datetime import datetime
from exam_schedule_genetic import genetic_algo_with_pdfs  # Import your scheduling function

app = Flask(__name__)
app.secret_key = "supersecretkey"  # Use a strong secret key in production

# Define upload and generated folders
UPLOAD_FOLDER = "UPLOAD_FOLDER"
GENERATED_FOLDER = "GENERATED_FOLDER"

# Create folders if not exist
os.makedirs(UPLOAD_FOLDER, exist_ok=True)
os.makedirs(GENERATED_FOLDER, exist_ok=True)

# Configure upload folder
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# Route: Login page
@app.route("/", methods=["GET", "POST"])
def login():
    if request.method == "POST":
        username = request.form["username"]
        password = request.form["password"]

        # Dummy credentials (replace with real authentication logic)
        valid_users = {
            "admin": "admin123",
            "faculty": "faculty2024"
        }

        if valid_users.get(username) == password:
            return redirect(url_for("upload"))
        else:
            flash("Invalid username or password", "danger")
    return render_template("login.html")

# Route: Upload page
@app.route("/upload", methods=["GET", "POST"])
def upload():
    if request.method == "POST":
        # Collect form inputs
        exam_type = request.form.get("examType")
        exam_date = request.form.get("examDate")

        if not exam_type or not exam_date:
            flash("Please provide all required inputs.", "danger")
            return redirect(url_for("upload"))

        # Save uploaded files
        files = {
            "RoomsList": "rooms.csv",
            "invigilatorsList": "invigilators.csv",
            "studentsList": "students.csv",
            "coursesList": "courses.csv",
            "ineligibleList": "ineligible.csv",
        }

        for form_name, filename in files.items():
            file = request.files.get(form_name)
            if file:
                file.save(os.path.join(UPLOAD_FOLDER, filename))

        # Trigger the exam schedule generation
        try:
            start_date = datetime.strptime(exam_date, "%Y-%m-%d")
            genetic_algo_with_pdfs(
                population_size=50,
                max_generations=100,
                crossover_probability=0.8,
                mutation_probability=0.2,
                exam_type=exam_type,
                start_date=start_date
            )
            flash("Exam schedule generated successfully!", "success")
            return redirect(url_for("download"))
        except Exception as e:
            flash(f"Error generating schedule: {e}", "danger")
            return redirect(url_for("upload"))

    return render_template("upload.html")

# Route: Download and View page
@app.route("/download")
def download():
    # List generated files in the folder
    files = os.listdir(GENERATED_FOLDER)
    return render_template("download.html", files=files)

# Route: View specific file
@app.route("/view/<filename>")
def view_file(filename):
    filepath = os.path.join(GENERATED_FOLDER, filename)
    try:
        with open(filepath, "rb") as f:
            file_content = f.read()
        return Response(file_content, mimetype="application/pdf")
    except FileNotFoundError:
        flash("File not found.", "danger")
        return redirect(url_for("download"))

# Route: Download specific file
@app.route("/download/<filename>")
def download_file(filename):
    return send_from_directory(GENERATED_FOLDER, filename, as_attachment=True)

# Run the app
if __name__ == "__main__":
    app.run(debug=True)
