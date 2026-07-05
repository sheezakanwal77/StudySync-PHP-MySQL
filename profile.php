<?php
session_start();
include("includes/config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// Update Profile
if(isset($_POST['update'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    mysqli_query($conn,"
    UPDATE users
    SET name='$name',
        email='$email'
    WHERE id='$user_id'
    ");

    $_SESSION['user_name']=$name;
    $_SESSION['user_email']=$email;

    $message="<div class='success'>Profile Updated Successfully.</div>";
}

$user=mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM users
WHERE id='$user_id'
"));
?>

<?php $pageTitle = "Profile | StudySync"; include 'includes/head.php'; ?>

<body>

<div class="auth-container">

<form method="POST" class="auth-form">

<h2>My Profile</h2>

<p class="subtitle">Update your information</p>

<?php echo $message; ?>

<input
type="text"
name="name"
value="<?php echo htmlspecialchars($user['name']); ?>"
required>

<input
type="email"
name="email"
value="<?php echo htmlspecialchars($user['email']); ?>"
required>

<button
type="submit"
name="update">

Update Profile

</button>

<p>

<a href="dashboard.php">

← Back to Dashboard

</a>

</p>

</form>

</div>

</body>

</html>