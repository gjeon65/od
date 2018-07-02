<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<?php
	include_once './config.php';
		$currentUser=$_SESSION['username'];
		$nid='';
		$query = mysqli_query($link,"SELECT * FROM users where username='$currentUser' ");
		while($result = mysqli_fetch_array($query)){
			$nid = $result["id"];
		}
		
	$db  = mysqli_select_db( menu ,DB_NAME );
	if(isset($_POST['add'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$amountt = $_POST['dmenu'];
	$userId = $nid;
	
	if ($amountt == 0 || $amountt=='')
	{
		echo "";
            
    }
	else{
            $q = mysqli_query($link,"insert into cart(id,userId,name,price,qty) values (\'$id\',\'$userId\', \'$name\',\'$price\',\'$amountt\')");
        }
/*
	$rID = isset($_POST['id']);
		$rNam = isset($_POST['name']);
		$Price = isset($_POST['price']);
		$amount = isset($_POST['dmenu']);


		$proceed=false;
		if ($amount&&$rNam==true){
            if (!isset($_POST['dmenu'||'rNam'])){
                
                $proceed =true;
            }
        }
		 if($proceed==true){
		 $idt = $_POST['id'];
		 $namet = $_POST['name'];
		 $pricet = $_POST['price'];
		 $amountt = $_POST['dmenu'];

		 $add ="INSERT INTO cart(id,userId,name,price,qty)"
			. "values (?,?,?,?,?)";
		
		if ($amountt == 0 || $amountt==''){
            echo "<center><h1><p id='visibleRed'>Please enter proper amount.</p></h1></center>";
            
        }else{
            echo "<center><h1><p id='visibleGreen'>your choice: ".$_POST['name'].
                    " and amount of ".$_POST['dmenu']." has been added to cart.</p></h1></center>";
            $results = $db->prepare($add);
            $n = $results->execute([$idt,$_SESSION['username'],$namet,$pricet,$amountt,]);
            $proceed=false;
            }
        }
		*/
		?>