# Mock Course Page - Oracle Fusion Lease Accounting

This is a comprehensive course management system with a mock course page for "Oracle Fusion Lease Accounting - Identifying Leasing Arrangements". It includes an embedded YouTube video, user feedback collection, and a secure admin dashboard for analyzing feedback.

## Features

### User Features
- Embedded YouTube video (feedback popup triggers when video ends)
- Feedback collection form with name, email, rating, and comments
- Mobile responsive design
- Clean and intuitive UI

### Admin Features
- Secure login system with credentials
- Dashboard with statistics cards (total feedback, average rating, median rating, 5-star count)
- Comprehensive feedback table with all user information
- Filter feedback by rating and date range
- Real-time statistics calculations

## Technology Stack
- Frontend: HTML5, CSS3, JavaScript (Vanilla)
- Backend: PHP 7.0+
- Database: MySQL 5.7+
- Server: Apache (via XAMPP)

## Setup Instructions

### Prerequisites
- XAMPP installed (https://www.apachefriends.org/)
- Windows, macOS, or Linux

### Step 1: Download and Install XAMPP
1. Download XAMPP from https://www.apachefriends.org/download.html
2. Run the installer and follow the setup wizard
3. Keep the default installation directory (`C:\xampp` on Windows)
4. Ensure Apache, MySQL, and phpMyAdmin are selected during installation

### Step 2: Start XAMPP Services
1. Open the XAMPP Control Panel (`C:\xampp\xampp-control.exe` on Windows)
2. Click "Start" next to "Apache"
3. Click "Start" next to "MySQL"
4. Both should show "Running" in green

### Step 3: Set Up the Database
1. Open your browser and navigate to `http://localhost/phpmyadmin`
2. Login with:
   - Username: `root`
   - Password: (leave blank)
3. Click "Databases" → Create a new database named `course_feedback`
4. Select the `course_feedback` database
5. Click "Import" tab → Choose `setup.sql` from your project folder → Click "Go"

### Step 4: Deploy Project Files
1. Navigate to `C:\xampp\htdocs` on Windows (or equivalent on macOS/Linux)
2. Create a folder named `assignment` if it doesn't exist
3. Copy all project files into `C:\xampp\htdocs\assignment`:
   - index.html
   - style.css
   - script.js
   - feedback.php
   - admin_login.html
   - admin_auth.php
   - admin_dashboard.html
   - admin_get_feedback.php
   - admin_logout.php
   - admin.css
   - admin.js
   - setup.sql (optional)
   - README.md (optional)

### Step 5: Access the Application
1. **Course Page**: Open `http://localhost/assignment/index.html`
2. **Admin Panel**: Click "Admin Panel" link or go to `http://localhost/assignment/admin_login.html`

## Usage

### User Workflow
1. Navigate to the course page
2. Watch the embedded YouTube video
3. When the video ends, a feedback popup appears automatically
4. Fill in your name, email, rating (1-5), and feedback
5. Click "Submit Feedback" to save your response

### Admin Workflow
1. Access the Admin Panel via the "Admin Panel" link on the course page
2. **Login Credentials:**
   - Username: `admin`
   - Password: `admin123`
   - Or Username: `root`, Password: `root`
3. View the dashboard with:
   - **Statistics Cards**: Total feedback, average rating, median rating, and 5-star feedback count
   - **Feedback Table**: All user submissions with name, email, rating, and comments
4. **Apply Filters**:
   - Filter by rating (1-5 stars)
   - Filter by date range (from and to dates)
   - Click "Apply Filters" to view filtered results
   - Click "Reset" to clear all filters
5. **Logout**: Click the "Logout" button to end the admin session

## Database Schema

### feedback table
| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary Key |
| name | VARCHAR(100) | User's name |
| email | VARCHAR(100) | User's email |
| rating | INT | Rating (1-5) |
| feedback | TEXT | User's feedback text |
| submitted_at | TIMESTAMP | Submission timestamp |

### admin_users table
| Column | Type | Description |
|--------|------|-------------|
| id | INT | Primary Key |
| username | VARCHAR(50) | Admin username |
| password | VARCHAR(255) | Hashed password (bcrypt) |
| created_at | TIMESTAMP | Creation timestamp |

## Default Admin Credentials
- **Username**: `admin` | **Password**: `admin123`
- **Username**: `root` | **Password**: `root`

**Note**: Change these credentials in production by updating the admin_users table in phpMyAdmin.

## Security Features
- Session-based authentication
- Password hashing using bcrypt
- SQL prepared statements to prevent SQL injection
- HTML escaping to prevent XSS attacks
- CSRF protection through session management

## File Descriptions

| File | Purpose |
|------|---------|
| index.html | Main course page with embedded video |
| feedback.php | Backend for feedback submission |
| admin_login.html | Admin login page |
| admin_auth.php | Authentication handler |
| admin_dashboard.html | Admin dashboard interface |
| admin_get_feedback.php | API for fetching and filtering feedback |
| admin_logout.php | Logout handler |
| admin.css | Styling for admin panel |
| admin.js | Frontend logic for dashboard |
| style.css | Styling for course page |
| script.js | Frontend logic for course page |
| setup.sql | Database setup script |

## Troubleshooting

### Database Connection Failed
- Ensure MySQL service is running in XAMPP Control Panel
- Check database credentials in `feedback.php` and `admin_*.php` files
- Default: username `root`, password empty (for XAMPP)

### Popup Doesn't Appear
- Open browser DevTools (F12) → Console to check for errors
- Ensure JavaScript is enabled
- Check video player is working

### Admin Login Fails
- Verify credentials: `admin` / `admin123` or `root` / `root`
- Check admin_users table exists and has data in phpMyAdmin
- Clear browser cookies and try again

### Files Not Found
- Ensure files are in `C:\xampp\htdocs\assignment\` (or equivalent)
- Check URL: `http://localhost/assignment/index.html`

## Performance Optimization
- Consider indexing the `submitted_at` and `rating` columns for large datasets
- Implement pagination for feedback table when data exceeds 1000 records

## Future Enhancements
- Export feedback to CSV/Excel
- Email notifications for new feedback
- Advanced analytics and charts
- Multi-user admin accounts with role-based access
- Feedback editing/deletion capabilities
- Automated email responses to feedback submitters

## Support
For issues or questions, ensure all XAMPP services are running and database is properly configured.

---
**Version**: 1.1  
**Last Updated**: December 2025
