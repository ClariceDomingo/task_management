<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "task_management";

$connection = mysqli_connect("$host", "$username", "$password", "$database");

if(!$connection)
{
    die("". mysqli_connect_error());
}


?>