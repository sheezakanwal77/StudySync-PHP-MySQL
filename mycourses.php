<?php

session_start();
include("includes/config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"
SELECT courses.*, enrollments.progress
FROM enrollments
JOIN courses
ON enrollments.course_id = courses.id
WHERE enrollments.user_id='$user_id'
");

?>

<?php $pageTitle = "My Courses | StudySync"; include 'includes/head.php'; ?>

<body>

<div class="container">

<a href="dashboard.php" class="btn">← Back to Dashboard</a>

<h2 class="section-title">My Courses</h2>

<div class="courses-grid">

<?php

if(mysqli_num_rows($result)>0){

while($course=mysqli_fetch_assoc($result)){

?>

<div class="course-card">

<h3><?php echo $course['title']; ?></h3>

<p><?php echo $course['description']; ?></p>

<p>

<b>Instructor:</b>

<?php echo $course['instructor']; ?>

</p>

<p>

<b>Progress:</b>

<?php echo $course['progress']; ?>%

</p>

<a href="learn.php?id=<?php echo $course['id']; ?>" class="btn">
Continue Learning
</a>

</div>

<?php

}

}else{

?>

<p style="color:white;font-size:18px;">

You have not enrolled in any course yet.

</p>

<?php

}

?>

</div>

</div>

</body>

</html>