<?php
ob_start();
session_start();
include "lib/main.php";
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['ar_site_name'];?> | التصنيفات</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize-rtl.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/categories.css">
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

      <section class="categories-page rtl">
        <div class="container-fluid">
          <div class="row">
          <?php
          $select_categories = @mysql_query("select * from category order by id desc") or die(mysql_error());
          while($categories = @mysql_fetch_assoc($select_categories)){
            echo '
            <div class="col l3 m4 s6">
              <div class="category">
                <a href="#branch'.$categories['id'].'" class="modal-trigger">
                  <img src="../images/'.$categories['pic'].'" class="responsive-img" alt="'.$categories['ar_category_name'].'">
                  <div class="category-name">
                    <h6>'.$categories['ar_category_name'].'</h6>
                  </div>
                </a>
                <!-- Branch of Category Modal Structure -->
              <div id="branch'.$categories['id'].'" class="modal branch">
                <div class="modal-content center-align">
                  <div class="container">
                    <div class="row">
                      ';
                      $select_sub_categories = @mysql_query("select * from sub_category where category_id='".$categories['id']."'") or die(mysql_error());
                      while($sub_category = @mysql_fetch_assoc($select_sub_categories)){
                        echo '
                      <div class="col l4 m6 s12">
                        <a href="products.php?category_id='.$sub_category['id'].'">
                          <h6>'.$sub_category['ar_title'].'</h6>
                        </a>
                      </div>
                        ';
                      }

                      echo '
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
      </section>

      <?php footer();?>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
    </body>
  </html>
