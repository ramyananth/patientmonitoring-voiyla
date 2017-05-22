<?php
	$myfile = fopen("shell.sh", "w") or die("Unable to open file!");
	$txt = "php -S localhost:4888\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	$output = shell_exec('chmod 0777 shell.sh');
	echo $output;
	$ot = shell_exec("./shell.sh");
	echo $ot;
?>