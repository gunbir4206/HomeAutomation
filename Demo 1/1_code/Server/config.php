<?php
$servername="localhost";
$username="root";
$password="";
$database="user_accounts";

//Create a connection
$link = mysqli_connect("localhost", "root", "", "user_accounts");

//Check Connection
if ($link == false){
	die("Connection failed due to: " . $connect->connect_error);
	}
echo "Connected successfully";