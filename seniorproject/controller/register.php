<?php
require_once ('../model/model.php');
require_once('../view/register.php');

$userNam =$_GET['username'];
$password=$_GET['password'];
$memberNam =$_GET['memberNam'];
//$userNam =isset($_GET['username'])?$_GET['username']:null;
//$password=isset($_GET['password'])?$_GET['password']:null;
//$memberNam =isset($_GET['memberNam'])?$_GET['memberNam']:null;
if($userNam == '' || $password == '' || $memberNam == ''||$userNam ==' '){
    echo'<head><meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../main.css" /></head>';
    echo"<body id='noNull'>";
    echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    echo"<br><br><br><br><br>";
    echo "<center><h2><p id='visibleRed'>You must enter all fields</p></h2><center>";
    echo"<p>This page will automatically refresh in 2 seconds.</p>";
    echo"</body>";
    header('Refresh: 2; URL=../view/register.php');
    
}else{

$checkForID="select * from member where username='$userNam'";
$isGo =$db->query($checkForID);
$num_rows = $isGo->rowCount();

if($num_rows>0){
    echo"<center>";
    echo "<h2><p id='visibleRed'>That ID has been taken. Try something other.</p></h2>";
    echo "<a href='../view/register.php'>Go Back</a> this page will be refreshed so you may 
        register";
    echo"</center>";
    header('Refresh:2, URL=../view/register.php');
    exit();
    }else{
        $sql ="insert into member (username,password,memberNam)"
        ." values (?,?,?)";

        $results = $db->prepare($sql);
        $n = $results->execute([$userNam,$password,$memberNam]);

        
        
        echo "";
        echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        echo"<br><br><br><br><br>";
        echo"<center>";
        echo "<h1><p id='visible'><b>You are successfully registered into our database!</h3></p> <h2><p id='visibleRed'>"
        .$memberNam.
                "</p></h2><h3> <p id='visibleRed'>You can now login and buy weapons at our web!"
                . "You will be automatically go to login page within 2 seconds"
                . "or click</b></p></h3>"."<h3><a href=../view/login.php>Login here</a></h1>";
        echo"</center>";
        header('Refresh: 2, URL=../view/login.php ');
    }        


}
    






?>

