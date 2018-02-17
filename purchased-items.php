<?php
ob_start();
session_start();
include "lib/main.php";

if(!isset($_SESSION['US_id']) or !isset($_SESSION['US_test'])){
  header("Location: 404.php");
}else{
  $select_user_info = @mysql_query("select * from users where id='".$_SESSION['US_id']."'") or die(mysql_error());
  $user_info = @mysql_fetch_assoc($select_user_info);
  $num_users = @mysql_num_rows($select_user_info);

  if($num_users == 0){
    header("Location: 404.php");
  }

  //Test session
  if($_SESSION['US_test'] != md5($user_info['id']."_".$user_info['email'])){
    header("Location: logout.php");
  }
}

?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/Logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | Purchased items</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/purchased.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

      <?php
        if(isset($_SESSION['US_id'])){
        nav_bar($_SESSION['US_id']);
        }else{
        nav_bar('with_out_session');
        }
      ?>

      <section class="purchased">
        <div class="container">
          <div class="section-title center-align">
            <h1>Purchased Items</h1>
          </div>
          <div class="row">
            <?php
            $select_request_product = @mysql_query("select * from request_product where user_id='".$_SESSION['US_id']."' order by id desc") or die(mysql_error());
            while($request_product = @mysql_fetch_assoc($select_request_product)){
              $select_cart = @mysql_query("select * from cart where session_id='".$request_product['session_id']."' order by id desc") or die(mysql_error());
              while($cart = @mysql_fetch_assoc($select_cart)){
                $select_product_info = @mysql_query("select * from products where id='".$cart['product_id']."'") or die(mysql_error());
                $product_info = @mysql_fetch_assoc($select_product_info);
                if($product_info['price_after_discount'] == 0) $price = $product_info['price']; else $price = $product_info['price_after_discount'];
                if($request_product['ok_from_admin'] == 'No') $ok_from_admin = "<span style='color: red;'>No</span>"; else $ok_from_admin = "<span style='color: green;'>Yes</span>";
                echo '
             <div class="col l4 m6 s12">
              <div class="product">
                <div class="product-price">
                  <span>'.$price.'$</span>
                </div>
                <div class="product-image">
                  <img src="images/'.$product_info['pic'].'" alt="'.$product_info['title'].'" class="responsive-img">
                </div>
                <div class="product-content">
                  <div class="product-name">
                    <h5>'.$product_info['title'].'</h5>
                  </div>
                  <div class="quantity">
                    <p>Quantity: '.$cart['quantity'].'</p>
                  </div>
                  <div class="agree_from_admin">
                    <p>Agree from admin: '.$ok_from_admin.'</p>
                  </div>
                  <div class="product-link">
                    <a href="single.php?id='.$product_info['id'].'" class="btn btn-float btn-block">
                      Show Product
                    </a>
                  </div>
                </div>
              </div>
            </div>
                ';
              }
            }
            ?>


          </div>
        </div>
      </section>

      <?php footer();?>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
    </body>
  </html>