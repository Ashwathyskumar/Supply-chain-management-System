<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['cid']) && isset($_POST['name'])  && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) )
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $cid = validate($_POST['cid']);
	$uname = validate($_POST['name']);
	$email = validate($_POST['email']);
	$mobile = validate($_POST['mobile']);
	$address = validate($_POST['address']);
    $uid = validate($_POST['uid']);
	//$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: user.php?error=Customer Name is required");
	    exit();
	}
	if(!preg_match("/[a-zA-Z\s]+$/",$uname)){
		header("Location: customer.php?error=Customer Name is invalid");
	    exit();

	}
	if(empty($uid)){
        header("Location: customer.php?error=user id is required");
	    exit();
	}
    else if(empty($cid)){
        header("Location: customer.php?error=Email is required");
	    exit();
	}
	else if(empty($email)){
        header("Location: customer.php?error=Email is required");
	    exit();
	}
	else if(empty($mobile)){
        header("Location: customer.php?error=mobile number is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM customer ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  customer(ID,name,email,address,mobileno,userid) VALUES('$cid','$uname','$email','$address','$mobile','$uid')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: customer.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: customer.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: home.php");
	exit();
}