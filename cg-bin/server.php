<?php
	$host = "127.0.0.1";
$port = 5353;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hospital"; 
$c=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
	echo "Database Sync Status : True\n";
}

// No Timeout 
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");

while (1) {
echo "Docotor - Server Listening at 127.0.0.1 :5353\n"; 
$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
$input = socket_read($spawn, 1024) or die("Could not read input\n");
echo "Status : 200 / ";
$sql = "UPDATE Patient SET doctorStatus='true' WHERE name='$input'";

if ($conn->query($sql) === TRUE) {
    echo "Request No : ".$c." / Record updated successfully of name : ".$input." as true in DB, through a TCP connection.\n";
    $output = "Done";
socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
} else {
    echo "Error updating record: " . $conn->error."\n";
    $output = "Error!";
socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
}
$c++;
}
$conn->close();
socket_close($spawn);
socket_close($socket);

?>