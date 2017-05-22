<?php
include('dbconn.php');
$fname = $_POST['firstname'];
$dept = $_POST['dept'];
$number= $_POST['number'];
$pass = $_POST['password'];
$sql = "insert into doctor values('$fname','$number','$dept','$pass')";
$result = $conn->query($sql);
if($result)
{
    echo "success";
    header("Location:index_doctor.php?id=$number");
}
else
{
    echo "error".mysqli_error($conn);
}
?>