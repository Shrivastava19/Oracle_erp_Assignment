# Mock Course Page - Oracle Fusion Lease Accounting

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)
[![PHP Version](https://img.shields.io/badge/PHP-7.0%2B-blue.svg)](https://www.php.net/)
[![MySQL Version](https://img.shields.io/badge/MySQL-5.7%2B-blue.svg)](https://www.mysql.com/)

A comprehensive course management system with a mock course page for "Oracle Fusion Lease Accounting - Identifying Leasing Arrangements". It includes an embedded YouTube video, real-time user feedback collection, and a secure admin dashboard for analyzing feedback with advanced filtering and statistics.

## Quick Start

Get the application running in 5 minutes:

```bash
# 1. Start XAMPP (Apache & MySQL)
# 2. Create database: course_feedback
# 3. Import setup.sql
# 4. Copy files to C:\xampp\htdocs\assignment\
# 5. Open http://localhost/assignment/
```

**Admin Credentials:** `admin` / `admin123`

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
- XAMPP installed ([Download](https://www.apachefriends.org/))
- Windows, macOS, or Linux
- 500MB free disk space
- Modern web browser

### Installation Steps

#### 1️⃣ Install XAMPP
- Download from [apachefriends.org](https://www.apachefriends.org/download.html)
- Run installer with default settings
- Select Apache, MySQL, and phpMyAdmin

#### 2️⃣ Start Services
- Open XAMPP Control Panel
- Click "Start" for Apache and MySQL
- Both should show "Running" in green

#### 3️⃣ Set Up Database
- Navigate to `http://localhost/phpmyadmin`
- Login (username: `root`, password: empty)
- Create new database: `course_feedback`
- Click "Import" and select `setup.sql`

#### 4️⃣ Deploy Files
- Copy all files to `C:\xampp\htdocs\assignment\`
- Ensure these files are present:
  - `index.html`, `style.css`, `script.js`
  - `feedback.php`, `setup.sql`
  - `admin_login.html`, `admin_auth.php`
  - `admin_dashboard.html`, `admin_get_feedback.php`
  - `admin_logout.php`, `admin.css`, `admin.js`

#### 5️⃣ Access the Application
#### 5️⃣ Access the Application
- **Course Page**: http://localhost/assignment/index.html
- **Admin Panel**: http://localhost/assignment/admin_login.html

## Usage

### 👤 User Workflow
1. Navigate to the course page
2. Watch the embedded YouTube video
3. When video ends, feedback popup appears
4. Fill in name, email, rating, and comments
5. Click "Submit Feedback"

### 🔐 Admin Workflow
1. Access Admin Panel via the link
2. Login with credentials:
   - Username: `admin` | Password: `admin123`
   - Or: `root` | `root`
3. View dashboard with statistics:
   - Total feedback count
   - Average rating
   - Median rating
   - 5-star feedback count
4. Review feedback table with all submissions
5. Filter by rating (1-5 stars) or date range
6. Click "Logout" to end session

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

### ❌ Database Connection Failed
- Ensure MySQL service is running in XAMPP Control Panel
- Check database credentials in `feedback.php`
- Default: username `root`, password empty

### ❌ Popup Doesn't Appear
- Open browser DevTools (F12) → Console for errors
- Enable JavaScript in browser settings
- Verify video player is working

### ❌ Admin Login Fails
- Use credentials: `admin` / `admin123`
- Check `admin_users` table exists in phpMyAdmin
- Clear browser cookies and retry

### ❌ Files Not Found (404 Error)
- Verify files are in `C:\xampp\htdocs\assignment\`
- Check URL: `http://localhost/assignment/index.html`
- Restart Apache service

## Performance Optimization
- Index `submitted_at` and `rating` columns for large datasets
- Implement pagination when feedback exceeds 1000 records
- Cache frequently accessed queries

## Future Enhancements
- Export feedback to CSV/Excel
- Email notifications for new feedback
- Advanced analytics and charts
- Multi-user admin accounts with roles
- Feedback editing/deletion
- Automated email responses
- Two-factor authentication

## Security Features
- ✅ Session-based authentication
- ✅ Bcrypt password hashing
- ✅ Prepared statements (SQL injection prevention)
- ✅ HTML escaping (XSS prevention)
- ✅ CSRF protection

## Contributing
Contributions welcome! Please fork and submit pull requests for any improvements.

## License
MIT License - See LICENSE file for details

## Support & Issues
Found a bug? Have a suggestion? [Open an issue](../../issues) or contact the maintainers.

---

**Version**: 1.2  
**Last Updated**: December 2025  
**Author**: Yash Shrivastava 
**Project Status**: ✅ Active

