<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit();
}

include("../includes/config.php");

$result = mysqli_query($conn,"
SELECT enrollments.id,
users.name,
users.email,
courses.title,
enrollments.enrolled_at
FROM enrollments
JOIN users ON enrollments.user_id=users.id
JOIN courses ON enrollments.course_id=courses.id
ORDER BY enrollments.id DESC
");

$pageTitle = "Enrollments | StudySync Admin";
include 'partials/head.php';
$activePage = 'enrollments';
?>

<body>

<div class="admin-layout">

<?php include 'partials/sidebar.php'; ?>

<div class="admin-main">

    <div class="admin-topbar">
        <h1>Student Enrollments</h1>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Email</th>
                <th>Course</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo $row['enrolled_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" class="admin-empty">No enrollments yet.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</div>

</body>
</html>
