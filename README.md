# PrepX - Competitive Exam Preparation Platform (Core PHP + Bootstrap Version)

## Overview
PrepX is a simple web application designed for students preparing for competitive exams such as JEE, NEET, and Banking. This version of PrepX is built using **Core PHP and MySQL**, replacing the original **MERN stack** implementation. The frontend is developed with **Bootstrap 5**, making it easy to modify.

🚧 **This project is designed for beginners in PHP and Bootstrap, ensuring simplicity and ease of use.**

---

## 🔹 Technology Stack (PHP Alternative for MERN Components)

| Feature                   | MERN (Original)      | PHP Version Replacement   |
|---------------------------|----------------------|--------------------------|
| Frontend                  | React + Vite        | Bootstrap 5 + Core PHP |
| Styling                   | Tailwind CSS        | Bootstrap 5 |
| Routing                   | React Router        | Simple PHP Routing (include statements) |
| Backend                   | Express.js (Node)   | Core PHP (Procedural) |
| Database                  | MongoDB (Mongoose)  | MySQL (PDO) |
| Authentication            | JWT                 | PHP Sessions |

---

## 🔹 Core Functionalities (PHP Implementation)

### ✅ **User Authentication & Role Management**
- Secure **session-based authentication** using PHP.
- **Role-based access control (RBAC)**: Separate **Student, Teacher, and Admin** dashboards.

### ✅ **Mock Test Management**
- Teachers can **create, edit, and verify** mock tests.
- Students can **attempt tests** and review results.
- **Question Types**: Multiple-choice, short answer, long answer.

### ✅ **User Dashboard & Performance Tracking**
- **Personalized dashboards** for students, teachers, and admins.
- **Basic progress tracking** with Bootstrap charts.

### ✅ **Exam Simulations & Leaderboards**
- **Exam timing & score display**.
- **Basic leaderboards** to show rankings.

### ✅ **Email Notifications**
- Basic email notifications for exam updates.

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
    question_type ENUM('MCQ', 'Short Answer', 'Long Answer') NOT NULL,
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

### Setup Instructions
1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/prepx-php.git
   cd prepx-php
   ```

2. **Setup MySQL Database**
   - Create a database `prepx_db` and import the SQL schema.

3. **Configure Database Connection (db.php)**
   ```php
   <?php
   $host = 'localhost';
   $db   = 'prepx_db';
   $user = 'root';
   $pass = '';
   $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
   try {
       $pdo = new PDO($dsn, $user, $pass);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       die("Database connection failed: " . $e->getMessage());
   }
   ?>
   ```

4. **Start the Development Server**
   ```bash
   php -S localhost:8000
   ```

5. **Access the Application**
   - Open your browser and go to `http://localhost:8000/`.
   - Register as a student or teacher.
   - Start attempting mock tests and track performance.

---

## 🔹 Deployment Guide
- **Backend Hosting:** Deploy on **cPanel, DigitalOcean, or AWS**.
- **Frontend Hosting:** Serve via **Apache/Nginx**.
- **Database:** MySQL hosted on **cPanel or DigitalOcean**.

---

## 🔹 License & Contributions
This project is licensed under the MIT License. Feel free to contribute and improve the platform.

---

## 🔹 Contact Information
For inquiries, reach out via **neelpatelcoc2gmail.com** or open an issue in the repository.

---

🚀 **PrepX (Core PHP + Bootstrap Edition) is ready for exam preparation!**

