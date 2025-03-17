# PrepX - Competitive Exam Preparation Platform (Laravel + Bootstrap Version)

## Overview
PrepX is a web application designed to help students prepare for **NTA-based competitive exams**, including **CMAT, JEE, NEET, and Banking**. Built using **Laravel (PHP framework) and MySQL**, PrepX provides an intuitive and responsive interface with **Bootstrap 5** for easy navigation and use.

🚧 **This project is designed for beginners in Laravel and Bootstrap, ensuring simplicity and ease of use.**

---

## 🔹 Technology Stack

| Feature                   | Implementation   |
|---------------------------|------------------|
| Frontend                  | Bootstrap 5 + Laravel Blade |
| Routing                   | Laravel Routes (web.php) |
| Backend                   | Laravel (PHP Framework) |
| Database                  | MySQL (Eloquent ORM) |
| Authentication            | Laravel Auth (Sessions) |

---

## 🔹 Core Functionalities

### ✅ **User Authentication & Role Management**
- Secure **session-based authentication** using Laravel Auth.
- **Role-based access control (RBAC)**: Separate **Student, Teacher, and Admin** dashboards.

### ✅ **Mock Test Management**
- Teachers can **create, edit, and verify** mock tests.
- Students can **attempt tests** and review results.
- **Supported Question Types**: 
  - Multiple-choice questions
  - True/False questions
  - Numerical-based questions
  - Logical reasoning & data interpretation
  - General awareness & aptitude-based questions

### ✅ **User Dashboard & Performance Tracking**
- **Personalized dashboards** for students, teachers, and admins.
- **Basic progress tracking** with Bootstrap charts.

### ✅ **Exam Simulations & Leaderboards**
- **Exam timing & score display**.
- **Basic leaderboards** to show rankings.

### ✅ **Email Notifications**
- Email notifications for exam updates using Laravel Mail.

---

## 🔹 Database Schema (MySQL)

### Users Table (students, teachers, admins)
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher', 'admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tests Table (Mock Tests)
```sql
CREATE TABLE tests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    duration INT NOT NULL,
    created_by INT,
    FOREIGN KEY (created_by) REFERENCES users(id)
);
```

### Questions Table
```sql
CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    test_id INT,
    question_text TEXT NOT NULL,
    question_type ENUM('MCQ', 'True/False', 'Numerical', 'Logical Reasoning', 'Data Interpretation', 'General Awareness') NOT NULL,
    options TEXT,
    correct_answer TEXT,
    FOREIGN KEY (test_id) REFERENCES tests(id)
);
```

### Results Table (Student Scores)
```sql
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    test_id INT,
    score FLOAT,
    completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (test_id) REFERENCES tests(id)
);
```

---

## 🔹 Installation Guide

### Prerequisites
- PHP 8.x installed
- MySQL database
- PhpStorm IDE
- Composer (for Laravel)

### Setup Instructions
1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/prepx-laravel.git
   cd prepx-laravel
   ```

2. **Install Laravel & Dependencies**
   ```bash
   composer install
   npm install   # If using Laravel Mix for assets
   ```

3. **Setup MySQL Database**
   - Create a database `prepx_db` and import the SQL schema.

4. **Configure Environment Variables (.env file)**
   ```env
   APP_NAME=PrepX
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=prepx_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

6. **Start Laravel Development Server**
   ```bash
   php artisan serve
   ```

7. **Access the Application**
   - Open your browser and go to `http://127.0.0.1:8000/`.
   - Register as a student or teacher.
   - Start attempting mock tests and track performance.

---

## 🔹 Free Deployment Guide (000WebHost / InfinityFree)

### **Option 1: 000WebHost (Free PHP Hosting)**
1. Sign up at [000WebHost](https://www.000webhost.com/).
2. Upload your Laravel project via **FTP or File Manager**.
3. Update your `.env` file with the database details from 000WebHost.
4. Run migrations using:
   ```bash
   php artisan migrate --force
   ```
5. Access your project via the **provided subdomain**.

### **Option 2: InfinityFree (Unlimited Free PHP Hosting)**
1. Create an account at [InfinityFree](https://www.infinityfree.net/).
2. Upload Laravel files via **FTP (FileZilla recommended)**.
3. Modify the `.env` file with the MySQL database details.
4. Use **Cron Jobs** for background tasks (if needed).

---

## 🔹 License & Contributions
This project is licensed under the MIT License. Feel free to contribute and improve the platform.

---

## 🔹 Contact Information
For inquiries, reach out via **neelpatelcoc2gmail.com** or open an issue in the repository.

---

🚀 **PrepX (Laravel + Bootstrap Edition) is ready for NTA exams preparation!**

