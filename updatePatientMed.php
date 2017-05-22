<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hospital";
$med1=$_POST['med1'];
$med2 = $_POST['med2'];
$name = $_POST['name'];
$diagnosis = $_POST['diagnosis'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Patient SET med1='$med1',med2='$med2',patientStatus='true',diagnosis='$diagnosis' WHERE name='$name'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>