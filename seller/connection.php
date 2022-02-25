<?php
session_start();
ob_start();
    $con=  mysql_connect("localhost","root","vrajeshadmin");
    if(!$con)
    {
        die ("not connect"). mysql_error();
    }
    mysql_select_db("foodlocker",$con);
    
    
    $d=date('Y-m-d');
    $of=  mysqli_query("select * from offer where del=0 and  enddate < '$d'");
    while($offer=  mysqli_fetch_array($of))
    {
        mysqli_query("update offer set del=1 where offerid = $offer[2] ");
    }
?>