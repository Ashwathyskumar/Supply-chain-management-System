<!DOCTYPE html>
<html>
<head>
	<title>COMPANY</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
     <form action="companyc.php" method="post">
     <?php include('db_conn.php');
          $query="SELECT * from orderp";
          $sql=mysqli_query($conn,$query); ?>
     	<h2>COMPANY</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>COMPANY ID</label>
               <input type="number" 
                      name="cid" 
                      placeholder="cid"
                      ><br>
          <label>Name</label>
               <input type="text" 
                      name="name" 
                      placeholder="name"><br>
          <label>Type</label>
               <input type="text" 
                      name="type" 
                      placeholder="type"><br>
          <label>ORDER ID</label>
               <select name="oid" >
                <?php while($row=mysqli_fetch_array($sql)){?>
                <option><?php echo $row['order_id']; ?></option>
                <?php }?>
               </select><br><br><br>
     	<button type="submit">SUBMIT</button>
         <a href="clocation.php" class="btn btn-primary">Company Location</a><br><br>
         <a href="cdetail.php" class="btn btn-primary">View Company Details</a>
     </form>
</body>
</html>