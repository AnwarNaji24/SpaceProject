<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<?php
    session_start();

    // Redirect to login page if the user is not logged in
    if (!isset($_SESSION['UserID'])) {
        header("Location: login.php");
        exit();
    }

    include('db_connection.php');// Connect to the database

    $userID = $_SESSION['UserID'];// Get the user ID from the session


    // Query to retrieve user data from the Users table    
    $sql = "SELECT * FROM Users WHERE UserID = '$userID'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);// Get the user's data

    // Query to retrieve the last quiz taken by the user
    $sql2 = "SELECT * FROM Quizzes WHERE UserID = '$userID' ORDER BY QuizID DESC LIMIT 1";// Get the most recent quiz
    $result2 = mysqli_query($conn, $sql2);
    $lastQuiz = mysqli_fetch_assoc($result2);

    // Query to get the total number of quizzes taken by the user
    $sql3 = "SELECT COUNT(*) as totalQuizzes FROM Quizzes WHERE UserID = '$userID'";
    $result3 = mysqli_query($conn, $sql3);
    $totalQuizzes = mysqli_fetch_assoc($result3)['totalQuizzes'];

    // If there are no quizzes, set the last score to 0
    $lastScore = $lastQuiz ? $lastQuiz['Score'] : 0;
    ?>
    
    
    <h1>User Profile</h1>
    <img src="Pectures/profile2.png">
    <!-- User Information -->
    <div class="card">
        <h2>Personal Information</h2>
        <p><strong>Name:</strong> <?php echo $user['Username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['Email']; ?></p>
    </div>

    <!-- Quiz Information -->
    <div class="card">
        <h2>Quiz Information</h2>
        <p><strong>Quizzes Taken:</strong> <?php echo $totalQuizzes; ?></p>
        <p><strong>Last Quiz Score:</strong> <?php echo $lastScore; ?> / 5</p>
    </div>

    <h2>
        <a href="HomePage.html">Home Page</a>
    </h2>
</body>
</html>


