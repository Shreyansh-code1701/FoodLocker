<?php
require_once 'conection.php';
$_SESSION[page] = "sitemap";
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <?php
    require_once 'head.php';
    ?>

    <body class="smooth-scroll">

        <div class="ht-page-wrapper">
            <?php
            require_once 'toppati.php';
            ?>

            <?php
            require_once 'menu.php';
            ?>
            <div class="ht-page-header" style="background-image: url('images/parallax/2.jpg')">
                <div class="overlay" style="background: rgba(0,0,0,.5)"></div>
                <div class="container">
                    <div class="inner">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center " >
                            <i class="fa fa-star" ></i>&nbsp;&nbsp;<font style="font-size:30px;">S</font><b style="color: #F8A631;">ITEMAP</b>&nbsp; <font style="font-size:30px;">F</font><b style="color:#F8A631;"><i class="fa fa-circle" ></i><i class="fa fa-circle" ></i>D</b>&nbsp;<font style="font-size:30px;">L</font><b style="color: #F8A631;">OCKER</b>&nbsp;&nbsp;<i class="fa fa-star"></i> 
                        </div>

                    </div>
                </div>
            </div>

            <div class="container " ><BR></br>

                <div class="row" style="margin: 0;">
                    <div class="row ht-widget hw-popular-categories" >
                        <font class="sitemapline">VIEW SITEMAP IN FOOD LOCKER</font>
                    </div>
                    <div class="row" style="margin: 0;">
                        <div class="col-md-offset-5 col-md-7 sitemap ">
                            <ul>
                                <li><a href="index.php"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;HOME</a></li>
                                <li><i class="fa fa-cutlery"></i>&nbsp;&nbsp;&nbsp;&nbsp;CUISINE&nbsp;&nbsp;<i class="fa fa-lock sitemapi" id="cuisine"></i>

                                    <div class="activesub" id="activesub">
                                        <ul>
                                            <?php
                                                $cu=mysqli_query($conn, "select mcatname from  maincategory where del=0");
                                                while ($row = mysqli_fetch_array($cu)) 
                                                 {
                                              
                                            ?>
                                                    <li><a href=""><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row[0]; ?></a></li>
                                           <?php
                                                 }
                                           ?>
                                        </ul>
                                    </div>

                                </li>
                                <li><a href="filter.php"><i class="fa fa-gift"></i>&nbsp;&nbsp;&nbsp;&nbsp;FOOD</a></li>
                                <li><a href="event.php"><i class="fa fa-gift"></i>&nbsp;&nbsp;&nbsp;&nbsp;RESTAURANT</a></li>
                                <li><a href="bestseller.php"><i class="fa fa-bold"></i>&nbsp;&nbsp;&nbsp;&nbsp;BEST SELLER</a></li>
                                <li><a href="contact.php"><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;&nbsp;CONTACT</a></li>
                                <li><a href="feedback.php"><i class="fa fa-bullhorn"></i>&nbsp;&nbsp;&nbsp;&nbsp;FEEDBACK</a></li>
                                <li><a href="about.php"><i class="fa fa-info"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ABOUT</a></li>

                                <li><a href="services.php"><i class="fa fa-shield"></i>&nbsp;&nbsp;&nbsp;&nbsp;SERVICES</a></li>
                            </ul>
                        </div>

                    </div>  

                </div>
            </div>

        </div>






        <?php
        require_once 'footer.php';
        ?>

    </div>


</body>


</html>