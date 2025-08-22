<?php

function getdbconn() 
{
    $host       = "localhost";
    $dbname     = "ppportal";
    $username   = "ppportaldbadmin";
    $password   = "vishal@sgbit";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo "Oops! Something went wrong in connecting to db.";
        echo "Internal error: database connection failed. Please report this problem to us.";
        die("Technical error message:" . $conn->connect_error);
    }

    return $conn;
}

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo 'Hello! Connecting to the db\n';
    
    $conn = getdbconn();
    if ($conn->connect_error) { 
          die("Connection failed: " . $conn->connect_error); 
    } 
  
    $sql = "select * from test"; 
    
    $result = $conn->query($sql);
    if($result === FALSE) {
        die("Error while executing the query");
    }
    while($row = mysqli_fetch_array($result))
    {
        print_r($row);
    } 
    // Free result set
    $result -> free_result();
    $conn->close(); 
?>
