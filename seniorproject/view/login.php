<!DOCTYPE html>
<!--
    Created on : 2017. 5. 27, PM 6:10:29
    Author     : Geun

    this is login page. User will provide their own unique ID and password
    to login to the website.

    if null provided, it will output to let user know that all fields are
    required.

    if wrong ID or password was provided, it will display either wrong ID || passowrd.
    
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../main.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <?php 
        session_start();
        ?>
    <div class="login">
        <center>
            <h4>
                <p id="visible">This is sign in page. Please enter user ID and Password below box.</p>
            </h4>
            <h3>
                <p id='white'>Enter your ID:</p>
            </h3>
            <input type="text" name='username1' id="username1" />
            <br>
            <h3>
                <p id='white'>Enter your Password:</p>
            </h3>
            <input type="password" id="password1" name="password1" />
            <br><br>
            <input type="button" id="submitLog" value="Log in" />

            <br><br>
            <h4>
                <p id='white'>Or you can register from following link: </p>
            </h4>
            <a href="register.php" style="background-color:#ff3333">Register</a>
        </center>
    </div>
</body>

</html>