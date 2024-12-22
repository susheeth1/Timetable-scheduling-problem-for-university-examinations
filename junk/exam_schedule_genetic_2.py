import csv
from fpdf import FPDF
import collections
import random
from copy import deepcopy
from datetime import datetime, timedelta
from multiprocessing import Pool
import os

# Update existing constants and global variables
room_details = []  # Will be loaded from CSV (includes seating capacity)
invigilators = []  # Will be loaded from CSV
students = []  # Will be loaded from CSV
courses = []  # Will be loaded from CSV
ineligible_students = []

# Define total_days for scheduling
total_days = [f"Day {i+1}" for i in range(10)]  # Example: 10 days available for exams

# Exam timing slots
MIDTERM_SLOTS = []
ENDTERM_SLOTS = []

# Define Classroom class to represent room allocations
class Classroom:
    def __init__(self, name, capacity, morning, afternoon, morning_invigilator, afternoon_invigilator):
        self.name = name
        self.capacity = capacity
        self.morning = morning
        self.afternoon = afternoon
        self.morning_invigilator = morning_invigilator
        self.afternoon_invigilator = afternoon_invigilator
        self.morning_students = []
        self.afternoon_students = []

# Define Schedule class to hold the exam schedule
class Schedule:
    def __init__(self):
        self.days = {day: [] for day in total_days}
        self.fitness = 0

# Define PDFReport class for PDF generation
class PDFReport:
    @staticmethod
    def generate_exam_schedule(schedule, filename, start_date, exam_type):
        os.makedirs("GENERATED_FOLDER", exist_ok=True)
        filepath = os.path.join("GENERATED_FOLDER", filename)
        pdf = FPDF()
        pdf.add_page()
        pdf.set_font("Arial", size=11)
        pdf.cell(200, 10, txt="Exam Schedule", ln=True, align="C")

        slots = MIDTERM_SLOTS if is_midterm(exam_type) else ENDTERM_SLOTS
        current_date = start_date
        for day, rooms in schedule.days.items():
            pdf.cell(200, 10, txt=f"{day} ({current_date.strftime('%Y-%m-%d')})", ln=True)
            for idx, room in enumerate(rooms):
                slot = slots[idx % len(slots)]
                pdf.cell(
                    200,
                    10,
                    txt=f"Room {room.name}: {slot} - Morning Exam: {room.morning}, Afternoon Exam: {room.afternoon}",
                    ln=True,
                )
            current_date += timedelta(days=1)
        pdf.output(filepath)

    @staticmethod
    def generate_invigilation_schedule(schedule, filename, exam_type):
        os.makedirs("GENERATED_FOLDER", exist_ok=True)
        filepath = os.path.join("GENERATED_FOLDER", filename)
        pdf = FPDF()
        pdf.add_page()
        pdf.set_font("Arial", size=10)
        pdf.cell(200, 10, txt="Invigilation Schedule", ln=True, align="C")

        slots = MIDTERM_SLOTS if is_midterm(exam_type) else ENDTERM_SLOTS
        for day, rooms in schedule.days.items():
            pdf.cell(200, 10, txt=f"{day}", ln=True)
            for idx, room in enumerate(rooms):
                slot = slots[idx % len(slots)]
                pdf.cell(
                    200,
                    10,
                    txt=f"Room {room.name}: {slot} - Morning: {room.morning_invigilator}, Afternoon: {room.afternoon_invigilator}",
                    ln=True,
                )
        pdf.output(filepath)

    @staticmethod
    def generate_student_room_schedule(schedule, filename, exam_type):
        os.makedirs("GENERATED_FOLDER", exist_ok=True)
        filepath = os.path.join("GENERATED_FOLDER", filename)
        pdf = FPDF()
        pdf.add_page()
        pdf.set_font("Arial", size=11)
        pdf.cell(200, 10, txt="Student Room Assignments", ln=True, align="C")

        slots = MIDTERM_SLOTS if is_midterm(exam_type) else ENDTERM_SLOTS
        for day, rooms in schedule.days.items():
            pdf.cell(200, 10, txt=f"{day}", ln=True)
            for idx, room in enumerate(rooms):
                slot = slots[idx % len(slots)]
                for student in room.morning_students:
                    pdf.cell(200, 10, txt=f"Student: {student} - Room: {room.name} ({slot})", ln=True)
                for student in room.afternoon_students:
                    pdf.cell(200, 10, txt=f"Student: {student} - Room: {room.name} ({slot})", ln=True)
        pdf.output(filepath)

