<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$pageTitle = isset($pageTitle) ? $pageTitle : "StudySync";
include __DIR__ . '/head.php';
?>

<body>

<header>

<div class="container nav">

<div class="logo">
Study<span>Sync</span>
</div>

<nav>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="courses.php">Courses</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>
</nav>

<div>
<?php if (isset($_SESSION['user_id'])): ?>
    <a href="dashboard.php" class="login-btn">
        <?php echo htmlspecialchars($_SESSION['user_name']); ?>
    </a>
    <a href="logout.php" class="register-btn">Logout</a>
<?php else: ?>
    <a href="login.php" class="login-btn">Login</a>
    <a href="register.php" class="register-btn">Register</a>
<?php endif; ?>
<a href="admin/login.php" class="admin-btn">Admin</a>
</div>

</div>

</header>
