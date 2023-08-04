<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color:#77CCFF; }

th {
  background-color: #0066ff;
  color: white;
}
</style>
    </head>
    <body style="margin:50px;">
       <h1>REMINDER</h1>
       <br>
       <table class="table">
        <thead>
            <tr>
                <th>CUSTOMER ID</th>
                <th>MESSAGE</th>
                <td>
                    <a class="btn btn-primary btn-sm" href="billing.php">close</a>
                </td>
            </tr>
        </thead>
        <?php
        $conn = mysqli_connect('127.0.0.1:3307','root','','dbms1');
        if($conn-> connect_error){
            die("connection:" . $conn-> connect_error);
        }
        $sql = "SELECT * FROM reminder";
        $result = $conn-> query($sql);
        if($result-> num_rows >0)
        {
            while($row = $result-> fetch_assoc()){
                echo "<tr>
                <td>".$row["c_id"]."</td>
                <td>".$row["message"]."</td>
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
   