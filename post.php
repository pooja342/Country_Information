<?php
include_once("database-connection.php");

if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];
    $sid=$_GET['sid'];
    $cityid=$_GET['cityid'];
    $sql = "INSERT INTO Users ( state , country, cities) VALUES ( '$sid', '$cid', '$cityid')";
    if ($con->query($sql) === TRUE) 
    {
        echo "New record created successfully";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else
{
    echo "noo";
}
?>