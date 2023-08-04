<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['oid']) && isset($_POST['price']) && isset($_POST['type'])  && isset($_POST['odate']) && isset($_POST['otime']) && isset($_POST['quantity']) && isset($_POST['cid'])  )
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $oid = validate($_POST['oid']);
	$type = validate($_POST['type']);
	$odate = validate($_POST['odate']);
	$otime = validate($_POST['otime']);
    $price = validate($_POST['price']);
	$quantity = validate($_POST['quantity']);
	$cid = validate($_POST['cid']);
	$total = $price * $quantity;
	//$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($type)) {
		header("Location: order.php?error=type is required");
	    exit();
	}
	if(!preg_match("/[a-zA-Z\s]+$/",$type)){
		header("Location: order.php?error=Customer Name is invalid");
	    exit();

	}
	else if(empty($quantity)){
        header("Location: order.php?error=quantity is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM orderp ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  orderp(order_id,type,odate,otime,amountordered,price,totalCost,c_id) VALUES('$oid','$type','$odate','$otime','$quantity','$price','$total','$cid')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: order.php?success=Your ORDER has been placed successfully");
	         exit();
           }else {
	           	header("Location: order.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: home.php");
	exit();
}