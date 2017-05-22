<?php
include('dbconn.php');
$fname = $_POST['firstname'];
$dept = $_POST['dept'];
$number= $_POST['number'];
$pass = $_POST['password'];
$type = $_POST['type'];
$doctor=$_POST['doctor'];
$sql = "INSERT INTO `Patient` (`name`, `number`, `type`, `password`, `doctor`) VALUES ('$fname','$number','$type','$pass','$doctor')";
$result = $conn->query($sql);
if($result)
{
    echo "success";
    header("Location:index_patient.php?id=$number");
}
else
{
    echo "error".mysqli_error($conn);
}
?>