<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $sql = "SELECT * FROM Users WHERE Username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password using password_verify
        if (password_verify($password, $user['Password'])) {
            // If the password is correct, store session data
            $_SESSION['UserID'] = $user['UserID'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Email'] = $user['Email'];

            echo "Login successful!";
            header("Location: HomePage.html"); // Redirect to the home page
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>

    <div class="card">
        <div class="avatar">
            <img src="Pectures/profile2.png" alt="User">
        </div>

        <form method="post" action="login.php">
            <input type="text" placeholder="Username" id="username" name="username" required>
            <input type="password" placeholder="Password" id="password" name="password" required>
            <button type="submit" value="Login">Log In</button>
        </form>

        <a href="register.php">Create new account</a>
    </div>

</body>
</html>