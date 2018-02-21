<?php
ob_start();
session_start();
include "lib/main.php";

if(isset($_GET['page'])){
$currentpage = safe_input(intval($_GET['page']));
}else{
$currentpage = 1;
}

$privpage = $currentpage-1;
$nextpage = $currentpage+1;
$perpage = 12;

$start = ($currentpage - 1) * $perpage;


$select_deals1 = @mysql_query("select * from products where deleted_product='No' and put_in_daily_deals='Yes' order by id desc") or die(mysql_error());

$num = @mysql_num_rows($select_deals1);

$lastpage = ceil($num / $perpage);

$select_deals = @mysql_query("select * from products where deleted_product='No' and put_in_daily_deals='Yes' order by id desc limit ".$start.",".$perpage."") or die(mysql_error());

$link = "deals.php?";

?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/Logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | Daily Deals</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/deals.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <?php
        if(isset($_SESSION['US_id'])){
        nav_bar($_SESSION['US_id'],session_id());
        }else{
        nav_bar('with_out_session',session_id());
        }
      ?>

      <section class="products">
        <div class="container">
          <div class="section-title center-align">
            <h1>Daily Deals</h1>
          </div>
          <div class="row">
            <?php
            while($deals = @mysql_fetch_assoc($select_deals)){
            $select_category_info = @mysql_query("select * from sub_category where id='".$deals['category_id']."'") or die(mysql_error());
            $category_info = @mysql_fetch_assoc($select_category_info);
              echo '
            <div class="col l4 m6 s12">
              <div class="product">
                <div class="product-price">
                  <span>'.$deals['price_after_discount'].'$ <span class="old-price">'.$deals['price'].'$</span></span>
                </div>
                 <div class="product-discount">
                  <span>'.$deals['value_of_discount'].'%</span>
                </div>
                <div class="product-image">
                  <img src="images/'.$deals['pic'].'" alt="'.$deals['title'].'" class="responsive-img">
                </div>
                <div class="product-content">
                  <div class="product-name">
                    <h5>'.$deals['title'].'</h5>
                  </div>
                  <div class="product-category">
                    <span>Category: <span>'.$category_info['title'].'</span></span>
                  </div>
                  <br />
                  <div class="product-link">
                    <a href="single.php?id='.$deals['id'].'" class="btn btn-float btn-block">
                      Show Product
                    </a>
                  </div>
                </div>
              </div>
            </div>
              ';
            }
            ?>
          </div>
        </div>
<?php if ($num >= 1){?>
<div class="pagination">
<div class="center-align">
<?php
if($currentpage == 1){
echo '
<span class="btn btn-default.disabled"><i class="material-icons">chevron_left</i></span>
';
} else{
echo '
<a href="'.$link.'page='.$privpage.'"><span class="btn btn-default"><i class="material-icons">chevron_left</i></span></a>
';
}
?>
<?php
for($i=$currentpage-2; $i<=$currentpage+2; $i++){
if($i > 0 && $i <= $lastpage){
  if($i == $currentpage){
  echo '
<a href="'.$link.'page='.$i.'"class="btn btn-default"><b>'.$i.'</b></a>
  ';
  }else{
  echo '
<a href="'.$link.'page='.$i.'"class="btn btn-default">'.$i.'</a>
  ';
}
}
}
?>
<?php
if($currentpage == $lastpage){
echo '
<span class="btn btn-default.disabled"><i class="material-icons">chevron_right</i></span>
';
} else{
echo '
<a href="'.$link.'page='.$nextpage.'"><span class="btn btn-default"><i class="material-icons">chevron_right</i></span></a>
';
}
?>
</div>
</div>
<?php }?>
      </section>

      <?php footer();?>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
    </body>
  </html>
