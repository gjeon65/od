<!DOCTYPE html>
<!--
    Created on : 2017. 6. 01, PM 5:20:39
    Author     : Geun

    This is your shopping bag(cart) that are selected from shopping pages.
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Cart Page</title>
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
        <?php
        include_once '../model/model.php';
        
        $currentUser=$_SESSION['username'];
        
        $viewCart=$db->query("SELECT * FROM cart where userID='$currentUser'");
        
        ?>
            <div class="shop">
                <center>
                    <h3>
                        <p id='visible'>Your cart page.</p>
                    </h3>

                    <?php
        
        echo"<table border='2'>";
        echo"<tr>";
        echo"<th>ID</th>";
        echo"<th>Image</th>";
        echo"<th>Handgun Name</th>";
        echo"<th>Price per Unit</th>";
        
        echo"<th>Select Amount</th>";
        echo"<th>Sub total</th>";
        echo"<th>Remove</th>";
        $total=0;
        while ($rowCart=$viewCart->fetch()){
            echo"<tr>";
            
            echo"<td>".$rowCart['gunID']."</td>";
            echo"<td><img src='".$rowCart['gunURL']."' class='scale-down'></td>";
            echo"<td>".$rowCart['gunNam']."</td>";
            echo"<td>$ ".$rowCart['gunPrice']."</td>";
            
            echo"<td>".$rowCart['gunAmount']."</td>";
            echo "<td>$ ".$rowCart['gunPrice']*$rowCart['gunAmount']."</td>";
            echo "<td><form action='' method='POST'>"
            . "<input type='hidden' name='deleteID' value='".$rowCart['cartID']."'>"
                    . "<input type='submit' value='delete'></form></td>";
            
            $t =$rowCart['gunPrice']*$rowCart['gunAmount'];
            $total = $total+$t;
            echo"</tr>";
            
        }
        echo"</table>";
        echo"<br><br>";
        echo"<div id='total'>Total: $ ".$total."</div>";
       
        
        $delete= isset($_POST['deleteID']);
        echo isset($_POST['deletedID']);
        if($delete==true){
            $deleteID=$_POST['deleteID'];
            
            $delSQL="DELETE FROM cart WHERE cartID=?";
            $deleted = $db->prepare($delSQL);
            $x=$deleted->execute([$deleteID]);
            header("Refresh:0");
        }
        
        
        ?>

                        <br><br><a href="handgun.php" style="background-color:#cc66ff">Go Back to hangun shop</a> &nbsp;&nbsp;&nbsp;
                        <a href="rifle.php" style="background-color:#ffffa0">Go Back to rifle shop</a>
                        <br><br>

                        <form actoin="" method="POST">
                            <input type="hidden" value="clear" name="buy">
                            <input type="submit" value="Buy">
                        </form>
                        <?php 
        if (isset($_POST['buy'])){
            
            $buy="delete from cart where userID='$currentUser'";
            if($db->query($buy)==TRUE){
                echo "<h2>You have purchased everything. Page will reload in 2 seconds.</h2>";
                
            }else{
                echo "Error buying: ".$db->error;
            }
            
            header("Refresh:2");
            
        }
        ?>
                </center>
            </div>
</body>

</html>