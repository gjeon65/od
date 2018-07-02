<!DOCTYPE html>
<!--
    Created on : 2017. 5. 27, PM 5:57:23
    Author     : Geun

    This is page is provided if user passed age validation. The user will have to enter 
    unique user ID to register. To complete registeration, user will have to provide password
    and name. All fields are required to register. 

    If empty field is provided, page will prompt that user needs to provide all area.

    If unique ID already exists, page will prompt to try another ID.

    
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<body>

    <br>

    <div class="register">
        <center>
            <p id='visible'>
                <h1>
                    <p id='visible'>Registeration
                        <p>
                </h1>
                <h4>
                    <p id='visible'>Put in your Username, Password, Name and click 'Register' button. If you successfully registered. Go
                        to <a href='../view/login.php' style="background-color: #ff3333">Log in page</a>. with registered
                        ID and Password.</h4>
                </p>

                <h3>
                    <p id='red'>User name: </p>
                </h3>

                <input type="text" name="username" id="username" />
                <br>
                <h3>
                    <p id='red'>Password: </p>
                </h3>

                <input type="text" name="password" id="password" />
                <br>
                <h3>
                    <p id='red'>Your Name: </p>
                </h3>

                <input type="text" name="memberNam" id="memberNam" />
                <br><br>
                <input type="button" id='submit' value="Register" />
                <br><br>
                <span id='status'></span>
                <br></center>
    </div>



</body>

</html>