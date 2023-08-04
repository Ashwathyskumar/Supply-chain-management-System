<?php 

    require_once("crudcon.php");

    if(isset($_POST['update']))
    {
        $ID = $_POST['ID'];
        $name = $_POST['name'];
        

        $query = " update rcustoner set name = '".$name."', ID='".$ID."' WHERE  name='".$name."'";
        $query1 = " update rcustoner set name = '".$name."', ID='".$ID."' WHERE  ID='".$ID."'";
        $result = mysqli_query($con,$query);
        $result1 = mysqli_query($con,$query1);
        if($result and $result1)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:view.php");
    }


?>