🔐 PHP Register/Login System



A simple and secure PHP Login/Register system using MySQL as the backend database. Built for local development with XAMPP, it demonstrates user registration, secure login with password hashing, and session-based authentication.
---
⚙️ Tech Stack
💻 Frontend: HTML5, CSS3

🧠 Backend: PHP (Vanilla)

🗄️ Database: MySQL via phpMyAdmin (XAMPP)

🔐 Security: password_hash, password_verify, and sessions

📦 Environment: XAMPP (Apache + MySQL)
---
✨ Features
🔑 Register new users with hashed passwords

🔐 Secure login using password_verify()

🔒 Session-based access to protected pages

🧹 Clean and simple UI using CSS

📁 Redirects and logout functionality

📎 Error and success message handling
---
🧰 Getting Started
✅ Requirements
XAMPP (Apache & MySQL)

PHP 7.4 or above

Modern browser
---
⚙️ Setup Steps
Start XAMPP and enable Apache + MySQL

Open phpMyAdmin and run this SQL:

sql
Copy
Edit
CREATE DATABASE my_db;

USE my_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL
);
Clone or copy this repo to C:/xampp/htdocs/register-login/

Visit the app in your browser:

pgsql
Copy
Edit
http://localhost/register-login/index.php

🧠 Usage Flow
---
User registers via index.php

User credentials are stored securely in the users table (with hashed password)

User logs in via login.php

On success, session is created and user is redirected to homepage.php

User logs out via logout.php
---
✅ Future Improvements
Add email verification

Add "Confirm Password" field

Improve form validation (client + server)

Use AJAX for smoother UX

Responsive UI with Bootstrap or Tailwind CSS
