<?php 
session_start();
error_reporting(~E_ALL);

$hostname = 'localhost';
$username = 'root';
$password = 'root@123';
$database = 'web_harwesting';

$con = mysqli_connect($hostname,$username,$password,$database);
if (mysqli_connect_errno())
  {
    echo "Error to get connected with database : - ";
  }
  else{

  }
?>