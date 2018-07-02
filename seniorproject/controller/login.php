<?php
session_start();
include_once ('../model/model.php');

$username = $_GET['username'];
$password = $_GET['password'];

$_SESSION['username'] = $username;
if ($username == '' || $password ==''){
    echo'<head><meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../main.css" /></head>';
    echo"<body id='what'>";
    echo "<center><h2><p id='visibleRed'>You must enter all fields</p></h2></center>";
    echo"<center><p id='visibleRed'>This page will automatically refresh in 2 seconds.</p></center>";
    echo"</body>";
    header('Refresh: 2; URL=../view/login.php');
    
}else{
    $sql ="select * from member where username = '$username' AND "
            . "password = '$password'";
    $query = $db->query($sql);
    
   
    echo '<br><br><br>';
    
    if ($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
    }
    echo '<br><br><br>';
    if($stmt === false){
        
        echo "Could not successfully run query ($sql) from DB: ".mysql_error();
        exit();
    }
    if(mysqli_stmt_num_rows($stmt) > 0){
        
        echo 'You have logged in successfully.';
        header('Location: ../view/main.php');
        
    }else{
    echo'<head><meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../main.css" /></head>';
    echo'<body id="noPass">';
        echo "<center><h1><p id='visibleRed'>User name and password do not match or you don't"
        . " have account with us. </h1></p>";
        echo '<p>This page will automatically refresh in 2 seconds or <a href=../view/login.php>Click Here</a> to go back.</p>';
        echo "</center></body>";
         header('Refresh: 2; URL=../view/login.php');
        
    }
   
}
    
