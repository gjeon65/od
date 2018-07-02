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
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; background-color: #99d6ff;}
    </style>
	<div class="page-header">
		<div class="pull-left">
        <h5>Welcome, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to Order Together.</h5>
		</div>
		<div class="pull-right">
		<p><a href="logout.php" class="btn btn-danger">Sign Out</a></p>
		</div>
		<div class="clearfix"><p> <h3>Order Together</h3></p></div>
    </div>
    
</head>
<body>
	<p><b><?php echo htmlspecialchars($_SESSION['username']); ?></b>'s cart</p>
    <?php
		include_once './config.php';
		$currentUser=$_SESSION['username'];
		$query = mysqli_query($link,"SELECT * FROM users where username='$currentUser' ");
		while($result = mysqli_fetch_array($query)){
			$nid = $result["id"];
		}
		$showCart = mysqli_query($link,"SELECT * FROM cart where userId='$nid' ");
		$total = 0;
		echo "<table class=\'table\'>";
		echo "<thead class=\'thead-dark\'>";
		echo "<tr>";
		echo "<th scope=\'col\'>Item#</th>";
		echo "<th scope=\'col\'><center>Name</center></th>";
		echo "<th scope=\'col\'>Price</th>";
		echo "</thead>";

		while($cartr = mysqli_fetch_array($showCart)){
			
			echo "<tbody>";
			echo "<tr>";
			echo "<td>".$cartr["id"]."</td>";
			echo "<td>".$cartr["name"]."</td>";
			echo "<td> $ ".number_format($cartr["price"],2)."</td>";
			$total += $cartr["price"];
			echo"</tr>";
			echo "</tbody>";
		} echo "</table>";
		echo "Total: ".$total;
	?>
	<hr>
	<p>PayPal</p>
</body>

</html>