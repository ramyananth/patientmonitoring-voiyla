<?php
	$host = "127.0.0.1";
	$port = 5353;
	// No Timeout 
	$message ="hELLO wORLD";
	set_time_limit(0);
	$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");		
	$result = socket_connect($socket, $host, $port) or die("Could not connect toserver\n");
	socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
	$result = socket_read ($socket, 1024) or die("Could not read server response\n");
	echo "Reply From Server  :".$result;
	socket_close($socket);
?>