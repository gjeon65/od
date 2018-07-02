<!DOCTYPE html>
<!--
    Created on : 2017. 5. 27, PM 6:13:13
    Author     : Geun

    This is main page of the web site where user can navigate to other pages that display
    list of guns.

    drop box will take user to specific pages.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<body>
    <div class="topBar">
        <?php  session_start();//session start
        //to provide contents only to those who are signed in
        if(!isset($_SESSION['username'])){
        header("Location:login.php");
        }
        echo"Hi, ".$_SESSION['username']; ?> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../controller/logout.php">Log Out</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="cart.php">Your Cart</a>

        
    </div>

    <div id="centerIt">
        <center>
            <br><br>
            <h2>
                <p id="visible">Welcome to our gun shop. You can buy whatever we have on our database. Use drop box below to naviate to specific
                    gun page.</p>
            </h2>
        </center>

        <?php
       
        
        echo'<center><form method="get">';
        echo '<h3><p id="visible">Choose which gun would like to shop?</p></h3>';
        echo '<select name="getGun">';
        echo    '<option value="1">Handguns</option>';
        echo    '<option value="2">Rifles</option>';
        echo '</select>&nbsp;';
        echo '<button id="go">Go</button>';
        echo '</form></center>';
        
        $sID = (isset($_GET['getGun'])?$_GET['getGun']: null);
        
        if($sID==1){
            header('Location: handgun.php');
        }elseif($sID==2){
            header('Location: rifle.php');
        }
        ?>
            <br>
    </div>
</body>

</html>