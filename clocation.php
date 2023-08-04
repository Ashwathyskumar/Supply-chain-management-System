
<!DOCTYPE html>
<html>
<head>
	<title>COMPANY location</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
     <form action="clocationc.php" method="post">
     <?php include('db_conn.php');
          $query="SELECT * from company";
          $sql=mysqli_query($conn,$query); ?>
     	<h2>COMPANY location</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>location</label>
               <input type="text" 
                      name="location" 
                      placeholder="location"><br>
          <label>COMPANY ID</label>
               <select name="cid" >
                <?php while($row=mysqli_fetch_array($sql)){?>
                <option><?php echo $row['company_id']; ?></option>
                <?php }?>
               </select><br>
     	<button type="submit">SUBMIT</button>
     </form>
</body>
</html>