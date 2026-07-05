<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Total Courses
$total_courses = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM courses"));

// My Courses
$my_courses = mysqli_num_rows(mysqli_query($conn,"
SELECT *
FROM enrollments
WHERE user_id='$user_id'
"));

// Certificates (Dummy)
$certificates = 0;

// Learning Time (Dummy)
$learning_time = "0 hrs";

// Continue Learning
$courses = mysqli_query($conn,"
SELECT courses.*
FROM enrollments
JOIN courses
ON enrollments.course_id = courses.id
WHERE enrollments.user_id='$user_id'
");
?>

<?php $pageTitle = "Dashboard | StudySync"; include 'includes/head.php'; ?>

<body class="dashboard-body">

<div class="dashboard">

<!-- Sidebar -->

<div class="sidebar">

<h2>StudySync</h2>

<ul>

<li><a href="dashboard.php">🏠 Dashboard</a></li>

<li><a href="courses.php">📚 Courses</a></li>

<li><a href="mycourses.php">🎓 My Courses</a></li>

<li><a href="profile.php">👤 Profile</a></li>

<li><a href="logout.php">🚪 Logout</a></li>

</ul>

</div>

<!-- Main -->

<div class="main-content">

<div class="topbar">

<h1>Welcome, <?php echo $user_name; ?> 👋</h1>

<p>Keep learning every day.</p>

</div>

<div class="cards">

<a href="courses.php" class="card-link">

<div class="card">

<h2><?php echo $total_courses; ?></h2>

<p>Courses</p>

</div>

</a>

<a href="mycourses.php" class="card-link">

<div class="card">

<h2><?php echo $my_courses; ?></h2>

<p>My Courses</p>

</div>

</a>

<div class="card">

<h2><?php echo $certificates; ?></h2>

<p>Certificates</p>

</div>

<div class="card">

<h2><?php echo $learning_time; ?></h2>

<p>Learning Time</p>

</div>

</div>

<h2 class="dashboard-title">Continue Learning</h2>

<div class="course-list">

<?php
if(mysqli_num_rows($courses)>0){

while($course=mysqli_fetch_assoc($courses)){
?>

<div class="course-item">

<h3><?php echo $course['title']; ?></h3>

<p><?php echo $course['instructor']; ?></p>

</div>

<?php
}

}else{
?>

<p style="color:white;">You haven't enrolled in any course yet.</p>

<?php } ?>

</div>

</div>

</div>

</body>

</html>