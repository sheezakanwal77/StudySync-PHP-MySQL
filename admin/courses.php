<?php
session_start();
include '../includes/config.php';

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM courses ORDER BY id DESC");

$pageTitle = "Manage Courses | StudySync Admin";
include 'partials/head.php';
$activePage = 'courses';
?>

<body>

<div class="admin-layout">

<?php include 'partials/sidebar.php'; ?>

<div class="admin-main">

    <div class="admin-topbar">
        <h1>Manage Courses</h1>
        <a href="add-course.php" class="btn">+ Add Course</a>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Instructor</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="<?php echo $row['thumbnail']; ?>" alt=""></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['instructor']); ?></td>
                <td><?php echo htmlspecialchars(substr($row['description'],0,80)); ?>...</td>
                <td>
                    <div class="actions">
                        <a href="edit-course.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="delete-course.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Delete this course?')">Delete</a>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>

</div>

</body>
</html>
