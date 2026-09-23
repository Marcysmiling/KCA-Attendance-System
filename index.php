<!DOCTYPE html>
<html>

<head>

<title>Attendance Management System</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#eef5ef;
}

header{

background:#1b5e20;

padding:18px 40px;

display:flex;

justify-content:space-between;

align-items:center;

color:white;

}

header h2{

font-size:28px;

}

nav a{

text-decoration:none;

color:white;

margin-left:25px;

font-weight:bold;

transition:.3s;

}

nav a:hover{

color:#c8e6c9;

}

.hero{

display:flex;

justify-content:space-between;

align-items:center;

padding:70px 60px;

background:white;

}

.hero-text{

width:55%;

}

.hero-text h1{

font-size:48px;

color:#1b5e20;

margin-bottom:20px;

}

.hero-text p{

font-size:18px;

color:#555;

line-height:1.8;

margin-bottom:35px;

}

.btn{

display:inline-block;

padding:15px 28px;

margin-right:15px;

border-radius:8px;

text-decoration:none;

font-weight:bold;

transition:.3s;

}

.login{

background:#1b5e20;

color:white;

}

.register{

background:#43a047;

color:white;

}

.btn:hover{

transform:translateY(-3px);

}

.hero-icon{

font-size:170px;

}

</style>

</head>

<body>

<header>

<h2>🎓 Attendance Management System</h2>

<nav>

<a href="login.php">Login</a>

<a href="register.php">Register</a>

</nav>

</header>

<section class="hero">

<div class="hero-text">

<h1>Smart QR Attendance System</h1>

<p>

Welcome to the QR-Based Attendance Management System.

Manage students, lecturers, attendance records and reports securely from one integrated platform.

</p>

<a class="btn login" href="login.php">

🔐 Login

</a>

<a class="btn register" href="register.php">

📝 Register

</a>

</div>

<div class="hero-icon">

📷

</div>

</section>
<style>

.stats{

padding:50px;

}

.stats h2{

text-align:center;

color:#1b5e20;

margin-bottom:35px;

font-size:32px;

}

.cards{

display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

}

.card{

background:white;

padding:25px;

border-radius:15px;

box-shadow:0 5px 15px rgba(0,0,0,.1);

text-align:center;

transition:.3s;

}

.card:hover{

transform:translateY(-5px);

}

.card h1{

font-size:40px;

margin:15px 0;

color:#1b5e20;

}

.card p{

font-size:17px;

font-weight:bold;

color:#555;

}

.features{

padding:50px;

background:white;

margin-top:40px;

}

.features h2{

text-align:center;

color:#1b5e20;

margin-bottom:35px;

}

.feature-grid{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:20px;

}

.feature{

background:#eef5ef;

padding:25px;

border-radius:12px;

font-size:18px;

font-weight:bold;

color:#1b5e20;

}

@media(max-width:900px){

.cards{

grid-template-columns:repeat(2,1fr);

}

.feature-grid{

grid-template-columns:1fr;

}

}

@media(max-width:600px){

.cards{

grid-template-columns:1fr;

}

}

</style>

<section class="stats">

<h2>System Overview</h2>

<div class="cards">

<div class="card">

<h1>👨‍🎓</h1>

<p>Students</p>

</div>

<div class="card">

<h1>👩‍🏫</h1>

<p>Lecturers</p>

</div>

<div class="card">

<h1>📚</h1>

<p>Courses</p>

</div>

<div class="card">

<h1>📅</h1>

<p>Attendance</p>

</div>

</div>

</section>

<section class="features">

<h2>System Features</h2>

<div class="feature-grid">

<div class="feature">

✅ QR Code Attendance

</div>

<div class="feature">

✅ Student Management

</div>

<div class="feature">

✅ Lecturer Management

</div>

<div class="feature">

✅ Attendance Reports

</div>

</div>

</section>
<footer>

<div class="footer-content">

<h2>🎓 Attendance Management System</h2>

<p>

A secure QR-Based Attendance Management System developed for educational institutions.

</p>

<br>

<p>

Developed by

<b>Angella Nungai</b>

</p>

<p>

Diploma in Information Technology

</p>

<br>

<p>

© 2026 All Rights Reserved.

</p>

</div>

</footer>

<style>

footer{

background:#1b5e20;

color:white;

text-align:center;

padding:45px 20px;

margin-top:60px;

}

.footer-content h2{

margin-bottom:15px;

}

.footer-content p{

font-size:16px;

line-height:1.8;

}

</style>

</body>

</html>