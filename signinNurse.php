<?php
include("dbconn.php");
if(isset($_POST['signin'])) {
    $number = $_POST['number'];
    $pass = $_POST['password'];
    $sql = "select *from nurse where number='$number' and password='$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['number']==$number && $row['pass']==$password)
            {
                $name=$row['name'];
                header("Location:index_nurse.php?id=$name");
            }
        }
        }
    } else {
        echo "0 results";
    }
?>