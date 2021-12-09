<html>
<body>
<?php

$fn = fopen("partner-file.txt","r") or die("fail to open file");
$register_file_name = "register_list.html";

if (file_exists($register_file_name)) {
	$register_list = fopen($register_file_name, "w");
	fwrite($register_list,"<h2>Partners</h2>");
	while($row = fgets($fn)) {
		list( $Name, $Pass, $Email, $Position ) = explode( ":", $row );
		fwrite($register_list,"<p>Name: ". $Name . ", Password: " . $Pass . ", Email: " . $Email . ", Position: " . $Position . "</p>");
	}
	fclose($fn);
	
}

?>
</body>
</html>
