<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin:50px;">
       <h1>BILL</h1>
       <br>
       <table class="table">
        <thead>
            <tr>
                <th>cid</th>
                <th>Name</th>
                <th>oid</th>
                <th>Price</th>
                <td>
                    <a class="btn btn-primary btn-sm" href="order1.html">close</a>
                    <a class="btn btn-primary btn-sm" href="rem.php">REMINER</a>
                </td>
            </tr>
        </thead>
        <?php
        $conn = mysqli_connect('127.0.0.1:3307','root','','dbms1');
        if($conn-> connect_error){
            die("connection:" . $conn-> connect_error);
        }
        $sql = "SELECT  ID,name,order_id, totalCost FROM customer LEFT OUTER JOIN orderp ON customer.ID = orderp.c_id INTERSECT SELECT  ID,name,order_id, totalCost FROM customer RIGHT OUTER JOIN orderp ON customer.ID = orderp.c_id ";
        $result = $conn-> query($sql);

        if($result-> num_rows >0)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                <td>".$row["ID"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["order_id"]."</td>
                <td>".$row["totalCost"]."</td>
                </tr>";
            }
            echo"</table>";
        }
        else{
            echo "0 result";
        }
        $conn->close();
        ?>

       </table>
    </body>
</html>

<br>
<br>
<!DOCTYPE html>
<html>
<head>
	<title>PAYMENT</title>
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
  background-image: url(bill.png);
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
     <form action="billc.php" method="post">
     <?php include('db_conn.php');
          $query="SELECT * from customer";
          $sql=mysqli_query($conn,$query); ?>
     	<h2>PAYMENT</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
          <label>transaction ID</label>
               <input type="text" 
                      name="tid" 
                      placeholder="tid"
                      ><br>
          <label>DATE</label>
               <input type="date" 
                      name="pdate" 
                      placeholder="date"><br>
          <label>AMOUNT</label>
               <input type="number" 
                      name="price" 
                      placeholder="price"><br>
        <label>STATUS</label>
          <select name="status">
               <option selected value="paid">paid</option>
               <option value="pending">pending</option>
          </select><br>
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
   