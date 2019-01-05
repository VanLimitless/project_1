<?php
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname="haladama";

$servername = "localhost";
$username = "root";
$password = "";
$dbname="cms";



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Chyba pripojeni k databazi" . $e->getMessage();
}