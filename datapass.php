<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expressway";

$conn = new mysqli($servername,$username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}
else{
    $avil = $_POST['available'];
    $def = 'yes';

    $sql = "Update bus_details set available ='".$avil."' where available='".$def."'";
 

}


?>
<html>
    <head>
        <title>Data</title>
        <link type="text/css" rel="stylesheet" href="datapassStyle.css" />
    </head>

    <body>

    <div class="result-container">
        <div class="result-box">
        <h1>Availability status Updated</h1>
        <br><br>
        <div class="card">
		
		<button onclick="load()">Back</button>
	    </div>
        <script type="text/javascript" src="booking-dashboard.js"></script>

        </div>
    <div class="result-container">
        
    </body>

</html>