<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['cid']) && isset($_POST['name'])  && isset($_POST['type']) && isset($_POST['oid']) )
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $cid = validate($_POST['cid']);
	$name = validate($_POST['name']);
	$type = validate($_POST['type']);
    $oid = validate($_POST['oid']);
	//$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($name)) {
		header("Location: company.php?error=Company Name is required");
	    exit();
	}
	if(empty($cid)){
        header("Location: company.php?error=company id is required");
	    exit();
	}
    else if(empty($oid)){
        header("Location: company.php?error=order id is required");
	    exit();
	}
	else if(empty($type)){
        header("Location: company.php?error=type is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM company ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  company(company_id,name,type,order_id) VALUES('$cid','$name','$type','$oid')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: company.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: company.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: order1.html");
	exit();
}