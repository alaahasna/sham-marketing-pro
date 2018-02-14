<?php
ob_start();
session_start();
include "lib/main.php";
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/Logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <?php nav_bar();?>
      <header>
        <div class="row">
        <div class="col l8 m12 s12">
          <div class="slider">
            <ul class="slides">
            <?php
            $select_index_slid = @mysql_query("select * from index_slid order by id desc") or die(mysql_error());
            while($index_slid = @mysql_fetch_assoc($select_index_slid)){
              echo '
              <li>
                <img src="images/'.$index_slid['pic'].'"> <!-- random image -->
                <div class="caption center-align">
                  <h3>'.$index_slid['title'].'</h3>
                  <h5 class="light grey-text text-lighten-3">'.$index_slid['description'].'</h5>
                </div>
              </li>
              ';
            }
            ?>
            </ul>
          </div>
        </div>
        <div class="col l4 m12 s12">
          <div class="category">
            <div class="row">
            <?php
            $select_last_4_categories = @mysql_query("select * from category order by id desc limit 4") or die(mysql_error());
            while($last_4_categories = @mysql_fetch_assoc($select_last_4_categories)){
              echo '
              <div class="col l6 m3 s12">
                <a href="#">
                  <img src="images/'.$last_4_categories['pic'].'" class="responsive-img" title="'.$last_4_categories['category_name'].'">
                  <p class="category-name center-align">'.$last_4_categories['category_name'].'</p>

                </a>
              </div>
              ';
            }
            ?>

            </div>
          </div>
        </div>
      </div>
      </header>
      <section class="deals">
        <div class="container">
          <div class="row">
            <div class="col l6 hide-on-med-and-down">
              <img src="imgs/deal.jpg" class="responsive-img">
            </div>
            <div class="col l6 s12 center-align">
              <h2>Shopping Now</h2>
              <p>Deal of the Day</p>
              <h1 class="deal-name">
                The best of discount
              </h1>
              <a class="btn btn-float btn-block" href="daily-deals.php">Show Deals</a>
            </div>
          </div>
        </div>
      </section>
      <section class="panel-fashion">
        <div class="container-fluid">
        <?php
        $select_main_category_part_1 = @mysql_query("select * from category where view_in_index_in_part='1'") or die(mysql_error());
        $main_category_part_1 = @mysql_fetch_assoc($select_main_category_part_1);
        ?>
          <div class="section-title">
            <h2><?php echo $main_category_part_1['category_name'];?></h2>
          </div>
          <div class="row">
          <?php
          $select_products_1 = @mysql_query("select * from products where category_id in (select id from sub_category where category_id = (select id from category where view_in_index_in_part='1') ) order by id desc limit 5") or die(mysql_error());
          $i1 = 1;
          while($products_1 = @mysql_fetch_assoc($select_products_1)){
            if($i1 == 1){
            echo '
            <div class="col l6 m6 s12 center-align">
              <a href="product.php?id='.$products_1['id'].'">
                <img src="images/'.$products_1['pic'].'" alt="'.$products_1['title'].'" class="responsive-img">
                <p class="center-align">'.$products_1['title'].'</p>
              </a>
            </div>
            ';
            $i1++;
            }else{
            echo '
            <div class="col l3 m3 s12 center-align">
              <a href="product.php?id='.$products_1['id'].'">
                <img src="images/'.$products_1['pic'].'" alt="'.$products_1['title'].'" class="responsive-img">
                <p class="center-align">'.$products_1['title'].'</p>
              </a>
            </div>
            ';
            }

          }
          ?>


          </div>
        </div>
      </section>
      <section class="panel-electronic">
        <div class="container-fluid">
        <?php
        $select_main_category_part_2 = @mysql_query("select * from category where view_in_index_in_part='2'") or die(mysql_error());
        $main_category_part_2 = @mysql_fetch_assoc($select_main_category_part_2);
        ?>
          <div class="section-title">
            <h2><?php echo $main_category_part_2['category_name'];?></h2>
          </div>
          <div class="row">
          <?php
          $select_products_2 = @mysql_query("select * from products where category_id in (select id from sub_category where category_id = (select id from category where view_in_index_in_part='2') ) order by id desc limit 5") or die(mysql_error());
          $i2 = 1;
          while($products_2 = @mysql_fetch_assoc($select_products_2)){
            if($i2 == 1){
            echo '
            <div class="col l6 m6 s12 center-align">
              <a href="product.php?id='.$products_2['id'].'">
                <img src="images/'.$products_2['pic'].'" alt="'.$products_2['title'].'" class="responsive-img">
                <p class="center-align">'.$products_2['title'].'</p>
              </a>
            </div>
            ';
            $i2++;
            }else{
            echo '
            <div class="col l3 m3 s12 center-align">
              <a href="product.php?id='.$products_2['id'].'">
                <img src="images/'.$products_2['pic'].'" alt="'.$products_2['title'].'" class="responsive-img">
                <p class="center-align">'.$products_2['title'].'</p>
              </a>
            </div>
            ';
            }

          }
          ?>


          </div>
        </div>
      </section>
      <section class="latest-products">
        <div class="container-fluid">
          <div class="section-title">
            <h2>Latest Products</h2>
          </div>
          <div class="row">
          <?php
          $select_last_products = @mysql_query("select * from products order by id desc limit 4") or die(mysql_error());
          while($last_products = @mysql_fetch_assoc($select_last_products)){
            if($last_products['price_after_discount'] == 0) $price = $last_products['price']; else $price = "<i class='fa fa-star' title='Discount'></i> <b>".$last_products['price_after_discount']."</b>";
            echo '
            <div class="col l3 s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="images/'.$last_products['pic'].'" alt="'.$last_products['title'].'">
                </div>
                <div class="card-content">
                  <span class="card-title">'.$last_products['title'].'</span>
                  <p>'.$price.' $</p>
                  <a class="btn btn-float" href="product.php?id='.$last_products['id'].'">Show Product</a>
                </div>
              </div>
            </div>
            ';
          }
          ?>
          </div>
        </div>
      </section>
      <section class="popular_products">
        <div class="container-fluid">
          <div class="section-title">
            <h2>Popular Products</h2>
          </div>
          <div class="row">
            <div class="owl-one owl-carousel">
            <?php
          $select_popular_products = @mysql_query("select * from products where view_in_index='Yes' order by RAND() limit 15") or die(mysql_error());
          while($popular_products = @mysql_fetch_assoc($select_popular_products)){
            if($popular_products['price_after_discount'] == 0) $price = $popular_products['price']; else $price = "<i class='fa fa-star' title='Discount'></i> <b>".$popular_products['price_after_discount']."</b>";
            echo '
            <div class="col l12 m12 s12">
                <div class="item">
                    <a href="product.php?id='.$popular_products['id'].'">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="images/'.$popular_products['pic'].'" alt="'.$popular_products['title'].'">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4" title="'.$popular_products['title'].'">'.mb_substr($popular_products['title'],0,12,'UTF-8').'..</span>
                          <p>'.$price.' $</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
            ';
          }
          ?>
            </div>
          </div>
        </div>
      </section>
      <section class="categories">
        <div class="container-fluid">
          <div class="section-title">
            <h2>Categories</h2>
          </div>
          <div class="row">
            <div class="owl-two owl-carousel">
            <?php
            $select_categories = @mysql_query("select * from category order by id desc") or die(mysql_error());
            while($categories = @mysql_fetch_assoc($select_categories)){
              echo '
               <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="images/'.$categories['pic'].'" class="responsive-img" alt="'.$categories['category_name'].'">
                    </div>
                    <div class="category-name">
                      <h6>'.$categories['category_name'].'</h6>
                    </div>
                  </a>
                </div>
              </div>
              ';
            }
            ?>
            </div>
          </div>
        </div>
      </section>
      

      <section class="panel-electronic">
        <div class="container-fluid">
        <?php
        $select_main_category_part_3 = @mysql_query("select * from category where view_in_index_in_part='3'") or die(mysql_error());
        $main_category_part_3 = @mysql_fetch_assoc($select_main_category_part_3);
        ?>
          <div class="section-title">
            <h2><?php echo $main_category_part_3['category_name'];?></h2>
          </div>
          <div class="row">
          <?php
          $select_products_3 = @mysql_query("select * from products where category_id in (select id from sub_category where category_id = (select id from category where view_in_index_in_part='3') ) order by id desc limit 5") or die(mysql_error());
          $i3 = 1;
          while($products_3 = @mysql_fetch_assoc($select_products_3)){
            if($i3 == 1){
            echo '
            <div class="col l6 m6 s12">
              <a href="product.php?id='.$products_3['id'].'">
                <img src="images/'.$products_3['pic'].'" alt="'.$products_3['title'].'" class="responsive-img">
                <p class="center-align">'.$products_3['title'].'</p>
              </a>
            </div>
            ';
            $i2++;
            }else{
            echo '
            <div class="col l3 m3 s12">
              <a href="product.php?id='.$products_3['id'].'">
                <img src="images/'.$products_3['pic'].'" alt="'.$products_3['title'].'" class="responsive-img">
                <p class="center-align">'.$products_3['title'].'</p>
              </a>
            </div>
            ';
            }

          }
          ?>


          </div>
        </div>
      </section>
      <footer>
        <div class="container">
          <div class="social-media">
            <div class="facebook">
              <a href="<?php echo $main_settings['facebook_link'];?>">
                <i class="fa fa-facebook fa-2x"></i>
              </a>
            </div>
            <div class="youtube">
              <a href="<?php echo $main_settings['youtube_link'];?>">
                <i class="fa fa-youtube fa-2x"></i>
              </a>
            </div>
            <div class="linkedin">
              <a href="<?php echo $main_settings['linkedin_link'];?>">
                <i class="fa fa-linkedin fa-2x"></i>
              </a>
            </div>
            <div class="instagram">
              <a href="<?php echo $main_settings['instagram_link'];?>">
                <i class="fa fa-instagram fa-2x"></i>
              </a>
            </div>
          </div>
          <p class="terms center-align">
            <?php echo $main_settings['copyrights'];?>
          </p>
          <p class="center-align syweb">Made With <span style="color:red;"> <i class="fa fa-heart"></i> </span> By <a href="http://www.syweb.co/" style="color: #FFF;">SYweb</a></p>
        </div>
      </footer>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
    </body>
  </html>

<?php
ob_end_flush();
?>