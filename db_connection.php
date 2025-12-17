<?php
$host = "localhost";
$username = "root";
$password = "";

//Connect to the MySQL server
$conn = mysqli_connect($host, $username, $password);

//Check if connection was successful
/*if(!$conn){
    echo mysqli_connect_error();
}*/

// Create the 'users_db' database
$sql = 'CREATE Database users_db';
mysqli_query($conn, $sql);
mysqli_select_db($conn, "users_db" );

//Create the 'Users' table
$sql = 'CREATE TABLE Users('.
    'UserID INT AUTO_INCREMENT PRIMARY KEY,'.
    'Username VARCHAR(50) NOT NULL UNIQUE,'.
    'Password VARCHAR(255) NOT NULL,'.
    'Email VARCHAR(100) NOT NULL UNIQUE)';

$res = mysqli_query($conn, $sql); //Execute the query

/*if($res === TRUE){
    echo "yes";
}
else{
    echo mysqli_error($conn);
}*/

//Create the 'Quizzes' table
$sql = 'CREATE TABLE Quizzes('.
    'QuizID INT AUTO_INCREMENT PRIMARY KEY,'.
    'UserID INT NOT NULL,'.
    'Score INT NOT NULL,'.
    'FOREIGN KEY (UserID) REFERENCES Users(UserID)'.
    'ON DELETE CASCADE)';

$res2 = mysqli_query($conn, $sql); // Execute the query

/*if($res2 === TRUE){
    echo "yes";
}
else{
    echo mysqli_error($conn);
}*/

?>
