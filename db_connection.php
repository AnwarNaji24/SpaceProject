<?php
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

$sql = 'CREATE Database users_db';
mysqli_query($conn, $sql);
mysqli_select_db($conn, "users_db" );

/*if(!$conn){
    echo mysqli_connect_error();
}*/

$sql = 'CREATE TABLE Users('.
    'UserID INT AUTO_INCREMENT PRIMARY KEY,'.
    'Username VARCHAR(50) NOT NULL UNIQUE,'.
    'Password VARCHAR(255) NOT NULL,'.
    'Email VARCHAR(100) NOT NULL UNIQUE)';

$res = mysqli_query($conn, $sql);

/*if($res === TRUE){
    echo "yes";
}
else{
    echo mysqli_error($conn);
}*/

$sql = 'CREATE TABLE Quizzes('.
    'QuizID INT AUTO_INCREMENT PRIMARY KEY,'.
    'UserID INT NOT NULL,'.
    'Score INT NOT NULL,'.
    'FOREIGN KEY (UserID) REFERENCES Users(UserID)'.
    'ON DELETE CASCADE)';

$res2 = mysqli_query($conn, $sql);

/*if($res2 === TRUE){
    echo "yes";
}
else{
    echo mysqli_error($conn);
}*/

?>

