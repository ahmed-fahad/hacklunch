<?php
session_start();
include("connection.php");
$data= serialize($_SESSION["cart"]);
$sql1 = "INSERT INTO cart (email,contents) VALUES ('" . $_SESSION["user"]. "','" . $data . "')";
mysql_query($sql1) ;
  if ($result === FALSE) {
   die("Query failed!" . mysql_error() . $sql);
}else{
	echo "<h1>Order Placed! </h1>";

}
?>