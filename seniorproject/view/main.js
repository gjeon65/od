/* 
    Created on : 2017. 5. 27, PM 5:51:40
    Author     : Geun

    This is js page that will held button actions + passing values
    to controller php pages
 */



$(document).ready(function () {
    $("#submit").click(function () {
        console.log("it clicks");

        username = $("#username").val();
        password = $("#password").val();
        memberNam = $("#memberNam").val();


        window.location.href = "../controller/register.php?username=" + username +
            "&password=" + password +
            "&memberNam=" + memberNam;

    });

    $("#submitLog").click(function () {
        console.log("it clicks");

        username = $("#username1").val();
        console.log('get user');
        password = $("#password1").val();
        console.log('get val');


        window.location.href = '../controller/login.php?username=' + username + "&password=" + password;

    });

    $("#handgun").click(function () {
        console.log("it clicks");

        amount = $('amount[]').val();

        $.post("../controller/toCart.php", {
            'amount[]': [amount]
        })



    });

});