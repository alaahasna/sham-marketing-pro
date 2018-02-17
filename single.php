<?php
ob_start();
session_start();
include "lib/main.php";
if(isset($_GET['id'])){
  $gid = safe_input($_GET['id']);
}else{
  header("Location: 404.php");
}
$select_product_info = @mysql_query("select * from products where deleted_product='No' and id='".$gid."'") or die(mysql_error());
$num_product = @mysql_num_rows($select_product_info);
if($num_product == 0){
  header("Location: 404.php");
}
$product_info = @mysql_fetch_assoc($select_product_info);
if($product_info['price_after_discount'] == 0) $price = $product_info['price']; else $price = $product_info['price_after_discount'];

if(isset($_POST['add_to_cart'])){
  $quantity = safe_input($_POST['quantity']);
  if(!empty($quantity)){
  if($quantity <= $product_info['quantity']){
   $session_id = session_id();

   $add_to_cart = @mysql_query("insert into cart
   (session_id,product_id,quantity,date_of_add,requested)
   values
   ('".$session_id."','".$gid."','".$quantity."',NOW(),'No')
   ") or die(mysql_error());

   //Update Quantity:
   $update_quantity = @mysql_query("update products set products.quantity=products.quantity-1 where id='".$gid."'") or die(mysql_error());

   if(isset($update_quantity)){
     error_message_with_link("Product has been added to cart successfly.","single.php?id=".$gid);
   }
  }else{
    error_message_with_link("There is not enough quantity of this product!","single.php?id=".$gid);
  }
  }
}

?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/Logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | <?php echo $product_info['title'];?></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/single.css">
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

      <section class="single-product">
        <div class="container">
          <div class="row">
            <div class="col l6 s12 center-align">
              <div class="product-image">
                <img src="images/<?php echo $product_info['pic'];?>" class="responsive-img materialboxed">
              </div>
            </div>
            <div class="col l6 s12">
            <form action="single.php?id=<?php echo $gid;?>" method="post">
              <div class="product-name">
                <h5><?php echo $product_info['title'];?> <span>$<?php echo $price;?></span></h5>
              </div>
              <div class="product-desc">
                <p> <?php echo $product_info['description'];?> </p>
              </div>
              <div class="countity">
                <label for="countity">Quantity</label>
                <input id="countity" type="number" name="quantity" required="required" />
              </div>
              <div class="add-to-cart">
                <input type="submit" name="add_to_cart" class="btn btn-float btn-block" value="Add To Cart" />
              </div>
            </form>
            </div>
            <div class="col s12">
                <div class="other-images">
                  <div class="row">
                  <?php
                  $select_sub_products = @mysql_query("select * from sub_products where product_id='".$gid."' order by id desc") or die(mysql_error());
                  while($sub_products = @mysql_fetch_assoc($select_sub_products)){
                    echo '
                     <div class="col l3 s12">
                      <img src="images/'.$sub_products['pic'].'" class="responsive-img materialboxed">
                    </div>
                    ';
                  }
                  ?>
                  </div>
                </div>
            </div>
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