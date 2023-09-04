<?php
$con = new mysqli;
$con->connect('localhost','root','','Mystore');
if(!$con){
    die(mysqli_error($con));
}

?>