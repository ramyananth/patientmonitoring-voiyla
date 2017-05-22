<?php
include("dbconn.php");
    $number = $_POST['number'];
    $pass = $_POST['password'];
    $sql = "select *from Patient where number='$number' and password='$pass'";
    echo $sql;
    $result =$conn->query($sql);
    if($result)
    {
        echo "Success";
        header("Location:index_patient.php?id=$number");    }

    else
    {
        echo "error",$conn->$conn->connect_error();
    }

?>