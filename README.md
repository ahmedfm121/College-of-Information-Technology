# 🎓 Faculty of Computing & IT Management System

A robust, full-stack web platform designed to manage the academic and administrative operations of the **Faculty of Computing and Information Technology**. This project provides a dual-interface experience: a public-facing portal for students/visitors and a comprehensive management dashboard for administrators.

---

## 🚀 Core Features

### 🏢 Administrative Dashboard (Control Panel)
* **Content Management (CRUD):** Authorized admins can fully manage (Create, Read, Update, Delete) the following:
    * **Academic Programs:** Manage degrees and specializations via `insert_program.php` and `updateprogrames.php`.
    * **Faculty News:** Publish and edit the latest announcements through `insert_news.php` and `update_news1.php`.
    * **Departments:** Organize faculty divisions using `insert.php` and `update.php`.
* **Centralized Management:** Tables like `News.php` and `programesA.php` provide a streamlined view for admins to monitor and modify data.

### 🔐 Security & Authentication
* **Role-Based Access Control (RBAC):** Distinct roles for **Admin (مسؤول)** and **Student (طالب)**.
* **Session Management:** Secure session handling via `session_setup.php` with custom lifetime settings.
* **Protected Routes:** Administrative pages are restricted; unauthorized users are automatically redirected to the homepage.
* **Secure Login:** Integrated `login_process.php` with password verification and error handling.

### 📱 User Experience
* **Responsive Design:** A modern, mobile-friendly UI styled with the **Cairo** font family.
* **Personal Profiles:** Dedicated `profile.php` for registered users.
* **Bilingual Feel:** While the code is PHP-based, the interface is fully localized in Arabic for its target audience.

---

## 🛠️ Technical Stack

* **Backend:** PHP (Procedural with Prepared Statements for SQL safety).
* **Database:** MySQL (Relational schema).
* **Frontend:** HTML5, CSS3 (Custom Grid & Flexbox layouts).
* **Server Environment:** XAMPP / WAMP (Apache Server).

---

## 📂 Key File Map

* `login.php` / `logout.php`: User authentication entry and exit points.
* `insert_*.php`: Forms for adding new records to the database.
* `update_*.php`: Dynamic forms for editing existing data.
* `delete_*.php`: Backend logic for secure record removal.
* `contact.php`: Database connection layer (using the `unversity` schema).
* `style.css`: Global stylesheet for consistent branding and typography.

---

## 💻 Installation & Local Setup

1.  **Server:** Download and install **XAMPP**.
2.  **Files:** Place the project folder in the `C:/xampp/htdocs/` directory.
3.  **Database:**
    * Open **phpMyAdmin** (`localhost/phpmyadmin`).
    * Create a database named **`unversity`**.
    * Import the `users.sql` file.
4.  **Launch:** Open your browser and visit: `http://localhost/[your-folder-name]/index.php`.

---

## 🔒 Security Implementation Notes
* **SQL Injection Prevention:** The system utilizes `mysqli::prepare` and `bind_param` for data-heavy operations.
* **Global Session Setup:** `session_setup.php` ensures consistent session parameters (86400s lifetime) across all pages.
