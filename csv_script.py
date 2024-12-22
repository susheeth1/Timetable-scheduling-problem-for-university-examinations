import pandas as pd
import random

# Generate datasets based on the user's specifications

# Rooms dataset: 30 rooms with random capacities between 20 and 100
rooms_data = {"Room Name": [f"Room {i+1}" for i in range(30)],
              "Capacity": [random.randint(20, 100) for _ in range(30)]}
rooms_df = pd.DataFrame(rooms_data)

# Invigilators dataset: 25 invigilators
invigilators_data = {"Invigilator Name": [f"Invigilator {i+1}" for i in range(25)]}
invigilators_df = pd.DataFrame(invigilators_data)

# Courses dataset: 50 courses
courses_data = {"Course Name": [f"Course {i+1}" for i in range(50)]}
courses_df = pd.DataFrame(courses_data)

# Students dataset: 1000 students, each with 5 random courses
students_data = {"Student Name": [f"Student {i+1}" for i in range(1000)]}
for i in range(1, 6):  # Adding 5 course columns for each student
    students_data[f"Course {i}"] = [random.choice(courses_data["Course Name"]) for _ in range(1000)]
students_df = pd.DataFrame(students_data)

# Ineligible students dataset: Randomly selecting 50 students as ineligible
ineligible_students_data = {"Student Name": random.sample(students_data["Student Name"], 50)}
ineligible_students_df = pd.DataFrame(ineligible_students_data)

# Save the datasets as CSV files
rooms_df.to_csv("rooms.csv", index=False)
invigilators_df.to_csv("invigilators.csv", index=False)
courses_df.to_csv("courses.csv", index=False)
students_df.to_csv("students.csv", index=False)
ineligible_students_df.to_csv("ineligible.csv", index=False)

"Datasets created and saved successfully."
