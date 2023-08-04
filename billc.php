<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['tid']) && isset($_POST['price']) && isset($_POST['status'])  && isset($_POST['pdate']) && isset($_POST['cid'])  )
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $tid = validate($_POST['tid']);
	$pdate = validate($_POST['pdate']);
    $price = validate($_POST['price']);
	$status = validate($_POST['status']);
	$cid = validate($_POST['cid']);

	if (empty($tid)) {
		header("Location: billing.php?error=id is required");
	    exit();
	}
	
	else if(empty($price)){
        header("Location: billing.php?error=price is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM payment ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  payment(transaction_id,pdate,amount,status,c_id) VALUES('$tid','$pdate','$price','$status','$cid')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: billing.php?success=Your bill is ready ");
	         exit();
           }else {
	           	header("Location: billing.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: order1.html");
	exit();
}