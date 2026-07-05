<?php
session_start();

if(!isset($_SESSION['admin_id']))
{
    header("Location: login.php");
    exit();
}

include "../includes/config.php";

$result = mysqli_query($conn,"SELECT * FROM users ORDER BY id DESC");

$pageTitle = "Manage Users | StudySync Admin";
include 'partials/head.php';
$activePage = 'users';
?>

<body>

<div class="admin-layout">

<?php include 'partials/sidebar.php'; ?>

<div class="admin-main">

    <div class="admin-topbar">
        <h1>Manage Users</h1>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registered</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</div>

</div>

</body>
</html>
