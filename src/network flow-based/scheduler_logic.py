import pandas as pd
import numpy as np
from datetime import datetime, timedelta
import networkx as nx
from fpdf import FPDF
import json

# Sample dataset as dictionaries (would normally come from Excel/CSV)
SAMPLE_DATA = {
    "students": [
        {"StudentID": "S001", "Name": "John Doe", "Courses": ["CS101", "MATH102"], "ExamTypeLimit": "2 mid-terms or 1 end-term"},
        {"StudentID": "S002", "Name": "Jane Smith", "Courses": ["CS101", "PHY101"], "ExamTypeLimit": "2 mid-terms or 1 end-term"},
        {"StudentID": "S003", "Name": "Bob Wilson", "Courses": ["MATH102", "PHY101"], "ExamTypeLimit": "2 mid-terms or 1 end-term"}
    ],
    
    "courses": [
        {"CourseID": "CS101", "CourseName": "Introduction to Programming", "ExamType": "Mid-term", 
         "Duration": 120, "PreferredDate": "2024-11-15", "RoomPreference": ["R001"], "InvigilatorCount": 2},
        {"CourseID": "MATH102", "CourseName": "Calculus I", "ExamType": "Mid-term",
         "Duration": 120, "PreferredDate": "2024-11-16", "RoomPreference": ["R002"], "InvigilatorCount": 1},
        {"CourseID": "PHY101", "CourseName": "Physics I", "ExamType": "Mid-term",
         "Duration": 120, "PreferredDate": "2024-11-17", "RoomPreference": ["R001"], "InvigilatorCount": 1}
    ],
    
    "rooms": [
        {"RoomID": "R001", "RoomName": "Lab A", "Capacity": 30, 
         "AvailableDates": ["2024-11-15", "2024-11-16", "2024-11-17"]},
        {"RoomID": "R002", "RoomName": "Lab B", "Capacity": 25,
         "AvailableDates": ["2024-11-15", "2024-11-16", "2024-11-17"]}
    ],
    
    "invigilators": [
        {"InvigilatorID": "I001", "Name": "Prof. Smith", "MaxSlotsPerDay": 2,
         "Availability": {"2024-11-15": [1, 2], "2024-11-16": [1, 2], "2024-11-17": [1, 2]},
         "NonContinuous": True},
        {"InvigilatorID": "I002", "Name": "Prof. Johnson", "MaxSlotsPerDay": 2,
         "Availability": {"2024-11-15": [1, 2], "2024-11-16": [1, 2], "2024-11-17": [1, 2]},
         "NonContinuous": True}
    ]
}

class ExamScheduler:
    def __init__(self, data):
        self.data = data
        self.graph = nx.DiGraph()
        self.schedule = []
        
    def create_network(self):
        """Create the network flow graph for scheduling"""
        # Add source and sink nodes
        self.graph.add_node('source')
        self.graph.add_node('sink')
        
        # Add exam nodes and connect to source
        for course in self.data["courses"]:
            exam_node = f"exam_{course['CourseID']}"
            self.graph.add_node(exam_node, course_info=course)
            self.graph.add_edge('source', exam_node, capacity=1)
            
        # Add time slot nodes for each available date
        time_slots = {}
        for room in self.data["rooms"]:
            for date in room["AvailableDates"]:
                for slot in [1, 2]:  # Two slots per day
                    slot_node = f"slot_{date}_{slot}"
                    if slot_node not in time_slots:
                        self.graph.add_node(slot_node)
                        time_slots[slot_node] = True
                        
        # Connect exams to valid time slots
        for course in self.data["courses"]:
            exam_node = f"exam_{course['CourseID']}"
            preferred_date = course["PreferredDate"]
            
            for room in self.data["rooms"]:
                if room["RoomID"] in course["RoomPreference"]:
                    for date in room["AvailableDates"]:
                        if preferred_date is None or date == preferred_date:
                            for slot in [1, 2]:
                                slot_node = f"slot_{date}_{slot}"
                                self.graph.add_edge(exam_node, slot_node, capacity=1)
                                
        # Add room nodes and connect to sink
        for room in self.data["rooms"]:
            for date in room["AvailableDates"]:
                for slot in [1, 2]:
                    room_node = f"room_{room['RoomID']}_{date}_{slot}"
                    self.graph.add_node(room_node)
                    self.graph.add_edge(room_node, 'sink', capacity=1)
                    
                    # Connect time slots to rooms
                    slot_node = f"slot_{date}_{slot}"
                    self.graph.add_edge(slot_node, room_node, capacity=room["Capacity"])

    def generate_schedule(self):
        """Generate the exam schedule using network flow"""
        self.create_network()
        
        # Find maximum flow
        flow_value, flow_dict = nx.maximum_flow(self.graph, 'source', 'sink')
        
        # Convert flow to schedule
        self.schedule = []
        for exam_node in [n for n in self.graph.nodes() if n.startswith('exam_')]:
            course_info = self.graph.nodes[exam_node]['course_info']
            
            for slot_node, flow in flow_dict[exam_node].items():
                if flow > 0:
                    date, slot = slot_node.replace('slot_', '').split('_')
                    
                    # Find assigned room
                    for room_node, room_flow in flow_dict[slot_node].items():
                        if room_flow > 0:
                            room_id = room_node.split('_')[1]
                            
                            # Assign invigilators
                            assigned_invigilators = self.assign_invigilators(date, int(slot))
                            
                            self.schedule.append({
                                'CourseID': course_info['CourseID'],
                                'CourseName': course_info['CourseName'],
                                'Date': date,
                                'TimeSlot': int(slot),
                                'RoomID': room_id,
                                'Invigilators': assigned_invigilators
                            })
        
        return self.schedule

    def assign_invigilators(self, date, time_slot):
        """Assign invigilators to an exam slot"""
        assigned = []
        for invigilator in self.data["invigilators"]:
            if (date in invigilator["Availability"] and 
                time_slot in invigilator["Availability"][date]):
                assigned.append(invigilator["Name"])
                if len(assigned) >= 2:  # Limit to 2 invigilators per exam
                    break
        return assigned

def create_pdf(schedule):
    """Create PDF output of the schedule"""
    pdf = FPDF()
    pdf.add_page()
    pdf.set_font("Arial", "B", 16)
    pdf.cell(0, 10, "Examination Schedule", ln=True, align="C")
    pdf.ln(10)
    
    # Add table headers
    pdf.set_font("Arial", "B", 12)
    headers = ["Date", "Time Slot", "Course", "Room", "Invigilators"]
    col_widths = [30, 20, 50, 30, 60]
    
    for i, header in enumerate(headers):
        pdf.cell(col_widths[i], 10, header, border=1)
    pdf.ln()
    
    # Add schedule data
    pdf.set_font("Arial", "", 10)
    for exam in schedule:
        pdf.cell(30, 10, exam["Date"], border=1)
        pdf.cell(20, 10, f"Slot {exam['TimeSlot']}", border=1)
        pdf.cell(50, 10, f"{exam['CourseID']}: {exam['CourseName']}", border=1)
        pdf.cell(30, 10, exam["RoomID"], border=1)
        pdf.cell(60, 10, ", ".join(exam["Invigilators"]), border=1)
        pdf.ln()
    
    return pdf