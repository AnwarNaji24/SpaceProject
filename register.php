<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body> 
    <?php
    session_start(); // Start the session

    include('db_connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password
        $email = $_POST['email'];

        // Insert data into the table
        $sql = "INSERT INTO Users (Username, Password, Email) VALUES ('$username', '$password', '$email')";
        if (mysqli_query($conn, $sql)) {
            // After successful registration, get the UserID of the inserted user
            $userID = mysqli_insert_id($conn);

            // Store session data
            $_SESSION['UserID'] = $userID;
            $_SESSION['Username'] = $username;

            echo "Registration successful!";
            header("Location: HomePage.html"); // Redirect to the home page after registration
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
    
    <div class="card">
        <div class="avatar">
            <img src="Pectures/profile2.png" alt="User">
        </div>

        <form method="post" action="register.php">
            <input type="email" placeholder="Email" id="email" name="email" required>
            <input type="text" placeholder="Username" id="username" name="username" required>
            <input type="password" placeholder="Password" id="password" name="password" required>
            <button type="submit" value="Register">Sign Up</button>
        </form>

        <a href="login.php">Already have an account?</a>
    </div>

</body>
</html>