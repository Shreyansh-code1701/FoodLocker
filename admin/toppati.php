<?php
require_once 'connection.php';
require_once 'adminsecure.php';
?>
<script>
    noti('feedid');noti('storeid');noti('reviewid');noti('reviewstoreid');
</script>
<div class="header-section">

    <a class="toggle-btn"><i class="fa fa-bars"></i></a>

    <form class="searchform" action="http://adminex.themebucket.net/index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
    </form>

    <div class="menu-right">
        <ul class="notification-menu">
              <?php
          $fbb=  mysqli_query("select count(*) from feedback where feednotification=0");
          $fb=  mysqli_fetch_array($fbb);
           $ss=  mysqli_query("select count(*) from store where notification=0");
          $s=  mysqli_fetch_array($ss);
           $rp=  mysqli_query("select count(*) from reviewproduct where notification=0");
          $p=  mysqli_fetch_array($rp);
           $rs=  mysqli_query("select count(*) from reviewstore where notification=0");
          $r=  mysqli_fetch_array($rs);
          
          ?>
            <li >
                <a href="#" onclick=""  class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge" id="feed" ><?php echo $fb[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right body" id="feedid" >
                    
                </div>
            </li>
            
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge" id="store"><?php echo $s[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right body" id="storeid" style=" border-radius:5px;">
                    
                </div>
            </li>
            
            
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge" id="reviewp"><?php echo $p[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right" id="reviewid">
                    
                </div>
            </li>
            
            
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge" id="reviews"><?php echo $r[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right" id="reviewstoreid">
                    
                </div>
            </li>
           
    
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?php
                    $in=mysqli_query("select * from user where userid like '$_SESSION[user]' ");
                   $inn=mysqli_fetch_array($in);
                        ?>
                     <img src="../<?php echo $inn[12]; ?>" />
                     
                   <?php echo $_SESSION[user];?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="adminprofile.php"><i class="fa fa-user"></i>  Profile</a></li>
                    <li><a href="editprofile.php"><i class="fa fa-cog"></i>  Settings</a></li>
                    <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>

        </ul>
    </div>

</div>

