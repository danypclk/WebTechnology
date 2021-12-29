<?php

$name = $_POST['rechnungen_liste_admin'];

list( $Name, $Invoice_Id ) = explode( ":", $name );

$new_name = trim($Name . "_" . $Invoice_Id);

$file_name =  $new_name . ".pdf";
$file_url = "Data/Rechnung/" . $file_name;
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"".$file_name."\""); 
readfile($file_url);
exit;

?>