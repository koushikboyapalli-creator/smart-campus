# Smart Campus: Student Complaint & Maintenance Redressal Portal

A lightweight, web-based complaint lodging and tracking system designed for campus hostels and department infrastructure. Students can report maintenance issues across various categories, and campus administrators can track and transition ticket resolution states in real time.

---

## Project URLs & Quick Links

Once your local Apache server (XAMPP/WAMP) is running, access the portal via these local links:

* **Student Portal (Submit & Track Complaints):**  
  [http://localhost/smart-campus/index.php](http://localhost/smart-campus/index.php)

* **Admin Maintenance Control Center:**  
  [http://localhost/smart-campus/admin.php](http://localhost/smart-campus/admin.php)

* **Local Database Manager (phpMyAdmin):**  
  [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

---

## Tech Stack

* **Frontend:** Semantic HTML5, Minimal CSS3, Vanilla JavaScript (ES6 client-side validation)
* **Backend:** PHP (Prepared Statements via MySQLi)
* **Database:** MySQL

---

## Repository Structure

```text
smart-campus/
├── db.php             # MySQL database connection configuration
├── index.php          # Student grievance intake form & live complaint feed
├── admin.php          # Administrator ticket management dashboard
├── update_status.php  # Backend endpoint to handle status transitions
├── style.css          # Clean, lightweight UI styles
├── script.js          # Client-side input validation
├── schema.sql         # Database and table definitions
└── README.md          # Project documentation
