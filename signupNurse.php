<?php
include('dbconn.php');
$fname = $_POST['firstname'];
$dept1 = $_POST['dept1'];
$dept2 = $_POST['dept2'];
$number= $_POST['number'];
$pass = $_POST['password'];
$sql = "insert into nurse values('$fname','$number','$dept1','$dept2','$pass')";
echo $sql;
$result = $conn->query($sql);
if($result)
{
    echo "success";
    header("Location:index_nurse.php?id=$number");
}
else
{
    echo "error".mysqli_error($conn);
}
?>