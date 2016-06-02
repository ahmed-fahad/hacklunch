<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hacklunch</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css" media="screen" title="no title" charset="utf-8">
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hacklunch";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo  " Email: " . $row["email"]. " " . $row["date"]. "<br>";
        if(!empty($row["contents"]) ){
			$uns = unserialize($row["contents"]);
			echo "<pre>";
			print_r($uns);
			echo "</pre>";
		}
    }
} else {
    echo "0 results";
}

$conn->close();
?>
