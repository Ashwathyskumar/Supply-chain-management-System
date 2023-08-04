<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['cid']) && isset($_POST['location']))
 {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $cid = validate($_POST['cid']);
	$location = validate($_POST['location']);
	if (empty($location)) {
		header("Location: clocation.php?error=Location is required");
	    exit();
	}
	else

	{

		// hashing the password
        $sql = "SELECT * FROM clocation ";
		$result = mysqli_query($conn, $sql);
           $sql2 = "INSERT INTO  clocation(location,company_id) VALUES('$location','$cid')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: clocation.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: clocation.php?error=unknown error occurred");
		        exit();
           }
		}
	}	
else{
	header("Location: company.php");
	exit();
}