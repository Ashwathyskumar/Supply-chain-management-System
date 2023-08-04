<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['uid'])  && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['gender']) )
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $uid = validate($_POST['uid']);
	$uname = validate($_POST['name']);
	$email = validate($_POST['email']);
	$mobile = validate($_POST['mobile']);
	$gender = validate($_POST['gender']);
	//$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: user.php?error=User Name is required");
	    exit();
	}
	if(!preg_match("/[a-zA-Z\s]+$/",$uname)){
		header("Location: user.php?error=User Name is invalid");
	    exit();

	}
	if(empty($uid)){
        header("Location: user.php?error=user id is required");
	    exit();
	}
	else if(strlen($pass)>5){
		header("Location: user.php?error= user id is invalid(<5)");
	    exit();
	}
	else if(empty($email)){
        header("Location: user.php?error=Email is required");
	    exit();
	}
	else if(empty($mobile)){
        header("Location: user.php?error=mobile number is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM user  ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  user(userid,name,contact,email,gender) VALUES('$uid','$uname','$email','$mobile','$gender')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: user.php?success=Your account has been created successfully");
             header("Location: home.php");
	         exit();
           }else {
	           	header("Location: user.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: home.php");
	exit();
}