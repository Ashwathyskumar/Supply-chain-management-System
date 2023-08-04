<html>
    <head>
        <style>
            
   div {
  align: center;
  position: absolute;
  top: 40%;
  left: 40%;
}
input.text {
  width: 120%;
  height: 300%;
}
input[type=submit] {  
    background-color: #008CBA;
    padding: 12px 30px;
    border-radius: 2px;
    background-color: white;
    color: black;
    border: 1px solid #008CBA;
    align:center;
}  

        </style>

    </head>
    <body>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST"){
$sname= "127.0.0.1:3307";
$uname= "root";
$password = "";
$db_name = "dbms1";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
    exit();
}
$oid=$_POST["oid"];
$offer=$_POST["offer"];;
$select_query = "CALL offer1($oid,$offer)";
echo " offer applied to " . $oid. "<br>";
$result=mysqli_query($conn,$select_query);
mysqli_close($conn);
}
?>
    <div>
    <form method ="post"  action="offer.php">
        ORDER ID:<input type = "text" name ="oid"><br>
        <br>
        OFFER%:<input type = "number" name ="offer"><br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</div>
    </body>
</html>