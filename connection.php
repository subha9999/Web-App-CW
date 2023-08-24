<?php
$url='localhost';
$username="root";
$password="";
$dbname="school";
$connection=mysqli_connect($url,$username,$password,$dbname);
if(!$connection){
    die("Connection failed: ".mysqli_connect_error());
}
?>