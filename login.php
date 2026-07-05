<?php
session_start();
include("includes/config.php");

$message="";

if(isset($_GET['registered'])){
    $message="<div class='success'>Registration Successful! Please login.</div>";
}

if(isset($_POST['login'])){

$email=mysqli_real_escape_string($conn,$_POST['user_email']);
$password=$_POST['password'];

$query=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($query)>0){

$user=mysqli_fetch_assoc($query);

if(password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['id'];
$_SESSION['user_name']=$user['name'];
$_SESSION['user_email']=$user['email'];

header("Location: dashboard.php");
exit();

}else{

$message="<div class='error'>Incorrect Password.</div>";

}

}else{

$message="<div class='error'>Email not found.</div>";

}

}
?>

<?php $pageTitle = "Login | StudySync"; include 'includes/head.php'; ?>

<body>

<div class="auth-container">

<form method="POST" class="auth-form" autocomplete="off">

<h2>Welcome Back</h2>

<p class="subtitle">
Login to continue your learning journey.
</p>

<?php echo $message; ?>

<input
type="email"
name="user_email"
placeholder="Email Address"
autocomplete="off"
spellcheck="false"
required>

<input
type="password"
name="password"
placeholder="Password"
autocomplete="new-password"
required>

<button
type="submit"
name="login">

Login

</button>

<p>

Don't have an account?

<a href="register.php">

Create Account

</a>

</p>

</form>

</div>

</body>

</html>