<?php
ob_start();
session_start();
include "lib/main.php";

$select_services = @mysql_query("select * from services") or die (mysql_error());
$services = @mysql_fetch_assoc($select_services);
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['ar_site_name'];?> | الخدمات</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize-rtl.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/services.css">
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

      <section class="services rtl">
        <div class="container-fluid">
          <div class="row">
            <div class="col s12">
              <div class="service">
                <div class="row">
                  <div class="col l6 s12">
                    <img src="../images/<?php echo $services['pic1'];?>" alt="<?php echo $services['ar_title1'];?>" class="responsive-img">
                  </div>
                  <div class="col l6 s12">
                    <h2><?php echo $services['ar_title1'];?></h2>
                    <p>
                      <?php echo $services['ar_description1'];?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="service">
                <div class="row">
                  <div class="col l6 s12">
                    <h2><?php echo $services['ar_title2'];?></h2>
                    <p>
                      <?php echo $services['ar_description2'];?>
                    </p>
                  </div>
                  <div class="col l6 s12">
                    <img src="../images/<?php echo $services['pic2'];?>" alt="<?php echo $services['ar_title2'];?>" class="responsive-img">
                  </div>
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
