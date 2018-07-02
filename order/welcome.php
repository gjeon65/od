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
	<p>List of our restaurant:</p>
    <h3><a href =./drexelpizza.php>Drexel Pizza</a></h3>
</body>
</html>