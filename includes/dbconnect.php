<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog";

    $conn = mysqli_connect($servername,$username, $password,$dbname);
    if(!$conn) {
        die("Connection_Failed" . mysqli_connect_error());
    	}

?>