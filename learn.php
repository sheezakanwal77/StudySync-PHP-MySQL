<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if(!isset($_GET['id'])){
    header("Location: mycourses.php");
    exit();
}

$course_id = (int)$_GET['id'];

$query = mysqli_query($conn,"
SELECT courses.*, enrollments.progress
FROM enrollments
JOIN courses
ON enrollments.course_id = courses.id
WHERE enrollments.user_id='$user_id'
AND courses.id='$course_id'
");

if(mysqli_num_rows($query)==0){
    header("Location: mycourses.php");
    exit();
}

$course = mysqli_fetch_assoc($query);

// Mark Complete
if(isset($_POST['complete'])){

    mysqli_query($conn,"
    UPDATE enrollments
    SET progress=100
    WHERE user_id='$user_id'
    AND course_id='$course_id'
    ");

    header("Location: learn.php?id=".$course_id);
    exit();
}
?>

<?php $pageTitle = $course['title'] . " | StudySync"; include 'includes/head.php'; ?>

<body>

<div class="container">

<a href="mycourses.php" class="btn">← Back to My Courses</a>

<div class="course-card">

<h2><?php echo $course['title']; ?></h2>

<p><?php echo $course['description']; ?></p>

<p>

<b>Instructor:</b>

<?php echo $course['instructor']; ?>

</p>

<h3>Course Progress</h3>

<div class="progress">

<div class="progress-bar"
style="width:<?php echo $course['progress']; ?>%;">

<?php echo $course['progress']; ?>%

</div>

</div>

<br>

<form method="POST">

<?php
if($course['progress']<100){
?>

<button
type="submit"
name="complete"
class="btn">

Mark as Completed

</button>

<?php
}else{
?>

<button
class="btn"
disabled>

Course Completed ✅

</button>

<?php
}
?>

</form>

</div>

</div>

</body>

</html>