# Function to load data from CSV files
def load_data():
    global room_details, invigilators, students, courses, ineligible_students

    # Load room details with seating capacity
    with open("UPLOAD_FOLDER/rooms.csv") as csv_file:
        csv_reader = csv.reader(csv_file)
        next(csv_reader)  # Skip the header row
        room_details = [
            {"name": row[0], "capacity": int(row[1])}
            for row in csv_reader
        ]

    # Load invigilators
    with open("UPLOAD_FOLDER/invigilators.csv") as csv_file:
        csv_reader = csv.reader(csv_file)
        next(csv_reader)  # Skip the header row
        invigilators = [row[0] for row in csv_reader]

    # Load student details with courses
    with open("UPLOAD_FOLDER/students.csv") as csv_file:
        csv_reader = csv.reader(csv_file)
        next(csv_reader)  # Skip the header row
        students = [{"name": row[0], "courses": row[1:]} for row in csv_reader]

    # Load courses
    with open("UPLOAD_FOLDER/courses.csv") as csv_file:
        csv_reader = csv.reader(csv_file)
        next(csv_reader)  # Skip the header row
        courses = [row[0] for row in csv_reader]

    # Load ineligibility list
    with open("UPLOAD_FOLDER/ineligible.csv") as csv_file:
        csv_reader = csv.reader(csv_file)
        next(csv_reader)  # Skip the header row
        ineligible_students = [row[0] for row in csv_reader]

    # Filter ineligible students
    students[:] = [student for student in students if student["name"] not in ineligible_students]

# Add a function to differentiate exam types
def is_midterm(exam_type):
    return exam_type == "midterm"

# Modify constraints to handle mid-term and end-term rules
def hconstraint_student_exams(schedule, exam_type):
    max_exams = 2 if is_midterm(exam_type) else 1
    for day in schedule.days:
        exams_per_student = collections.Counter()
        for room in schedule.days[day]:
            exams_per_student.update(room.morning_students)
            exams_per_student.update(room.afternoon_students)
        if any(count > max_exams for count in exams_per_student.values()):
            return False
    return True

def hconstraint_no_consecutive_invigilation(schedule):
    for day in schedule.days:
        for room in schedule.days[day]:
            if room.morning_invigilator == room.afternoon_invigilator:
                return False
    return True

def hconstraint_room_capacity(schedule):
    for day in schedule.days:
        for room in schedule.days[day]:
            morning_students = len(room.morning_students)
            afternoon_students = len(room.afternoon_students)
            room_capacity = next(
                (r["capacity"] for r in room_details if r["name"] == room.name), 0
            )
            if morning_students > room_capacity or afternoon_students > room_capacity:
                return False
    return True

# Add a function to generate the initial population
def generate_population(population_size):
    population = []
    for _ in range(population_size):
        schedule = Schedule()
        for day in total_days:
            schedule.days[day] = []
            assigned_students = set()
            for room in room_details:
                morning_exam = random.choice(courses)
                afternoon_exam = random.choice(courses)
                invigilator_morning = random.choice(invigilators)
                invigilator_afternoon = random.choice(invigilators)
                room_obj = Classroom(
                    name=room["name"],
                    capacity=room["capacity"],
                    morning=morning_exam,
                    afternoon=afternoon_exam,
                    morning_invigilator=invigilator_morning,
                    afternoon_invigilator=invigilator_afternoon
                )
                # Assign students to the room
                room_obj.morning_students = [
                    student["name"] for student in students
                    if morning_exam in student["courses"] and student["name"] not in assigned_students
                ][:room["capacity"]]
                assigned_students.update(room_obj.morning_students)

                room_obj.afternoon_students = [
                    student["name"] for student in students
                    if afternoon_exam in student["courses"] and student["name"] not in assigned_students
                ][:room["capacity"]]
                assigned_students.update(room_obj.afternoon_students)

                schedule.days[day].append(room_obj)
        population.append(schedule)
    return population

# Parallelized fitness calculation
def calculate_population_fitness(population, exam_type):
    with Pool() as pool:
        fitness_scores = pool.starmap(calculate_fitness, [(schedule, exam_type) for schedule in population])
    for i, schedule in enumerate(population):
        schedule.fitness = fitness_scores[i]

