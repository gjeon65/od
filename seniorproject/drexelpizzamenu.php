<html>
<head>
	<title>Menu Page</title>
</head>
<body>
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

<?php
	//date_default_timezone_set('EST');
	//echo strftime('%B');
	echo nl2br("Drexel Pizza \n Menu");
	echo "<br>";
	//sql statement
	
	$sql = "SELECT * FROM menu";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		/*
		while($row = $mysqli_fetch_assoc($result)) {
			echo "id: ".$row["id"]. " - Name: " . $row["name"]. " ".
			"Price: " . $row["price"]. "Description: " . $row["description"] . "<br>";
		*/


		echo "<table border='1'>
		<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Description</th>
		
		</tr>";
		//<th>Picture</th>
		//fetching data
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td> $ ".number_format($row["price"],2)."</td>";
			echo "<td>".$row["description"]."</td>";
			//echo "<td>"./*$row["picture"].*/"</td>";
			echo"</tr>";
			/*
			echo "id: ". $row["id"]. " - Name: ". $row["name"]. "Price: $" 
			. $row["price"] . " Description: ". $row["description"]. "<br>";*/
			
		} echo "</table>";
	} else {
		echo "0 results";
		trigger_error('Invalid query: ' . $conn->error);
	}
	$conn->close();
	

?>

</body>
</html>