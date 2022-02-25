<?php
require_once 'conection.php';

$del=mysqli_query($conn, "delete from cart where userid like '$_SESSION[user]' ");

$date = date('Y-m-d');
$time = date('h:i:s:a');

$_SESSION[date1]=$date;
$_SESSION[time1]=$time;


$sel=mysqli_query($conn, "update logintime set date='$_SESSION[date1]',time='$_SESSION[time1]' where userid like '$_SESSION[user]'");

unset($_SESSION[user]);
unset($_SESSION[type]);
unset($_SESSION[date]);
unset($_SESSION[time]);

header("location:registration.php");

?>

