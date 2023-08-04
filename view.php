<?php 

    require_once("crudcon.php");
    $query = " select * from rcustoner ";
    $result = mysqli_query($con,$query);

?>
<style>
    body{
        text-align:center;
        align-items:center;
    }
    .row{
        margin-top:150px;
        margin-left:600px;
     }
     .container {
  border-radius: 5px;
  padding: 20px;
  display: flex;
  justify-content:center;
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <title>View Records</title>
</head>
<body style="margin:50px;">
<h2>REGULAR CUSTOMER</h2>
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td>ID</td>
                                <td>name</td>
                               <td>Edit</td>
                                <td>Delete</td>
                            </tr>
<?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $ID = $row['ID'];
                                        $name = $row['name'];
                                       
                            ?>
                                    <tr>
                                        <td><?php echo $ID?></td>
                                        <td><?php echo $name ?></td>
                                        <td><a class="btn btn-primary btn-sm" href="you.php?GetID=<?php echo $ID?>">Edit</a></td>
                                        <td><a  class="btn btn-primary btn-sm" href="delete.php? =<?php echo $ID ?>">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                        <a class="btn btn-primary btn-sm" href="insert.php">GO BACK TO INSERT</a>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>