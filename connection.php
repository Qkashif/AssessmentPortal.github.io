<?php
$dsn = 'mysql:host=localhost;dbname=assessment_portal';
$user = 'root';
$password = '';

try
{
	$Conn = new PDO($dsn,$user,$password);
	$Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "PDO error".$e->getMessage();
	die();
}
?>