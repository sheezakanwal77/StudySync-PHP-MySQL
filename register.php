
<?php

session_start();
include("includes/config.php");

$message="";

if(isset($_POST['register'])){

$name=mysqli_real_escape_string($conn,$_POST['name']);

$email=mysqli_real_escape_string($conn,$_POST['user_email']);

$password=$_POST['password'];

$confirm=$_POST['confirm'];

if($password!=$confirm){

$message="<div class='error'>Passwords do not match.</div>";

}else{

$check=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($check)>0){

$message="<div class='error'>Email already exists.</div>";

}else{

$hash=password_hash($password,PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO users(name,email,password)
VALUES('$name','$email','$hash')");

header("Location: login.php?registered=1");
exit();

}

}

}

?>

<?php $pageTitle = "Register | StudySync"; include 'includes/head.php'; ?>

<body>

<div class="auth-container">
<form method="POST" class="auth-form" autocomplete="off">

<h2>Create Your Account</h2>

<p class="subtitle">
Join thousands of learners and start your journey today.
</p>

<?php echo $message; ?>

<input
type="text"
name="name"
placeholder="Full Name"
autocomplete="off"
required>

<input
type="email"
name="user_email"
placeholder="Email Address"
autocomplete="off"
required>

<input
type="password"
name="password"
placeholder="Password"
autocomplete="new-password"
required>

<input
type="password"
name="confirm"
placeholder="Confirm Password"
autocomplete="new-password"
required>

<button
type="submit"
name="register">

Register

</button>

<p>

Already have an account?

<a href="login.php">

Login

</a>

</p>

</form>

</div>

</body>

</html>