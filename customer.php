<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
     <form action="customerc.php" method="post">
     	<h2>CUSTOMER</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>ID</label>
               <input type="number" 
                      name="cid" 
                      placeholder="cid"
                      ><br>
          <label>Name</label>
               <input type="text" 
                      name="name" 
                      placeholder="name"><br>
          <label>Email</label>
               <input type="text" 
                      name="email" 
                      placeholder="email"><br>
          <label>Address</label>
               <input type="text" 
                      name="address" 
                      placeholder="address"><br> 
          <label>Mobile Number</label>
               <input type="number" 
                      name="mobile" 
                      placeholder="mobile"><br>
          <label>User ID</label>
               <input type="number" 
                      name="uid" 
                      placeholder="uid"
                      >
     	<button type="submit">SUBMIT</button>
     </form>
</body>
</html>
//how to print hello world?