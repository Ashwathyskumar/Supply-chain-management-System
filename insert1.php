<?php

    require_once("crudcon.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['name']) || empty($_POST['ID']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $name = $_POST['name'];
            $ID = $_POST['ID'];
           

            $query = " insert into rcustoner (name, ID) values('$name','$ID')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:view.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:insert1.php");
    }



?>