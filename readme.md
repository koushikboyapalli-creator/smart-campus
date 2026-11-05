# Smart Campus Complaint & Maintenance Portal

A lightweight, web-based campus maintenance tracking system built with **PHP** and **MySQL**, designed for students to easily lodge infrastructure complaints and for administrators to manage and resolve them efficiently.

---

## 🚀 Features

* **Student Portal (`index.php`)**:
  * Lodge campus complaints with student name, hostel/room location, defect category, and detailed issue descriptions.
  * Real-time live tracking of submitted tickets and their statuses (`Pending`, `In Progress`, `Resolved`).
* **Admin Dashboard (`admin.php`)**:
  * View all submitted campus tickets in one centralized table.
  * Update ticket statuses dynamically to keep students informed.
* **Responsive UI**: Clean, modern card-based interface styled for fast navigation and ease of use.

---

## 🛠️ Tech Stack

* **Backend**: PHP (MySQLi)
* **Database**: MySQL (via XAMPP / phpMyAdmin)
* **Frontend**: HTML5, CSS3, JavaScript

---

## ⚙️ Prerequisites & Setup Guide

To run this project locally on your machine, follow these steps:

### 1. Install XAMPP
Ensure you have [XAMPP](https://www.apachefriends.org/index.html) installed with **Apache** and **MySQL** services available.

### 2. Clone or Place Project in `htdocs`
Place your project folder inside the XAMPP root directory:
```text
C:\xampp\htdocs\smart-campus
