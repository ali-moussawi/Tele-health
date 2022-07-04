<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "telehealth";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    $sql = "INSERT INTO reviews (email, username,message)
        VALUES ('".$_POST['myEmail']."', '".$_POST['myUsername']."', '".$_POST['mymessage']."')";
    if (mysqli_query($conn,$sql)) {
    $data = array("data" => "You Data added successfully");
        echo json_encode($data);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>