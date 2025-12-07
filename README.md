# 🚨 Rapid Rescue – PHP Emergency Management System

![PHP](https://img.shields.io/badge/Language-PHP-777BB4?style=flat\&logo=php\&logoColor=white) ![MySQL](https://img.shields.io/badge/Database-MySQL-00758F?style=flat\&logo=mysql\&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Frontend-Bootstrap-563D7C?style=flat\&logo=bootstrap\&logoColor=white) ![License](https://img.shields.io/badge/License-MIT-lightgrey?style=flat)

**Rapid Rescue** is a **web-based emergency management system** built with **PHP, MySQL, and Bootstrap**, designed to handle real-time emergency situations efficiently. It helps users report emergencies, manage ambulances, and coordinate rescue teams effectively.

---

## 🌟 Features

* **User Features:**

  * Submit emergency reports with location & details
  * View status of submitted requests

* **Admin Features:**

  * Manage rescue teams & assign emergencies
  * Manage ambulances and hospitals
  * View and update emergency statuses in real-time

* **Rescuer Features:**

  * Receive emergency notifications
  * Update status on ongoing rescue missions

* **Technical Features:**

  * PHP backend with MySQL database
  * Responsive frontend using Bootstrap
  * User roles & permission management (Admin, Rescuer, User)
  * Real-time emergency tracking

---

## 🛠 Tech Stack

* **Backend:** PHP (Core / MVC)
* **Frontend:** HTML, CSS, Bootstrap, JavaScript
* **Database:** MySQL
* **Server:** XAMPP / WAMP / Apache
* **Optional:** Google Maps API for location tracking

---

## ⚡ Installation & Setup

1. Clone the repository:

```bash
git clone https://github.com/RAYYANHASSAN321/Rapid-Rescue.git
```

2. Move files to your server root (`htdocs` for XAMPP)

3. Import the database:

   * Open `phpMyAdmin`
   * Create a new database (e.g., `rapid_rescue`)
   * Import `database.sql`

4. Configure `config.php` with your database credentials

5. Run the project in your browser:

```
http://localhost/rapid_rescue/
```

## 📖 Usage

* Users register and login to submit emergency reports
* Admin assigns rescue teams and ambulances
* Rescuers update status while handling emergencies
* Admin & users can track request progress in real-time

---

## 📂 Project Structure

```
rapid_rescue/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── includes/
│   ├── config.php
│   ├── header.php
│   └── footer.php
├── admin/
│   ├── dashboard.php
│   ├── manage_ambulances.php
│   └── manage_rescuers.php
├── user/
│   ├── submit_emergency.php
│   └── status.php
├── index.php
├── login.php
├── register.php
└── database.sql
```

---

## 📄 License

This project is **open-source** and licensed under the **MIT License**.

