<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['password'])  && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['roles']) )
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['name']);
	$pass = validate($_POST['password']);
	$email = validate($_POST['email']);
	$mobile = validate($_POST['mobile']);
	$roles = validate($_POST['roles']);
	//$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required");
	    exit();
	}
	if(!preg_match("/[a-zA-Z\s]+$/",$uname)){
		header("Location: signup.php?error=User Name is invalid");
	    exit();

	}
	if(empty($pass)){
        header("Location: signup.php?error=Password is required");
	    exit();
	}
	else if(strlen($pass)<6){
		header("Location: signup.php?error= password is invalid(6-8)");
	    exit();
	}
	else if(strlen($pass)>9){
		header("Location: signup.php?error= password is invalid(6-8)");
	    exit();
	}
	else if(empty($email)){
        header("Location: signup.php?error=Email is required");
	    exit();
	}
	else if(empty($mobile)){
        header("Location: signup.php?error=mobile number is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM signup ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  signup(Name, Password,Email,MobileNo,role) VALUES('$uname', '$pass', '$email','$mobile','$roles')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: home.php");
	exit();
}