<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getdbconn() 
{
    $host       = "localhost";
    $dbname     = "pratibhaposhak";
    $username   = "pproot";
    $password   = "PPAdmin@2022";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Oops! Something went wrong. It's us, not you.";
        echo "Internal error: database connection failed. Please report this problem to us.";
        die("Technical error message:" . $conn->connect_error);
    }

    return $conn;
}
?>