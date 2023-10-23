<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS contact";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();


$database = "contact";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS user_contact (username VARCHAR(90) NOT NULL PRIMARY KEY,useremail VARCHAR(90) NOT NULL,usermobile VARCHAR(30) NOT NULL,
usermessage VARCHAR(200) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $usermessage = $_POST['usermessage'];
    $useremail = $_POST['useremail'];
    $usermobile = $_POST['usermobile'];


    $insert = "INSERT INTO user_contact (username, useremail, usermobile,usermessage)
 VALUES ( '$username', '$useremail','$usermobile','$usermessage')";

    if ($conn->query($insert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert . "<br>" . $conn->error;
    }
}
