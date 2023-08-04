<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
     <form action="signupc.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
               <input type="text" 
                      name="name" 
                      placeholder="name"><br>
          <label>Email</label>
               <input type="text" 
                      name="email" 
                      placeholder="email"><br>
          <label>Password</label>
               <input type="text" 
                      name="password" 
                      placeholder="password"
                     ><br>
          <label>Mobile Number</label>
               <input type="number" 
                      name="mobile" 
                      placeholder="mobile"><br>
          <label>User Type:</label>
          <select name="roles">
               <option selected value="user">User</option>
               <option value="customer">Customer</option>
          </select><br><br>
     	<button type="submit">Sign Up</button>
     </form>
</body>
</html>