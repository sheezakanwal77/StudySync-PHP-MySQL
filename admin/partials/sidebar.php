<?php
// Shared admin sidebar. Set $activePage before including, e.g. $activePage = 'dashboard';
if (!isset($activePage)) {
    $activePage = '';
}
$links = [
    'dashboard'   => ['dashboard.php', 'fa-chart-line', 'Dashboard'],
    'users'       => ['users.php', 'fa-users', 'Users'],
    'courses'     => ['courses.php', 'fa-book', 'Courses'],
    'add-course'  => ['add-course.php', 'fa-plus', 'Add Course'],
    'enrollments' => ['enrollments.php', 'fa-user-graduate', 'Enrollments'],
    'messages'    => ['messages.php', 'fa-envelope', 'Messages'],
];
?>
<div class="admin-sidebar">
    <div class="logo">Study<span>Sync</span></div>

    <?php foreach ($links as $key => $link): ?>
        <a href="<?php echo $link[0]; ?>" class="<?php echo $activePage === $key ? 'active' : ''; ?>">
            <i class="fas <?php echo $link[1]; ?>"></i> <?php echo $link[2]; ?>
        </a>
    <?php endforeach; ?>

    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
