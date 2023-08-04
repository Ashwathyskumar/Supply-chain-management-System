<!DOCTYPE html>
<html>
<head>
	<title>ORDER</title>
    <style>
        input{
            width: 100%;
            padding: 12px 20 px;
            margin:8px 0;
            box-sizing:border-box;
        }
        input:focus{
            background-color: lightblue;
        }
        label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
.container {
  border-radius: 5px;
  background-image: url(images.png);
background-repeat: no-repeat;
  padding: 20px;
  display: flex;
    justify-content:center;
}
.form-center{
    display: flex;
    justify-content:center;
}
    </style>
</head>
<body>
<div class="container">
     <form action="orderc.php" method="post">
     <?php include('db_conn.php');
          $query="SELECT * from customer";
          $sql=mysqli_query($conn,$query); ?>
     	<h2>ORDER</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>ORDER ID</label>
               <input type="number" 
                      name="oid" 
                      placeholder="oid"
                      ><br>
          <label>Type</label>
               <input type="text" 
                      name="type" 
                      placeholder="type"><br>
          <label>Price</label>
               <input type="number" 
                      name="price" 
                      placeholder="price"><br>
          <label>Quantity</label>
               <input type="number" 
                      name="quantity" 
                      placeholder="quantity"><br>
          <label>Order Date</label>
               <input type="date" 
                      name="odate" 
                      placeholder="odate"><br>
          <label>Order Time</label>
               <input type="time" 
                      name="otime" 
                      placeholder="otime"><br> 
          <label>CUSTOMER ID</label>
               <select name="cid" >
                <?php while($row=mysqli_fetch_array($sql)){?>
                <option><?php echo $row['ID']; ?></option>
                <?php }?>
               </select>
     	<button type="submit">SUBMIT</button>
     </form>
</div>
</body>
</html>