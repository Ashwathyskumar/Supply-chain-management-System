<!DOCTYPE html>
<html>
<head>
	<title>USER</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
     <form action="userc.php" method="post">
     	<h2>USER</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>User ID</label>
               <input type="number" 
                      name="uid" 
                      placeholder="uid"
                      ><br>
          <label>Name</label>
               <input type="text" 
                      name="name" 
                      placeholder="name"><br>
          <label>Email</label>
               <input type="text" 
                      name="email" 
                      placeholder="email"><br>
          <label>Mobile Number</label>
               <input type="number" 
                      name="mobile" 
                      placeholder="mobile"><br>
          <label>Gender:</label>
          <select name="gender">
               <option selected value="Male">Male</option>
               <option value="Female">Female</option>
               <option value="Female">Other</option>
          </select>
     	<button type="submit">SUBMIT</button>
     </form>
</body>
</html>