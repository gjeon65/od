<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drexel Pizza</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; background-color:#99d6ff;}
    </style>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="main.js"></script>
	<div class="page-header">
		<div class="pull-left">
        <h5>Welcome, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to Order Together.</h5>
		</div>
		<div class="pull-right">
		<p><a href="logout.php" class="btn btn-danger">Sign Out</a></p>
		</div>
		<div class="clearfix"><p class="text-info" Order Together</p></div>
    </div>
    
</head>
<body>
	<p><h1>Drexel Pizza</h1></p>
	<h3>Menu </h3>
    <hr>
	<span id="status"></span>
	<?php
	
		$user = 'root';
		$pass = '';
		$db = 'drexelpizza';

		$conn = new mysqli('localhost', $user, $pass, $db) or die('unable to connect database');
		if ($conn == true)
		{
			//echo "Successfully connected to database.";
		} 
		$sql = "SELECT * FROM menu";
		$result = $conn->query($sql);
		$adding = "INSERT INTO cart(id,userId,name,price,qty) Values (?,?,?,?,?)";
		
	if ($result->num_rows > 0) {
		
		echo "<table class=\'table\'>";
		echo "<thead class=\'thead-dark\'>";
		echo "<tr>";
		echo "<th scope=\'col\'>Item#</th>";
		echo "<th scope=\'col\'><center>Name</center></th>";
		echo "<th scope=\'col\'>Price</th>";
		echo "<th scope=\'col\'><center>Description</center></th>";
		echo "<th scope=\'col\'>Add</th>";
		echo "</thead>";

		while($row = $result->fetch_assoc()) {
			echo "<tbody>";
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td> $ ".number_format($row["price"],2)."</td>";
			echo "<td>".$row["description"]."</td>";
			echo"<td><form action='add.php' method='POST'>"
            . "<input type='hidden' name='id' id='id' value='".$row['id']."'>"
            ."<input type='hidden' name='name' id='name' value='".$row['name']."'>"
            ."<input type='hidden' name='price' id='price' value='".$row['price']."'>"
			. "<input type='number' name='dmenu' id ='".$row['id'].
                    "' min='1' max='9'>"
                    . "<input type='submit' id='add' value='add'></form></td>";

			echo"</tr>";
			echo "</tbody>";
		} 
		echo "</table>";

		


	} else {
		echo "0 results";
		trigger_error('Invalid query: ' . $conn->error);
	}
	$conn->close();
	?>
	<br>
	
	<hr>
	<p><a href="cart.php" class="btn btn-info">Check Out</a></p>
	
</body>
</html>