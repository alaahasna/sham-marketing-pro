<?php
ob_start();
session_start();
include "lib/main.php";
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo2.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | Cart</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/cart.css">
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

      <section class="cart">
      <form action="cart.php" method="post">
        <div class="container">
          <div class="section-title center-align">
            <h2>Cart </h2>
          </div>
          <table class="bordered striped responsive-table centered hide-on-med-and-down">
            <thead>
              <tr>
                  <th>Product Image</th>
                  <th>Item Name</th>
                  <th>Item Price</th>
                  <th>Quantity</th>
                  <th>Drop Item</th>
              </tr>
            </thead>

            <tbody>

          <?php
          $total = 0;
          $session_id = session_id();

          //Delete Item
          if(isset($_GET['product_in_cart_id']) and isset($_GET['item_id'])){
            $product_in_cart_id = safe_input($_GET['product_in_cart_id']);
            $item_id = safe_input($_GET['item_id']);
            if(isset($_GET['deletefromcart']) and $_GET['deletefromcart'] == 'ok'){
            $update_product_quantity = @mysql_query("update products set quantity=products.quantity+(select quantity from cart where id='".$item_id."')") or die(mysql_error());
            $delete_from_cart = @mysql_query("delete from cart where id='".$item_id."' and session_id='".$session_id."'") or die(mysql_error());
              header("Location: cart.php");
            }
          }

          //Clear Cart
          if(isset($_POST['clear_cart'])){
            $clear_cart = @mysql_query("delete from cart where session_id='".$session_id."'") or die(mysql_error());
          }

          //Update cart
          if(isset($_POST['update_cart'])){

                $select_in_cart = @mysql_query("select * from cart where session_id='".$session_id."' order by id desc") or die(mysql_error());
                $num_in_cart = @mysql_num_rows($select_in_cart);
                $cart_ids = "";
                $i = 0;
                while($ids = @mysql_fetch_assoc($select_in_cart)){
                  $i = $ids['id'];
                  if(isset($_POST['quantity'][$i])){
                  $quantity = safe_input($_POST['quantity'][$i]);
                  $select_pro_info = @mysql_query("select * from products where id = '".$ids['product_id']."'") or die(mysql_error());
                  $pro_info = @mysql_fetch_assoc($select_pro_info);
                  if($pro_info['value_of_discount'] == 0){
                    if($quantity <= 9){

                    $select_quantity_in_cart = @mysql_query("select quantity from cart where id='".$i."'") or die(mysql_error());
                    $quantity_in_cart = @mysql_fetch_assoc($select_quantity_in_cart);

                    if($quantity > $quantity_in_cart['quantity']){
                      $updated_quantity = $quantity - $quantity_in_cart['quantity'];
                      $update_product_quantity = @mysql_query("update products set quantity=products.quantity-".$updated_quantity." where id='".$ids['product_id']."'") or die(mysql_error());
                    }else{
                      $updated_quantity = $quantity_in_cart['quantity'] - $quantity;
                      $update_product_quantity = @mysql_query("update products set quantity=products.quantity+".$updated_quantity." where id='".$ids['product_id']."'") or die(mysql_error());
                    }

                    $q = "update cart set quantity = ".$_POST['quantity'][$i]." where id = ".$ids['id'];
                    $update_cart = @mysql_query($q) or die(mysql_error());

                    header("Location: cart.php");
                    }else{
                      error_message("Max of items is 9!");
                    }
                  }else{
                     if($quantity == 1){
                    $q = "update cart set quantity = ".$_POST['quantity'][$i]." where id = ".$ids['id'];
                    $update_cart = @mysql_query($q) or die(mysql_error());

                    header("Location: cart.php");
                    }else{
                      error_message("This product in discount!");
                    }
                  }
                }
                }
            }

            //Update mobile cart
          if(isset($_POST['update_cart1'])){

                $select_in_cart = @mysql_query("select * from cart where session_id='".$session_id."' order by id desc") or die(mysql_error());
                $num_in_cart = @mysql_num_rows($select_in_cart);
                $cart_ids = "";
                $i = 0;
                while($ids = @mysql_fetch_assoc($select_in_cart)){
                  $i = $ids['id'];
                  if(isset($_POST['quantity1'][$i])){
                  $quantity = safe_input($_POST['quantity1'][$i]);
                  $select_pro_info = @mysql_query("select * from products where id = '".$ids['product_id']."'") or die(mysql_error());
                  $pro_info = @mysql_fetch_assoc($select_pro_info);
                  if($pro_info['value_of_discount'] == 0){
                    if($quantity <= 9){

                    $select_quantity_in_cart = @mysql_query("select quantity from cart where id='".$i."'") or die(mysql_error());
                    $quantity_in_cart = @mysql_fetch_assoc($select_quantity_in_cart);

                    if($quantity > $quantity_in_cart['quantity']){
                      $updated_quantity = $quantity - $quantity_in_cart['quantity'];
                      $update_product_quantity = @mysql_query("update products set quantity=products.quantity-".$updated_quantity." where id='".$ids['product_id']."'") or die(mysql_error());
                    }else{
                      $updated_quantity = $quantity_in_cart['quantity'] - $quantity;
                      $update_product_quantity = @mysql_query("update products set quantity=products.quantity+".$updated_quantity." where id='".$ids['product_id']."'") or die(mysql_error());
                    }

                    $q = "update cart set quantity = ".$_POST['quantity1'][$i]." where id = ".$ids['id'];
                    $update_cart = @mysql_query($q) or die(mysql_error());

                    header("Location: cart.php");

                    }else{
                      error_message("Max of items is 9!");
                    }
                  }else{
                     if($quantity == 1){
                    $q = "update cart set quantity = ".$_POST['quantity'][$i]." where id = ".$ids['id'];
                    $update_cart = @mysql_query($q) or die(mysql_error());
                    header("Location: cart.php");
                    }else{
                      error_message("This product in discount!");
                    }
                  }
                }
                }
            }

          //Send buy Request
          if(isset($_POST['send_buy_request'])){
            if(isset($_SESSION['US_id'])){
              $select_cart_info = @mysql_query("select * from cart where session_id='".$session_id."' and requested='No'") or die(mysql_error());
              $num_of_cart_info = @mysql_num_rows($select_cart_info);
              if($num_of_cart_info > 0){

                $select_user_info = @mysql_query("select * from users where id='".$_SESSION['US_id']."'") or die(mysql_error());
                $user_info = @mysql_fetch_assoc($select_user_info);

                if(!empty($user_info['first_name']) and !empty($user_info['last_name']) and !empty($user_info['password']) and !empty($user_info['email']) and !empty($user_info['phone']) and !empty($user_info['address'])){

                  $add_request = @mysql_query("insert into request_product (user_id,session_id,ok_from_admin) values ('".$_SESSION['US_id']."','".$session_id."','No')") or die(mysql_error());
                  $update_cart_request = @mysql_query("update cart set requested='Yes' where session_id='".$session_id."'") or die(mysql_error());

                  $select_request_number = @mysql_query("select id from request_product where session_id='".$session_id."' order by id desc") or die(mysql_error());
                  $request_number = @mysql_fetch_assoc($select_request_number);
                  $req_num = $request_number['id']+10000;
                  mail($user_info['email'],$main_settings['site_name'],"Thank you for buy from ".$main_settings['site_name']."<br /><br /> Your request has been sent to admin successfly.<br /><br />Your request number is:".$req_num,'Content-type: text/html; charset=utf-8');
                  if(isset($add_request)){
                    error_message("Buy Request has been sent to admin successfly.<br /> Your request number is: ".$req_num);
                  }
                }else{
                  error_message_with_link("Some of your information is required!","user-info.php");
                }
              }else{
                error_message("Your cart is empty!");
              }
            }else{
              error_message("You must login!");
            }
          }

          $select_cart = @mysql_query("select * from cart where session_id='".$session_id."' and requested='No' order by id desc") or die(mysql_error());
          $select_cart1 = @mysql_query("select * from cart where session_id='".$session_id."' and requested='No' order by id desc") or die(mysql_error());
          $num_in_cart = @mysql_num_rows($select_cart);
          $num_in_cart1 = @mysql_num_rows($select_cart1);
          if($num_in_cart == 0){echo '<tr><td colspan="5"><b>No Items in cart.</b></td></tr>';}
          while($cart = @mysql_fetch_assoc($select_cart)){
            $select_product_in_cart = @mysql_query("select * from products where id='".$cart['product_id']."'") or die(mysql_error());
            $product_in_cart = @mysql_fetch_assoc($select_product_in_cart);
            if($product_in_cart['price_after_discount'] == 0) $price = $product_in_cart['price']; else $price = $product_in_cart['price_after_discount'];
            if($product_in_cart['quantity'] >= 9) $max_quantity = 9; else $max_quantity = $product_in_cart['quantity'];
            $total += $cart['quantity'] * $price;

            echo '
              <tr>
                <td><img src="images/'.$product_in_cart['pic'].'" alt="'.$product_in_cart['title'].'" width="100" class="responsive-img"></td>
                <td>'.$product_in_cart['title'].'</td>
                <td>$'.$price.'</td>
                <td>
                  <div class="input-field">
                    ';
                    if($product_in_cart['value_of_discount'] == 0){
                    echo '
                    <input type="number" value="'.$cart['quantity'].'" style="width: 50px;" min="1" max="'.$max_quantity.'" name="quantity['.$cart['id'].']">
                    ';
                    }else{
                      echo $cart['quantity'];
                    }
                    echo '
                  </div>
                </td>
                <td><a href="cart.php?deletefromcart=ok&product_in_cart_id='.$product_in_cart['id'].'&item_id='.$cart['id'].'"><i class="fa fa-close" title="Delete"></i></a></td>
              </tr>
            ';

            }
            ?>
            </tbody>

          </table>

          <div class="cart_mobile hide-on-large-only">
            <div class="row">
            <?php
            $total1 = 0;
            if($num_in_cart1 == 0){echo '<div class="col l12 m12 s12 center-align"><b>No Items in cart.</b></div>';}
            while($cart1 = @mysql_fetch_assoc($select_cart1)){
            $select_product_in_cart1 = @mysql_query("select * from products where id='".$cart1['product_id']."'") or die(mysql_error());
            $product_in_cart1 = @mysql_fetch_assoc($select_product_in_cart1);
            if($product_in_cart1['price_after_discount'] == 0) $price1 = $product_in_cart1['price']; else $price1 = $product_in_cart1['price_after_discount'];
            if($product_in_cart1['quantity'] >= 9) $max_quantity1 = 9; else $max_quantity1 = $product_in_cart1['quantity'];
            $total1 += $cart1['quantity'] * $price1;

            echo '
              <div class="col m6 s12">
                <div class="item">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-6">
                        <img src="images/'.$product_in_cart1['pic'].'" alt="'.$product_in_cart1['title'].'" class="responsive-img">
                      </div>
                      <div class="item-content">
                        <div class="row">
                            <div class="col s6">
                              <h6>'.$product_in_cart1['title'].'</h6>
                            </div>
                            <div class="col s12">
                              <span>Price: '.$price1.'</span>
                            </div>
                            <div class="col s12">
                              <div class="input-field">
                                ';
                    if($product_in_cart1['value_of_discount'] == 0){
                    echo '
                    Quantity: <input type="number" value="'.$cart1['quantity'].'" style="width: 50px;" min="1" max="'.$max_quantity1.'" name="quantity1['.$cart1['id'].']">
                    ';
                    }else{
                      echo "Quantity: ".$cart1['quantity'];
                    }
                    echo '
                              </div>
                            </div>
                            <div class="col m12 s12 center-align">
                              <a href="cart.php?deletefromcart=ok&product_in_cart_id='.$product_in_cart1['id'].'&item_id='.$cart1['id'].'" class="btn btn-float">Delete Item</a>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            ';
            }
            ?>


            </div>
          </div>

          <br />
          <div class="update-clear-cart hide-on-large-only">
            <div class="row">

              <div class="col l12 m12 s12">
                <td class="center-align">
                  <br />
                  <h5>Total: <?php echo $total;?>$</h5>
                </td>
              </div>
              <div class="col l4 m4 s12">
                <td class="center-align">
                  <br />
                  <input type="submit" class="btn btn-float" value="Send Buy request" name="send_buy_request">
                </td>
              </div>
              <div class="col l4 m4 s12">
                <td>
                  <br />
                  <input type="submit" class="btn btn-float" value="Clear Cart" name="clear_cart">
                </td>
              </div>
              <div class="col l4 m4 s12">
                <td>
                  <br />
                  <input type="submit" class="btn btn-float" value="Update Cart" name="update_cart1">
                </td>
              </div>

            </div>
          </div>

          <div class="update-clear-cart hide-on-med-and-down">
            <div class="row">

              <div class="col l12 m12 s12">
                <td class="center-align">
                  <br />
                  <h5>Total: <?php echo $total;?>$</h5>
                </td>
              </div>
              <div class="col l4 m4 s12">
                <td class="center-align">
                  <br />
                  <input type="submit" class="btn btn-float" value="Send Buy request" name="send_buy_request">
                </td>
              </div>
              <div class="col l4 m4 s12">
                <td>
                  <br />
                  <input type="submit" class="btn btn-float" value="Clear Cart" name="clear_cart">
                </td>
              </div>
              <div class="col l4 m4 s12">
                <td>
                  <br />
                  <input type="submit" class="btn btn-float" value="Update Cart" name="update_cart">
                </td>
              </div>

            </div>
          </div>
        </div>
        </form>
      </section>

      <?php footer();?>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
    </body>
  </html>