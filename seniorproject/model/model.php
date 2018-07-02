<?php
$usr ='root';
$pw='';

//connect to db and check for any error
try{
$db = new PDO("mysql:host=localhost;dbname=info153",$usr,$pw);
echo "<h4>Connection Status: ";
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "You are connected to database.</h4>";
}catch(PDOException $e){
    echo "connection failed: </h4><br>".$e->getMessage();
    echo '<hr>';
}
  
$link = mysqli_connect('localhost', $usr, $pw, 'info153')          
?>


