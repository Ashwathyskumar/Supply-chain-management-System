<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Registration Form</title>
</head>
<body class="bg-dark">

        <div class="container">
        <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> INSERT NEW REGULAR CUSTOMER DETAILS</h3>
                        </div>
                        <div class="card-body">

                            <form action="insert1.php" method="post">
                                <input type="text" class="form-control mb-2" placeholder=" ID " name="ID">
                                <input type="int" class="form-control mb-2" placeholder=" name " name="name">
                                <button class="btn btn-primary"
                                name="submit">Submit</button>
                                <br><br>
                                <br><br>
                                <a href="home.php">close</a>
                                <br><br>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>