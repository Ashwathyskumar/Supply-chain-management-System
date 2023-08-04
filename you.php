<?php 

    require_once("crudcon.php");
    $ID = $_GET['GetID'];
    $query = " select * from rcustoner where ID='".$ID."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $ID = $row['ID'];
        $name = $row['name'];
       
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Document</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                        </div>
                        <div class="card-body">

                        <form action="update.php?ID=<?php echo $ID ?>" method="post">
                                <input type="text" class="form-control mb-2" placeholder="  Name " name="name" value="<?php echo $name ?>">
                                <input type="int" class="form-control mb-2" placeholder="  id " name="ID" value="<?php echo $ID ?>">
                                
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
    
</body>
</html>