<?php
session_start();
include '../includes/config.php';



$error = "";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM admins WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1)
    {
        $admin = mysqli_fetch_assoc($result);

        // Plain password check
        if($password == $admin['password'])
        {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            $error = "Invalid Password!";
        }
    }
    else
    {
        $error = "Invalid Email!";
    }
}
?>

<?php $pageTitle = "StudySync Admin Login"; include 'partials/head.php'; ?>

<body>

<div class="admin-login-wrap">

<div class="admin-login-box">

<h2>Admin Login</h2>

<?php
if($error!="")
{
    echo "<div class='admin-error'>" . htmlspecialchars($error) . "</div>";
}
?>

<form method="POST" autocomplete="off">

<input
type="email"
name="email"
placeholder="Admin Email"
autocomplete="off"
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

</form>

<div class="back">
<a href="../index.php">← Back to Website</a>
</div>

</div>

</div>

</body>
</html>