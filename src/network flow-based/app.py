import streamlit as st
from scheduler_logic import ExamScheduler, SAMPLE_DATA, create_pdf
import pandas as pd

def add_background():
    # Custom CSS to add a background image
    st.markdown(
        """
        <style>
        body {
            background-image: url("bgimg.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        </style>
        """,
        unsafe_allow_html=True
    )

def main():
    # Set up page configuration
    st.set_page_config(page_title="Exam Scheduler", layout="wide")
    
    # Add background image
    add_background()
    
    # Main title
    st.title("Examination Scheduling System")
    
    # Sidebar for configuration
    st.sidebar.header("Configuration")
    st.sidebar.info("Using sample dataset. You can replace this with your own data.")
    
    # Initialize scheduler with sample data
    scheduler = ExamScheduler(SAMPLE_DATA)
    
    # Main content area
    col1, col2 = st.columns([2, 1])
    
    with col1:
        st.subheader("Current Dataset Overview")
        
        # Display sample data tables
        if st.checkbox("Show Students"):
            st.write("Students:")
            st.dataframe(pd.DataFrame(SAMPLE_DATA["students"]))
            
        if st.checkbox("Show Courses"):
            st.write("Courses:")
            st.dataframe(pd.DataFrame(SAMPLE_DATA["courses"]))
            
        if st.checkbox("Show Rooms"):
            st.write("Rooms:")
            st.dataframe(pd.DataFrame(SAMPLE_DATA["rooms"]))
            
        if st.checkbox("Show Invigilators"):
            st.write("Invigilators:")
            st.dataframe(pd.DataFrame(SAMPLE_DATA["invigilators"]))
    
    with col2:
        st.subheader("Generate Schedule")
        if st.button("Generate Schedule", key="generate"):
            with st.spinner("Generating schedule..."):
                schedule = scheduler.generate_schedule()
                
                # Store schedule in session state
                st.session_state['schedule'] = schedule
                
                # Create download button for PDF
                pdf = create_pdf(schedule)
                st.download_button(
                    label="Download Schedule PDF",
                    data=pdf.output(dest="S").encode("latin-1"),
                    file_name="exam_schedule.pdf",
                    mime="application/pdf"
                )
    
    # Display generated schedule
    if 'schedule' in st.session_state:
        st.subheader("Generated Schedule")
        schedule_df = pd.DataFrame(st.session_state['schedule'])
        st.dataframe(schedule_df)
        
        # Show statistics
        st.subheader("Schedule Statistics")
        stats = {
            "Total Exams Scheduled": len(schedule_df),
            "Unique Rooms Used": len(schedule_df['RoomID'].unique()),
            "Date Range": f"{schedule_df['Date'].min()} to {schedule_df['Date'].max()}"
        }
        st.json(stats)

if __name__ == "__main__":
    main()
