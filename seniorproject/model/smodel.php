

<?php
//connection to the database
$user = 'root';
$pass = '';
$db = 'drexelpizza';

$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to connect database');
if ($conn == true)
{
	echo "Successfully connected to database.";
} 
?>