# 🎓 Faculty of Computing & IT Management System

A dynamic, full-stack web application designed for academic institutions. This portal serves as a digital bridge between the **Faculty of Computing and Information Technology** and its students, providing a streamlined experience for information access and content management.

---

## 🚀 Key Features

* **Dynamic Academic Directory:** Displays faculty departments and programs fetched directly from the database.
* **Integrated News System:** A dedicated section for the latest faculty updates and announcements.
* **Role-Based Access Control (RBAC):**
    * **Admin (مسؤول):** Full administrative privileges to add, update, and delete news, departments, and academic programs.
    * **Student (طالب):** Access to personal profiles and college resources.
* **Secure Authentication:** User registration and login system utilizing PHP sessions and `password_hash` for data security.
* **Responsive UI:** A clean, modern interface styled with the **Cairo** Google Font and custom CSS, optimized for all devices.
* **Contact & Interaction:** Built-in contact form for direct inquiries.

---

## 🛠️ Technical Stack

* **Language:** PHP (Server-side logic)
* **Database:** MySQL (Relational database management)
* **Frontend:** HTML5, CSS3 (Custom styling & Flexbox)
* **Environment:** Optimized for XAMPP / WAMP stacks.

---

## 📂 Project Structure

* `index.php` - Homepage featuring academic programs.
* `department.php` - Academic departments listing and management.
* `news.php` - Latest news and faculty updates feed.
* `contact.php` - Centralized database connection configuration.
* `style.css` - Custom styling using the "Cairo" typography.
* `users.sql` - Complete database schema including tables for users and programs.
* `delete.php` & `delete_news.php` - Administrative backend handlers for content removal.

---

## 💻 Installation & Setup

1.  **Environment:** Ensure you have **XAMPP** or a similar local server installed.
2.  **Download:** Clone or download this repository into your `htdocs` folder.
3.  **Database Setup:**
    * Open **phpMyAdmin**.
    * Create a new database named `unversity`.
    * Import the `users.sql` file provided in the repository to create the necessary tables.
4.  **Connection:** The system is pre-configured to connect to `localhost` with `root` (no password). Adjust `contact.php` if your local settings differ.
5.  **Run:** Open your browser and go to `http://localhost/your-folder-name/index.php`.

---

## 🔐 Security Overview

The project implements several security best practices:
* **Prepared Statements:** To prevent SQL Injection attacks.
* **Session Security:** Secure session management for user authentication.
* **Password Encryption:** Utilizing modern hashing algorithms to protect user credentials.

---

## 📄 License

This project is open-source and available for educational purposes.
