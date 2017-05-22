<?php
	$host = "127.0.0.1";
$port = 5353;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// No Timeout 
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
while (1) {
	# code...

$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
$input = socket_read($spawn, 1024) or die("Could not read input\n");

echo "To CLient : ",$output;
$sql = "UPDATE Patient SET docStatus=true WHERE name=$input";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
$output = "Done";
socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
}
socket_close($spawn);
socket_close($socket);

?>