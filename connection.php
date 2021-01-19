<?php

$servername="localhost";
$username="root";
$password="";
$database="Hits_1";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Connection Failed : ".mysqli_connect_error());
}

?>