<!DOCTYPE html>
<!--
    Created on : 2017. 5. 28, PM 6:35:57
    Author     : Geun

    provide list of rifles
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Rifle Page</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<body>
    <div class="topBar">
        <?php  
        session_start();
        
        if(!isset($_SESSION['username'])){
        header("Location:login.php");
        }
        
        echo"Hi, ".$_SESSION['username']; ?> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../controller/logout.php">Log Out</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="cart.php">Your Cart</a>
    </div>
    <?php
        
        include_once '../model/model.php';//get model so can access list of rifles
        
        echo'<form method="get">';
        echo '<p id="topMenu">Choose which gun would like to shop?</p>';
        echo '<select name="getGun">';
        echo    '<option value="1">Handguns</option>';
        echo    '<option value="2">Rifles</option>';
        echo    '<option value="3">Main Page</option>';
        echo '</select>&nbsp;';
        echo '<button id="go">Go</button>';
        echo '</form>';
        
        $sID = (isset($_GET['getGun'])?$_GET['getGun']: null);
        
        if($sID==1){
            header('Location: handgun.php');
        }elseif($sID==2){
            header('Location: rifle.php');
        }elseif($sID==3){
            header('Location: main.php');
        }
        
        ?>
        <hr>
        <div class="shop">
            <center>
                <h3>
                    <p id='visible'>Rifle Page</p>
                </h3>
                <h4>
                    <p id='visible'>Welcome to Rifle page.</p>
                </h4>

                <?php
        
        $sql_rifle = $db->query("select rifleID,rifleNam,riflePrice,"
                . "rifleDesc,rifleURL from rifles");
                
        echo"<table border='2'>";
        echo"<tr>";
        
        echo"<th>Image</th>";
        echo"<th>Rifle Name</th>";
        echo"<th>Price</th>";
        echo"<th>Description</th>";
        echo"<th>Select Amount</th>";
        
        
        while ($rowr=$sql_rifle->fetch()){
            echo"<tr>";
            
            
            echo"<td><img src='".$rowr['rifleURL']."' class='scale-down'></td>";
            echo"<td>".$rowr['rifleNam']."</td>";
            echo"<td>$ ".$rowr['riflePrice']."</td>";
            echo"<td style='width:50%'>".$rowr['rifleDesc']."</td>";
            echo"<td><form action='' method='POST'>&nbsp;&nbsp;"
            . "<input type='hidden' name='rifleID' value='".$rowr['rifleID']."'>"
            ."<input type='hidden' name='rifleNam' value='".$rowr['rifleNam']."'>"
            ."<input type='hidden' name='riflePrice' value='".$rowr['riflePrice']."'>"
            ."<input type='hidden' name='rifleURL' value='".$rowr['rifleURL']."'>"
                    . "<input type='number' name='rifles' id ='".$rowr['rifleID'].
                    "' min='1' max='50'>"
                    . "<input type='submit' value='add'></form></td>";
            
            echo"</tr>";
        }
        echo"</table>";
        
        echo"<br><br>";
        $rifleID = isset($_POST['rifleID']);
        $riflePrice = isset($_POST['riflePrice']);
        $rifleURL = isset($_POST['rifleURL']);
        $amount = isset($_POST['rifles']);
        $rifleNam = isset($_POST['rifleNam']);
       
        


        $proceed=false;
        if ($amount&&$rifleNam==true){
            if (!isset($_POST['rifles'||'rifleNam'])){
                
                $proceed =true;
            }
        }

        if($proceed==true){
        $rifleIDt = $_POST['rifleID'];
        $riflePricet = $_POST['riflePrice'];
        $rifleURLt = $_POST['rifleURL'];
        $amountt = $_POST['rifles'];
        $rifleNamt = $_POST['rifleNam'];
           echo "<br><br>";
        $addRifle = "INSERT INTO cart(gunID,gunNam,gunPrice,gunURL,gunAmount,userID)"
               . "VALUES (?,?,?,?,?,?)";
        
        
        if ($amountt == 0 || $amountt==''){
            echo "<center><h1><p id='visibleRed'>Please enter proper amount.</p></h1></center>";
            
        }else{
            echo "<center><h1><p id='visibleGreen'>Gun of your choice: ".$_POST['rifleNam'].
                    " and amount of ".$_POST['rifles']." has been added to cart.</p></h1></center>";
            $results = $db->prepare($addRifle);
            $n = $results->execute([$rifleIDt,$rifleNamt,$riflePricet,$rifleURLt,$amountt,$_SESSION['username']]);
            $proceed=false;
            }
        }

        echo '<br>';
        ?>
            </center>
        </div>




</body>

</html>