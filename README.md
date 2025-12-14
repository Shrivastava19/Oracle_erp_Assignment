# Mock Course Page - Oracle Fusion Lease Accounting

This is a mock course page for "Oracle Fusion Lease Accounting - Identifying Leasing Arrangements". It embeds a YouTube video, and upon completion, triggers a feedback popup.

## Technology Stack
- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL

## Setup Instructions

1. **Prerequisites:**
   - Install XAMPP (which includes PHP and MySQL) from https://www.apachefriends.org/
   - Start Apache and MySQL from XAMPP control panel

2. **Database Setup:**
   - Open phpMyAdmin (usually at http://localhost/phpmyadmin)
   - Create a database named `course_feedback`
   - Import the `setup.sql` file or run the SQL commands manually

3. **Configure Database Connection:**
   - In `feedback.php`, update the `$username` and `$password` variables with your MySQL credentials (default for XAMPP is username: 'root', password: '')

4. **Run the Application:**
   - Place the project files in `C:\xampp\htdocs\assignment\` (create the folder)
   - Open `http://localhost/assignment/index.html` in your browser.

## Features
- Embedded YouTube video
- Feedback popup triggered when video ends
- Form submission to save feedback in MySQL database
- Mobile responsive design

## Usage
1. Load the page.
2. Watch the YouTube video.
3. When the video ends, a feedback popup will appear.
4. Fill out the rating and feedback, then submit.

## Notes
- Ensure MySQL is running before submitting feedback.
- The popup can be closed by clicking the 'X' or outside the popup area.
