<!DOCTYPE html>
<!--
    Created on : 2017. 5. 27, PM 5:50:51
    Author     : Geun

    This is very first page of the Website, which will varify if the user
    is an adult. I achieved this by setting up a variable that tracks of 
    current date then it will compare with user's birth day and see if
    he/she lived over 6570 days. (18 years in days)

    If underage, the page will not proceed to next step to prevent user to 
    navigate on site.

    If not, link will be provided to the user so  he/she can either 
    register or login to our website.
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="main.js"></script>

    <title>Project</title>
</head>

<body id="view_index">
    <div class="putCenter">
        <center>
            <h1><p id='visibleRed'>Warning</p></h1>
            <h3><p id='visibleRed'>You must over 18 years old to enter this site.
                    Please log-in or register to verify your age.</p></h3>
        
            <br>
            <form action="" method="get">
                <input type="date" name="prac" id="prac" />
                <input type="submit">
            </form>
            <?php
        echo'<h3><p id="blue">Current Date: ';
        $nows = date("Y-m-d");//grab current time
        $today_dt = strtotime($nows);//grab current date string as time obj
        echo $nows.'</p></h3>';
        
        
        echo'<br><br>';
        $prac = isset($_GET['prac'])?$_GET['prac']:null;
        if ($prac != null){
        $bday_dt = strtotime($prac);//catch b-day
        
        $datediff = $today_dt-$bday_dt; //to calculate difference between b-day and current day.
        
        $dt_in_diff = floor($datediff / (60*60*24));//to output human readable format
        
        $datesIn18Year =6570;//days in 18 years (18*365)
            if($dt_in_diff<$datesIn18Year){
                
                echo '<h1><p id="visibleRed">You are under age. You may not proceed.</p></h1>';
                exit();
            }else{
                echo '<br><p id="visible">You are over 18. Welcome to our Gun Shop!<br>'
                . ' Click following link.</p><br><br>';
                echo '<a href="register.php"style="background-color:#ff6347">Register</a>&nbsp;&nbsp;';//register page
                echo '<a href ="login.php"style="background-color:#ff6347">Login</a>';//login page
            }
        }
        ?>
        </center>
    </div>

</body>

</html>