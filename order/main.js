// JavaScript source code
$(document).ready(function(){
    $("#add").click(function(){
        
        console.log("Clicks");
		id = $("#id").val();
        name = $("#name").val();
		price = $("$price").val();
        
        console.log("got value");
        $.post("add.php?name="+ id,name,price,
        
        function(data, status){
            $("#status").text(data + " record(s)," + name + ", has been added.");
        });
    });
});