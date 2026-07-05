<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit();
}

include("../includes/config.php");

$result = mysqli_query($conn,"
SELECT *
FROM contact_messages
ORDER BY id DESC
");

$pageTitle = "Contact Messages | StudySync Admin";
include 'partials/head.php';
$activePage = 'messages';
?>

<body>

<div class="admin-layout">

<?php include 'partials/sidebar.php'; ?>

<div class="admin-main">

    <div class="admin-topbar">
        <h1>Contact Messages</h1>
    </div>

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
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
                    <td><?php echo htmlspecialchars($row['subject']); ?></td>
                    <td><?php echo htmlspecialchars($row['message']); ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" class="admin-empty">No messages yet.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</div>

</body>
</html>
