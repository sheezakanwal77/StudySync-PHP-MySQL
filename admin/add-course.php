<?php
session_start();

if(!isset($_SESSION['admin_id']))
{
    header("Location: login.php");
    exit();
}

include "../includes/config.php";

$msg="";

if(isset($_POST['add']))
{
    $title=$_POST['title'];
    $instructor=$_POST['instructor'];
    $description=$_POST['description'];
    $image = trim($_POST['thumbnail']);

    mysqli_query($conn,"INSERT INTO courses(title,instructor,description,thumbnail)
    VALUES('$title','$instructor','$description','$image')");

    $msg="Course Added Successfully!";
}

$pageTitle = "Add Course | StudySync Admin";
include 'partials/head.php';
$activePage = 'add-course';
?>

<body>

<div class="admin-layout">

<?php include 'partials/sidebar.php'; ?>

<div class="admin-main">

    <div class="admin-topbar">
        <h1>Add New Course</h1>
        <a href="courses.php" class="admin-back">← Back to Courses</a>
    </div>

    <div class="admin-form-box">

        <?php if($msg!=""): ?>
            <div class="admin-success"><?php echo htmlspecialchars($msg); ?></div>
        <?php endif; ?>

        <form method="POST">

            <input type="text" name="title" placeholder="Course Title" required>
            <input type="text" name="instructor" placeholder="Instructor Name" required>
            <textarea name="description" placeholder="Course Description" required></textarea>
            <input type="url" name="thumbnail" placeholder="Image URL" required>

            <button type="submit" name="add">Add Course</button>

        </form>

    </div>

</div>

</div>

</body>
</html>
