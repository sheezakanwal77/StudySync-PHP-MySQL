<?php
session_start();

if(!isset($_SESSION['admin_id']))
{
    header("Location: login.php");
    exit();
}

include "../includes/config.php";

// Counts
$userCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$courseCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM courses"));
$enrollmentCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM enrollments"));
$messageCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM contact_messages"));

$pageTitle = "StudySync Admin Dashboard";
include 'partials/head.php';
$activePage = 'dashboard';
?>

<body>

<div class="admin-layout">

<?php include 'partials/sidebar.php'; ?>

<div class="admin-main">

    <div class="admin-topbar">
        <h1>Welcome, Administrator</h1>
        <a href="../index.php" class="home-btn">🏠 Home</a>
    </div>

    <div class="admin-cards">

        <div class="admin-card">
            <i class="fas fa-users"></i>
            <h2><?php echo $userCount; ?></h2>
            <p>Total Users</p>
        </div>

        <div class="admin-card">
            <i class="fas fa-book"></i>
            <h2><?php echo $courseCount; ?></h2>
            <p>Total Courses</p>
        </div>

        <div class="admin-card">
            <i class="fas fa-user-graduate"></i>
            <h2><?php echo $enrollmentCount; ?></h2>
            <p>Enrollments</p>
        </div>

        <div class="admin-card">
            <i class="fas fa-envelope"></i>
            <h2><?php echo $messageCount; ?></h2>
            <p>Contact Messages</p>
        </div>

    </div>

</div>

</div>

</body>
</html>
