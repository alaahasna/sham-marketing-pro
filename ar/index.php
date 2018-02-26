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
      <title><?php echo $main_settings['ar_site_name'];?></title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lateef" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="css/materialize-rtl.min.css">
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
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

      <header class="rtl">
        <div class="row">
        <div class="col l8 m12 s12">
          <div class="slider">
            <ul class="slides">
            <?php
            $select_index_slid = @mysql_query("select * from index_slid order by id desc") or die(mysql_error());
            while($index_slid = @mysql_fetch_assoc($select_index_slid)){
              echo '
              <li>
                <img src="../images/'.$index_slid['pic'].'"> <!-- random image -->
                <div class="caption center-align">
                  <h3>'.$index_slid['ar_title'].'</h3>
                  <h5 class="light grey-text text-lighten-3">'.$index_slid['ar_description'].'</h5>
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
            $select_index_deals = @mysql_query("select * from index_deals") or die(mysql_error());
            $index_deals = @mysql_fetch_assoc($select_index_deals);
            ?>

              <div class="col l6 m3 s12">
                <a href="<?php echo $index_deals['link1'];?>" class="modal-trigger">
                  <img src="../images/<?php echo $index_deals['pic1'];?>" class="responsive-img" title="<?php echo $index_deals['ar_title1'];?>">
                  <p class="category-name center-align"><?php echo $index_deals['ar_title1'];?></p>
                </a>
              </div>
              <div class="col l6 m3 s12">
                <a href="<?php echo $index_deals['link2'];?>" class="modal-trigger">
                  <img src="../images/<?php echo $index_deals['pic2'];?>" class="responsive-img" title="<?php echo $index_deals['ar_title2'];?>">
                  <p class="category-name center-align"><?php echo $index_deals['ar_title2'];?></p>
                </a>
              </div>
              <div class="col l6 m3 s12">
                <a href="<?php echo $index_deals['link3'];?>" class="modal-trigger">
                  <img src="../images/<?php echo $index_deals['pic3'];?>" class="responsive-img" title="<?php echo $index_deals['ar_title3'];?>">
                  <p class="category-name center-align"><?php echo $index_deals['ar_title3'];?></p>
                </a>
              </div>
              <div class="col l6 m3 s12">
                <a href="<?php echo $index_deals['link4'];?>" class="modal-trigger">
                  <img src="../images/<?php echo $index_deals['pic4'];?>" class="responsive-img" title="<?php echo $index_deals['ar_title4'];?>">
                  <p class="category-name center-align"><?php echo $index_deals['ar_title4'];?></p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </header>
      <section class="deals">
        <div class="container">
          <div class="row">
            <div class="col l6 hide-on-med-and-down">
              <img src="imgs/Another-Walkabout-On-Beauty-And-Fashion-min.png" class="responsive-img">
            </div>
            <div class="col l6 s12 center-align">
              <h2>تسوّق الآن</h2>
              <p>عروضنا اليومية</p>
              <h1 class="deal-name">
                أفضل الحسومات
              </h1>
              <a class="btn btn-float btn-block" href="deals.php">الدخول إلى العروض </a>
            </div>
          </div>
        </div>
      </section>
      <section class="panel-fashion rtl">
        <div class="container-fluid">
        <?php
        $select_main_category_part_1 = @mysql_query("select * from category where view_in_index_in_part='1'") or die(mysql_error());
        $main_category_part_1 = @mysql_fetch_assoc($select_main_category_part_1);
        ?>
          <div class="section-title">
            <h2><?php echo $main_category_part_1['ar_category_name'];?></h2>
          </div>
          <div class="row">
          <?php
          $select_products_1 = @mysql_query("select * from products where deleted_product='No' and category_id in (select id from sub_category where category_id = (select id from category where view_in_index_in_part='1') ) order by id desc limit 5") or die(mysql_error());
          $i1 = 1;
          while($products_1 = @mysql_fetch_assoc($select_products_1)){
            if($i1 == 1){
            echo '
            <div class="col l6 m6 s12 center-align">
              <a href="single.php?id='.$products_1['id'].'">
                <img src="../images/'.$products_1['pic'].'" alt="'.$products_1['ar_title'].'" class="responsive-img">
                <p class="center-align">'.$products_1['ar_title'].'</p>
              </a>
            </div>
            ';
            $i1++;
            }else{
            echo '
            <div class="col l3 m3 s12 center-align">
              <a href="single.php?id='.$products_1['id'].'">
                <img src="../images/'.$products_1['pic'].'" alt="'.$products_1['ar_title'].'" class="responsive-img">
                <p class="center-align">'.$products_1['ar_title'].'</p>
              </a>
            </div>
            ';
            }

          }
          ?>


          </div>
        </div>
      </section>
      <section class="panel-electronic rtl">
        <div class="container-fluid">
        <?php
        $select_main_category_part_2 = @mysql_query("select * from category where view_in_index_in_part='2'") or die(mysql_error());
        $main_category_part_2 = @mysql_fetch_assoc($select_main_category_part_2);
        ?>
          <div class="section-title">
            <h2><?php echo $main_category_part_2['ar_category_name'];?></h2>
          </div>
          <div class="row">
          <?php
          $select_products_2 = @mysql_query("select * from products where deleted_product='No' and category_id in (select id from sub_category where category_id = (select id from category where view_in_index_in_part='2') ) order by id desc limit 5") or die(mysql_error());
          $i2 = 1;
          while($products_2 = @mysql_fetch_assoc($select_products_2)){
            if($i2 == 1){
            echo '
            <div class="col l6 m6 s12 center-align">
              <a href="single.php?id='.$products_2['id'].'">
                <img src="../images/'.$products_2['pic'].'" alt="'.$products_2['ar_title'].'" class="responsive-img">
                <p class="center-align">'.$products_2['ar_title'].'</p>
              </a>
            </div>
            ';
            $i2++;
            }else{
            echo '
            <div class="col l3 m3 s12 center-align">
              <a href="single.php?id='.$products_2['id'].'">
                <img src="../images/'.$products_2['pic'].'" alt="'.$products_2['ar_title'].'" class="responsive-img">
                <p class="center-align">'.$products_2['ar_title'].'</p>
              </a>
            </div>
            ';
            }

          }
          ?>


          </div>
        </div>
      </section>
      <section class="latest-products rtl">
        <div class="container-fluid">
          <div class="section-title">
            <h2>آخر المنتجات</h2>
          </div>
          <div class="row">
          <?php
          $select_last_products = @mysql_query("select * from products where deleted_product='No' order by id desc limit 4") or die(mysql_error());
          while($last_products = @mysql_fetch_assoc($select_last_products)){
            if($last_products['price_after_discount'] == 0) $price = $last_products['price']; else $price = "<i class='fa fa-star' title='خصومات على الأسعار'></i> <b>".$last_products['price_after_discount']."</b>";
            echo '
            <div class="col l3 s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="../images/'.$last_products['pic'].'" alt="'.$last_products['ar_title'].'">
                </div>
                <div class="card-content">
                  <span class="card-title">'.$last_products['ar_title'].'</span>
                  <p>'.$price.' $</p>
                  <a class="btn btn-float" href="single.php?id='.$last_products['id'].'">عرض المنتج</a>
                </div>
              </div>
            </div>
            ';
          }
          ?>
          </div>
        </div>
      </section>
      <section class="popular_products rtl">
        <div class="container-fluid">
          <div class="section-title">
            <h2>المنتجات الشائعة</h2>
          </div>
          <div class="row">
            <div class="owl-one owl-carousel">
            <?php
          $select_popular_products = @mysql_query("select * from products where deleted_product='No' and view_in_index='Yes' order by RAND() limit 15") or die(mysql_error());
          while($popular_products = @mysql_fetch_assoc($select_popular_products)){
            if($popular_products['price_after_discount'] == 0) $price = $popular_products['price']; else $price = "<i class='fa fa-star' title='خصومات على الأسعار'></i> <b>".$popular_products['price_after_discount']."</b>";
            echo '
            <div class="col l12 m12 s12">
                <div class="item">
                    <a href="single.php?id='.$popular_products['id'].'">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="../images/'.$popular_products['pic'].'" alt="'.$popular_products['ar_title'].'">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4" title="'.$popular_products['ar_title'].'">'.mb_substr($popular_products['ar_title'],0,10,'UTF-8').'..</span>
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
      <section class="categories rtl">
        <div class="container-fluid">
          <div class="section-title">
            <h2>التصنيفات</h2>
          </div>
          <div class="row">
            <div class="owl-two owl-carousel">
            <?php
            $select_categories = @mysql_query("select * from category order by id desc") or die(mysql_error());
            while($categories = @mysql_fetch_assoc($select_categories)){
              echo '
               <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#branch-categories-section'.$categories['id'].'" class="modal-trigger">
                    <div class="category-image">
                      <img src="../images/'.$categories['pic'].'" class="responsive-img" alt="'.$categories['ar_category_name'].'">
                    </div>
                    <div class="category-name">
                      <h6>'.$categories['ar_category_name'].'</h6>
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
      <?php
      $select_category_section = @mysql_query("select id from category order by id desc") or die(mysql_error());
      while($category_section = @mysql_fetch_assoc($select_category_section)){
        echo '
        <!-- Branch of Category Modal Structure -->
        <div id="branch-categories-section'.$category_section['id'].'" class="modal branch rtl">
          <div class="modal-content center-align">
            <div class="container">
              <div class="row">
              ';
              $select_sub_category_section = @mysql_query("select * from sub_category where category_id='".$category_section['id']."'") or die(mysql_error());
              while($sub_category_section = @mysql_fetch_assoc($select_sub_category_section)){
                echo '
                <div class="col l4 m6 s12">
                  <a href="products.php?category_id='.$sub_category_section['id'].'">
                    <h6>'.$sub_category_section['ar_title'].'</h6>
                  </a>
                </div>
                ';
              }

              echo '
              </div>
            </div>
          </div>
        </div>
        ';
      }
      ?>

      <section class="panel-home">
        <div class="container-fluid">
        <?php
        $select_main_category_part_3 = @mysql_query("select * from category where view_in_index_in_part='3'") or die(mysql_error());
        $main_category_part_3 = @mysql_fetch_assoc($select_main_category_part_3);
        ?>
          <div class="section-title">
            <h2><?php echo $main_category_part_3['ar_category_name'];?></h2>
          </div>
          <div class="row">
          <?php
          $select_products_3 = @mysql_query("select * from products where deleted_product='No' and category_id in (select id from sub_category where category_id = (select id from category where view_in_index_in_part='3') ) order by id desc limit 5") or die(mysql_error());
          $i3 = 1;
          while($products_3 = @mysql_fetch_assoc($select_products_3)){
            if($i3 == 1){
            echo '
            <div class="col l6 m6 s12 center-align">
              <a href="single.php?id='.$products_3['id'].'">
                <img src="../images/'.$products_3['pic'].'" alt="'.$products_3['ar_title'].'" class="responsive-img">
                <p class="center-align">'.$products_3['ar_title'].'</p>
              </a>
            </div>
            ';
            $i3++;
            }else{
            echo '
            <div class="col l3 m3 s12 center-align">
              <a href="single.php?id='.$products_3['id'].'">
                <img src="../images/'.$products_3['pic'].'" alt="'.$products_3['ar_title'].'" class="responsive-img">
                <p class="center-align">'.$products_3['ar_title'].'</p>
              </a>
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

<?php
ob_end_flush();
?>