# Function to calculate the fitness of a schedule
def calculate_fitness(schedule, exam_type):
    fitness = 0
    # Check constraints and increment fitness for satisfied constraints
    if hconstraint_student_exams(schedule, exam_type):
        fitness += 1
    if hconstraint_no_consecutive_invigilation(schedule):
        fitness += 1
    if hconstraint_room_capacity(schedule):
        fitness += 1
    return fitness

# Add parent selection function using roulette wheel selection
def roulette_wheel_selection(population):
    total_fitness = sum(schedule.fitness for schedule in population)
    pick = random.uniform(0, total_fitness)
    current = 0
    for schedule in population:
        current += schedule.fitness
        if current > pick:
            return schedule

# Adaptive mutation

def adaptive_mutation_rate(generation, max_generations, base_rate=0.3):
    return base_rate * (1 - (generation / max_generations))

# Continuation of Crossover Function
def crossover(parent_a, parent_b):
    child_a = deepcopy(parent_a)
    child_b = deepcopy(parent_b)

    # Single-point crossover on days
    crossover_point = random.randint(0, len(total_days) - 1)
    for day in total_days[crossover_point:]:
        child_a.days[day], child_b.days[day] = child_b.days[day], child_a.days[day]

    return child_a, child_b

# Mutation function
def mutate(schedule, mutation_probability):
    for day in total_days:
        if random.random() < mutation_probability:
            for room in schedule.days[day]:
                room.morning = random.choice(courses)
                room.afternoon = random.choice(courses)
                room.morning_invigilator = random.choice(invigilators)
                room.afternoon_invigilator = random.choice(invigilators)


# Continuation of Main Genetic Algorithm
def genetic_algo_with_pdfs(population_size, max_generations, crossover_probability, mutation_probability, exam_type, start_date):
    load_data()

    # Take user input for time slots
    global MIDTERM_SLOTS, ENDTERM_SLOTS
    if exam_type == "midterm":
        print("Enter 3 slots for midterm exams (e.g., HH:MM AM/PM - HH:MM AM/PM):")
        MIDTERM_SLOTS = [input(f"Slot {i + 1}: ").strip() for i in range(3)]
    elif exam_type == "endterm":
        print("Enter 2 slots for endterm exams (e.g., HH:MM AM/PM - HH:MM AM/PM):")
        ENDTERM_SLOTS = [input(f"Slot {i + 1}: ").strip() for i in range(2)]

    population = generate_population(population_size)
    best_schedule = None

    for generation in range(max_generations):
        calculate_population_fitness(population, exam_type)
        population.sort(key=lambda s: s.fitness, reverse=True)

        if best_schedule is None or population[0].fitness > best_schedule.fitness:
            best_schedule = deepcopy(population[0])

        new_population = population[:10]  # Elitism: Carry over top 10 schedules

        while len(new_population) < population_size:
            parent_a = roulette_wheel_selection(population)
            parent_b = roulette_wheel_selection(population)
            if random.random() < crossover_probability:
                child_a, child_b = crossover(parent_a, parent_b)
            else:
                child_a, child_b = deepcopy(parent_a), deepcopy(parent_b)

            mutation_rate = adaptive_mutation_rate(generation, max_generations, mutation_probability)
            mutate(child_a, mutation_rate)
            mutate(child_b, mutation_rate)
            new_population.extend([child_a, child_b])

        population = new_population[:population_size]

        if best_schedule.fitness == 3:  # Assuming max fitness score
            break

    PDFReport.generate_exam_schedule(best_schedule, "exam_schedule.pdf", start_date, exam_type)
    PDFReport.generate_invigilation_schedule(best_schedule, "invigilation_schedule.pdf", exam_type)
    PDFReport.generate_student_room_schedule(best_schedule, "student_room_schedule.pdf", exam_type)

    return best_schedule

if __name__ == "__main__":
    load_data()
    exam_type = input("Enter the type of exam (midterm/endterm): ").strip().lower()
    start_date_input = input("Enter the start date for the exams (YYYY-MM-DD): ").strip()

    try:
        start_date = datetime.strptime(start_date_input, "%Y-%m-%d")
        result = genetic_algo_with_pdfs(
            population_size=50,
            max_generations=100,
            crossover_probability=0.8,
            mutation_probability=0.2,
            exam_type=exam_type,
            start_date=start_date,
        )
        print("Exam schedule successfully generated and saved as PDF.")
    except Exception as e:
        print(f"Error: {e}")
