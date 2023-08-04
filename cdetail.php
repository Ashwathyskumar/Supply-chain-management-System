<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin:50px;">
       <h1>COMPANY DETAIL</h1>
       <br>
       <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Company Name</th>
                <th>Type</th>
                <th>Order_id</th>
                <th>Location</th>
                <td>
                    <a class="btn btn-primary btn-sm" href="order1.html">close</a>
                </td>
            </tr>
        </thead>
        <?php
        $conn = mysqli_connect('127.0.0.1:3307','root','','dbms1');
        if($conn-> connect_error){
            die("connection:" . $conn-> connect_error);
        }
        $sql = "SELECT * FROM company INNER JOIN clocation on clocation.company_id=company.company_id";
        $result = $conn-> query($sql);

        if($result-> num_rows >0)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                <td>".$row["company_id"]."</td>
                <td>".$row["name"]."</td>
                <td>".$row["type"]."</td>
                <td>".$row["order_id"]."</td>
                <td>".$row["location"]."</td>
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
