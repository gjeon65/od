<!DOCTYPE html>
<!--
    Created on : 2017. 5. 28, PM 5:30:19
    Author     : Geun

    provide list of handguns
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Handgun Page</title>
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <div class="topBar">
        <?php  
        session_start();//session starts
        //to provide contents only to assigned user
        if(!isset($_SESSION['username'])){
        header("Location:login.php");
        }
        //greetings with user unique ID
        echo"Hi, ".$_SESSION['username']; ?> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="../controller/logout.php">Log Out</a> &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="cart.php">Your Cart</a>
    </div>

    <?php
        include_once '../model/model.php'; 
        
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
                    <p id='visible'>Handgun Page</p>
                </h3>
                <h4>
                    <p id='visible'>Welcome to handgun page.</p>
                </h4>
                <?php
        
        $sql_handgun = $db->query("select handgunID,handgunNam,handgunPrice,"
                . "handgunDesc,handgunURL from handguns");
                
        echo"<table border='2'>";
        echo"<tr>";
        
        echo"<th>Image</th>";
        echo"<th>Handgun Name</th>";
        echo"<th>Price</th>";
        echo"<th>Description</th>";
        echo"<th>Select Amount</th>";
        
        
        while ($row=$sql_handgun->fetch()){
            echo"<tr>";
            
            
            echo"<td><img src='".$row['handgunURL']."' class='scale-down'></td>";
            echo"<td>".$row['handgunNam']."</td>";
            echo"<td>$ ".$row['handgunPrice']."</td>";
            echo"<td style='width:50%'>".$row['handgunDesc']."</td>";
            echo"<td><form action='' method='POST'>&nbsp;&nbsp;"
            . "<input type='hidden' name='handgunID' value='".$row['handgunID']."'>"
            ."<input type='hidden' name='handgunNam' value='".$row['handgunNam']."'>"
            ."<input type='hidden' name='handgunPrice' value='".$row['handgunPrice']."'>"
            ."<input type='hidden' name='handgunURL' value='".$row['handgunURL']."'>"
                    . "<input type='number' name='handguns' id ='".$row['handgunID'].
                    "' min='1' max='50'>"
                    . "<input type='submit' value='add'></form></td>";
            
            echo"</tr>";
        }
        echo"</table>";
        
        echo"<br><br>";
        $handgunID = isset($_POST['handgunID']);
        $handgunPrice = isset($_POST['handgunPrice']);
        $handgunURL = isset($_POST['handgunURL']);
        $isGood = isset($_POST['handguns']);
        $isGoodNam = isset($_POST['handgunNam']);
       
        


        $proceed=false;
        if ($isGood&&$isGoodNam==true){
            if (!isset($_POST['handguns'||'handgunNam'])){
                
                $proceed =true;
            }
        }

        if($proceed==true){
        $handgunIDt = $_POST['handgunID'];
        $handgunPricet = $_POST['handgunPrice'];
        $handgunURLt = $_POST['handgunURL'];
        $isGoodt = $_POST['handguns'];
        $isGoodNamt = $_POST['handgunNam'];
           echo "<br><br>";
        $addHandgun = "INSERT INTO cart(gunID,gunNam,gunPrice,gunURL,gunAmount,userID)"
               . "VALUES (?,?,?,?,?,?)";
        
        
        if ($isGoodt <= 0 || $isGoodt ==''){
            echo "<center><h1><p id='visibleRed'>Please enter proper amount.</p></h1></center>";
            
        }else{
            echo "<center><h1><p id='visibleGreen'>Gun of your choice: ".$_POST['handgunNam'].
                    " and amount of ".$_POST['handguns']." has been added to cart.</p></h1></center>";
            $results = $db->prepare($addHandgun);
            $n = $results->execute([$handgunIDt,$isGoodNamt,$handgunPricet,$handgunURLt,$isGoodt,$_SESSION['username']]);
            $proceed=false;
            }
        }

        echo '<br>';
        ?>
            </center>
        </div>



</body>

</html>