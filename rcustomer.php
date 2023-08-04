<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body style="margin:50px;">
       <h1>REGULAR CUSTOMER</h1>
       <br>
       <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <td>
                    <a class="btn btn-primary btn-sm" href="home.php">close</a>
                </td>
            </tr>
        </thead>
        <?php
        $conn = mysqli_connect('127.0.0.1:3307','root','','dbms1');
        if($conn-> connect_error){
            die("connection:" . $conn-> connect_error);
        }
        $sql = "select ID,name from customer union  select ID,name from rcustoner";
        $result = $conn-> query($sql);

        if($result-> num_rows >0)
        {
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                <td>".$row["ID"]."</td>
                <td>".$row["name"]."</td>
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
   