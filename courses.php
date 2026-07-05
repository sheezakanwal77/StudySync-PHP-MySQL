<?php

session_start();

include("includes/config.php");



$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $result = mysqli_query($conn,"
    SELECT *
    FROM courses
    WHERE title LIKE '%$search%'
    OR instructor LIKE '%$search%'
    ");
}else{

    $result = mysqli_query($conn,"
    SELECT *
    FROM courses
    ");

}

?>

<?php $pageTitle = "Courses | StudySync"; include 'includes/head.php'; ?>

<body>

<div class="container">

<div style="margin-bottom:25px;">

<a href="dashboard.php" class="btn">
← Back to Dashboard
</a>

</div>

<h2 class="section-title">Explore Courses</h2>
<form method="GET" class="search-form">

<input
type="text"
name="search"
placeholder="Search courses..."
value="<?php echo htmlspecialchars($search); ?>">

<button type="submit">

Search

</button>

</form>
<div class="courses-grid">
    <?php

while($course=mysqli_fetch_assoc($result)){

?>

<div class="course-card">
<img
src="<?php echo $course['thumbnail']; ?>"
alt="<?php echo $course['title']; ?>"
class="course-image">
<h3><?php echo $course['title']; ?></h3>

<p><?php echo $course['description']; ?></p>

<p>

<b>Instructor:</b>

<?php echo $course['instructor']; ?>

</p>

<a href="enroll.php?id=<?php echo $course['id']; ?>" class="btn">

Enroll Now

</a>

</div>

<?php } ?>
</div>

</div>

</body>

</html>