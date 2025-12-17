<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planet Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
session_start();
include('db_connection.php');
$score = 0;
$total = 5;
$results = [];

$answers = [
    "q1" => "T",
    "q2" => "T",
    "q3" => "T",
    "q4" => "T",
    "q5" => "T"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    foreach ($answers as $q => $correct) {
        if (!isset($_POST[$q])) {
            $results[$q] = "no";
        } elseif ($_POST[$q] == $correct) {
            $results[$q] = "correct";
            $score++;
        } else {
            $results[$q] = "wrong";
        }
    }

    $userID = $_SESSION['UserID'];

    /* Save the result in the same Quizzes table */
    $sql = "INSERT INTO Quizzes (UserID, Score)
            VALUES ('$userID', '$score')";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Planet Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Planet Quiz 🌌</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div id='score'>Your score: $score / $total</div>";
}
?>

<form method="POST">

<div class="quiz-card">
    <h3>1. What is the hottest planet in the solar system?</h3>
    <label><input type="radio" name="q1" value="F"> Mercury</label>
    <label><input type="radio" name="q1" value="F"> Mars</label>
    <label><input type="radio" name="q1" value="T"> Venus</label>
    <label><input type="radio" name="q1" value="F"> Jupiter</label>
    <div class="result">
        <?php if(isset($results["q1"])) echo $results["q1"]=="correct"?"✔ Correct":($results["q1"]=="wrong"?"✘ Wrong":"⚠️ No answer"); ?>
    </div>
</div>

<div class="quiz-card">
    <h3>2. Which planet is known as the Red Planet?</h3>
    <label><input type="radio" name="q2" value="F"> Earth</label>
    <label><input type="radio" name="q2" value="T"> Mars</label>
    <label><input type="radio" name="q2" value="F"> Saturn</label>
    <label><input type="radio" name="q2" value="F"> Neptune</label>
    <div class="result">
        <?php if(isset($results["q2"])) echo $results["q2"]=="correct"?"✔ Correct":($results["q2"]=="wrong"?"✘ Wrong":"⚠️ No answer"); ?>
    </div>
</div>

<div class="quiz-card">
    <h3>3. What is the largest planet in our solar system?</h3>
    <label><input type="radio" name="q3" value="T"> Jupiter</label>
    <label><input type="radio" name="q3" value="F"> Venus</label>
    <label><input type="radio" name="q3" value="F"> Uranus</label>
    <label><input type="radio" name="q3" value="F"> Earth</label>
    <div class="result">
        <?php if(isset($results["q3"])) echo $results["q3"]=="correct"?"✔ Correct":($results["q3"]=="wrong"?"✘ Wrong":"⚠️ No answer"); ?>
    </div>
</div>

<div class="quiz-card">
    <h3>4. Which planet has famous rings around it?</h3>
    <label><input type="radio" name="q4" value="T"> Saturn</label>
    <label><input type="radio" name="q4" value="F"> Mars</label>
    <label><input type="radio" name="q4" value="F"> Mercury</label>
    <label><input type="radio" name="q4" value="F"> Earth</label>
    <div class="result">
        <?php if(isset($results["q4"])) echo $results["q4"]=="correct"?"✔ Correct":($results["q4"]=="wrong"?"✘ Wrong":"⚠️ No answer"); ?>
    </div>
</div>

<div class="quiz-card">
    <h3>5. Which planet takes the longest to orbit the Sun?</h3>
    <label><input type="radio" name="q5" value="T"> Neptune</label>
    <label><input type="radio" name="q5" value="F"> Earth</label>
    <label><input type="radio" name="q5" value="F"> Venus</label>
    <label><input type="radio" name="q5" value="F"> Mercury</label>
    <div class="result">
        <?php if(isset($results["q5"])) echo $results["q5"]=="correct"?"✔ Correct":($results["q5"]=="wrong"?"✘ Wrong":"⚠️ No answer"); ?>
    </div>
</div>

<button type="submit" class="btn">Submit</button>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div id='retry'><a href='Quiz.php' class='btn'>Try Again</a></div>";
}
?>

</form>

<h2><a href="HomePage.html">Home Page</a></h2>

</body>
</html>