<?php
require_once 'conection.php';



$cm = mysqli_query($conn, "select * from cart where userid like '$_SESSION[user]' ");
$cmt = mysqli_fetch_array($cmt);
if ($cmt[0] == "") {
    $mt == 1;
}
?>



<!--------------------------------------------MISS CART------------------------------------------>



<?php
if($_REQUEST[kona]=="cart")
{
    
    
    if ($_REQUEST[id] != "") {
            $_SESSION[id] = $_REQUEST[id];

            $p = mysqli_query($conn, "select price,storeid from item where productid=$_SESSION[id]");
            $pp = mysqli_fetch_array($p);

            $tot = (($_REQUEST[q])*($pp[0]));

            $off=mysqli_query($conn, "select * from offer where storeid=$pp[1] and del=0");
            $offer=mysqli_fetch_array($off);
            
            if($offer[8]!="")
            {
                $disc=ceil(($tot)*($offer[8])/100);
                $grand=($tot)-($disc);
            }
            else
            {
                $disc=0;
                $grand=$tot;
            }
            
            $s=mysqli_query($conn, "select * from cart where userid like '$_SESSION[user]' and productid=$_REQUEST[id]");
            $ss=mysqli_fetch_array($s);
            
            if($ss[0]=="")
            {
                 $in = mysqli_query($conn, "insert into cart values('$_SESSION[user]',$_SESSION[id],0,1,$pp[0],$tot,$disc,$grand)");
            }
            else
            {
                $q=$ss[3]+1;
                    
                $total = (($q)*($pp[0]));
            
            if($offer[8]!="")
            {
                $disco=ceil(($total)*($offer[8])/100);
                $grandd=($total)-($disco);
            }
            else
            {
                $disco=0;
                $grandd=$total;
            }
                if($ss[3]<12)
                {
                
                    $u=mysqli_query($conn, "update cart set qty=$q,total=$total,discount=$disco,grandtotal=$grandd where cartid=$ss[2]");
            
                }
            }
            
            
        }
    
        if($_REQUEST[id]!=0 && $_REQUEST[q]==0)
        {
            $del=mysqli_query($conn, "delete from cart where cartid=$_REQUEST[id]");
        
            unset($_SESSION[cartche]);
        }
    
        if($_REQUEST[id]!=0 && $_REQUEST[q]!=0)
        {
            $l=mysqli_query($conn, "select price from cart where cartid=$_REQUEST[id] and productid=$_SESSION[id]");
            $ll=mysqli_fetch_array($l);
            
            $z=mysqli_query($conn, "select storeid from item where productid=$_SESSION[id]");
            $zz=mysqli_fetch_array($z);
            
            $of=mysqli_query($conn, "select * from offer   where storeid=$zz[0] and del=0");
            $off=mysqli_fetch_array($of);
            
            
            
            $np=(($ll[0])*($_REQUEST[q]));
            
             if($off[8]!="")
            {
                $dc=ceil(($np)*($off[8])/100);
                $gt=($np)-($dc);
            }
            else
            {
                $dc=0;
                $gt=$np;
            }
            
            $up=mysqli_query($conn, "update cart set qty=$_REQUEST[q],price=$ll[0],total=$np,discount=$dc,grandtotal=$gt where cartid=$_REQUEST[id]");
        }
    
 
?>
<?php
$nthi=  mysqli_query($conn, "select * from cart where userid like '$_SESSION[user]' ");
$nathi=  mysqli_fetch_array($nthi);
if($nathi[0]=="")
{
  
    ?>
     <?php
              
               $ua=  mysqli_query($conn, "select * from bill where billid= (select max(billid) from bill where userid like '$_SESSION[user]')");
             $uadd=  mysqli_fetch_array($ua);
               ?>
    <p>Last Address : <?php echo $uadd[5];  ?></p>
     
      <img src="images/empty_bag.gif" class="img img-responsive"/> 
<?php
}
?>

     
<?php
$sel = mysqli_query($conn, "select i.proname,i.productid,i.url,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
while ($ss = mysqli_fetch_array($sel)) {
    ?>
                                          
<div class="row" >
    <div class="col-md-12"style="padding: 10px;">
        <div class="col-md-10 text-center" style="background: #232323; border-radius:5px ;">
            <?php 
                $st=mysqli_query($conn, "select s.storename from store s,item i where s.storeid=i.storeid and i.productid=$ss[1]");
                while ($row = mysqli_fetch_array($st)) 
                {
                    
                 
                 ?>
            <p style="color: #fff;text-transform: capitalize;" ><?php echo $row[0];?></p>
        </div>
         <div class="col-md-2">
             <i class="fa fa-trash-o" style="cursor: pointer; " title="click to remove from cart"  onclick="misscart('cart','<?php echo $ss[5]; ?>',0);"></i>
        </div>
    </div>
        
            <div class="col-md-5 col-xs-12 col-sm-12" style="padding-top: 12px;">
            <img src="seller/<?php echo $ss[2]; ?>" style="width:100%;"/>
        </div>
        <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px; padding:5px;">
            
            
                <div class="col-md-12" style="padding:5px;">
                    <p style="font-size:14px; font-weight: 600; color: #232323; text-transform: capitalize; "><?php echo $ss[0]; ?></p>
                </div>
      
                                                
            <div class="col-md-6 col-xs-12 col-sm-12" style="padding:5px;">

                    
                <input type="number" name="qty" class="form-control" id="rs" required="" style="border-radius:5px;" value="<?php echo $ss[6]; ?>" min="1"  max="12" onchange="missprice(this.value,'<?php echo $ss[7]; ?>');misscart('cart','<?php echo $ss[1]; ?>',this.value);"  onkeyup="missprkeyup(this.value,'<?php echo $ss[7]; ?>');" />                              
                    

                                                    
                <div class="col-md-12 col-xs-12 col-sm-12" style="padding:5px;">
                    <i class="fa fa-rupee" ></i>&nbsp;<p id="misspr">
                <?php $price=($ss[6])*($ss[7]); 
                    echo $price;
                ?></p>&nbsp;/-
                </div>
                
                
                                                    
            </div>

        </div>
           
        
        
    </div>
    <?php
}
}
?>

<div class="col-md-12 text-center " style="padding:5px;">
    <div class="col-md-6 " ></div>
    <div class="col-md-6 " >
        <?php
        if($nathi[0]!="")
        {
            $_SESSION[cartche]=1;
        ?>
        <a href="confirm.php" class="cartbtn">Confirm</a><i class="fa fa-caret-right" style="font-size:30px;vertical-align: middle; margin-left: 2px;color: #f8a631;"></i>
    <?php
        }
    ?>
    </div>
            
         </div>

  <?php
}
  ?>

<!--------------------------------------------------confirm cart display--------------------------------------------------->



<?php
if ($_REQUEST[kona] == "confirmcart") {
    ?>
            <?php
            $sel = mysqli_query($conn, "select i.proname,i.url,i.dis,i.type,c.* from item i,cart c where i.productid=c.productid and userid like '$_SESSION[user]'");
            while ($ss = mysqli_fetch_array($sel)) {
                ?>

        <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-12" style="padding-top: 12px;">
                <img src="seller/<?php echo $ss[1]; ?>" style="width:70%;"/>
            </div>
            <div class="col-md-7 col-xs-12 col-sm-12" style="padding-top: 9px;">

                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="col-md-10">

        <?php echo $ss[0]; ?><br/>
        <?php echo $ss[2]; ?><br/>
        <?php echo $ss[3]; ?>
                    </div>


                </div>

                <div class="col-md-12 col-xs-12 col-sm-12">

                    <div class="col-md-12 col-xs-12 col-sm-12">

        <?php echo $ss[7]; ?>

                    </div>

                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <i class="fa fa-rupee" ></i>&nbsp;<p id="misspr"><?php echo $ss[9]; ?></p>&nbsp;/-
                    </div>



                </div>

            </div>



        </div>

                        <?php
                    }
                    ?>
    <div class="col-md-12 text-right">
        <div class="col-md-6" style="background: #f8a631; "><a href="product.php" ></a></div>
        <div class="col-md-6" style="background: #f8a631;"> <a href="checkout.php" ></a></div>

    </div>

    <div class="col-md-12 " style="padding:5px;">
        <div class="col-md-offset-8 col-md-2" ><i class="fa fa-caret-left" style="font-size:30px;vertical-align: middle; margin-right: 2px; color: #f8a631;"></i><a href="filter.php" class="cartbtn" >Continue Shopping</a></div>
        <div class="col-md-2" >

            <a href="checkout.php" class="cartbtn">Check Out</a><i class="fa fa-caret-right" style="font-size:30px;vertical-align: middle; margin-left: 2px;color: #f8a631;"></i>

        </div>
    </div>



    <?php
}
?>