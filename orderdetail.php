<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin:50px;">
       <h1>ORDER DETAIL</h1>
       <br>
       <table class="table">
        <thead>
            <tr>
                <th>Order_ID</th>
                <th>Type</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>ORDER Date</th>
                <th>ORDER Time</th>
                <th>Sub Total</th>
                <td>
                    <a class="btn btn-primary btn-sm" href="order1.html">close</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="offer.php">apply offer</a>
                </td>
            </tr>
        </thead>
        <?php
        $conn = mysqli_connect('127.0.0.1:3307','root','','dbms1');
        if($conn-> connect_error){
            die("connection:" . $conn-> connect_error);
        }
        $sql = "SELECT * FROM orderp";
        $result = $conn-> query($sql);
        $sql1="SELECT SUM(totalCost),COUNT(order_id) from orderp";
        $result1=$conn->query($sql1);
        if($result-> num_rows >0)
        {
            while($row = $result-> fetch_assoc()){
                echo "<tr>
                <td>".$row["order_id"]."</td>
                <td>".$row["type"]."</td>
                <td>".$row["price"]."</td>
                <td>".$row["amountordered"]."</td>
                <td>".$row["odate"]."</td>
                <td>".$row["otime"]."</td>
                <td>".$row["totalCost"]."</td>
                </tr>";
            }
            echo"</table>";

        }
        else{
            echo "0 result";
        }
        while($row = mysqli_fetch_array($result1)){
            echo " <strong> ORDERS PLACED  : </strong>" .  $row['COUNT(order_id)'];
            echo "<br />";
            echo "<br />";
            echo " <strong> TOTAL COST  :</strong>" . $row['SUM(totalCost)'];
           
        }
        $conn->close();
        ?>

       </table>
    </body>
</html>
   