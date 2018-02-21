<?php
ob_start();
session_start();
include "lib/main.php";

$select_about = @mysql_query("select * from about") or die (mysql_error());
$about = @mysql_fetch_assoc($select_about);
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/Logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | About us</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/about.css">
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

      <section class="about-us-page">
        <div class="row">
          <div class="col l6 m12 hide-on-med-and-down">
            <div class="about-us">
              <div class="site_image">
                <img src="images/<?php echo $about['pic'];?>" alt="<?php echo $about['title'];?>" class="responsive-img">
              </div>
            </div>
          </div>
          <div class="col l6 m6 s12 hide-on-large-only center-align">
            <div class="about-us">
              <div class="site_image">
                <img src="images/<?php echo $about['pic2'];?>" alt="<?php echo $about['title'];?>" class="responsive-img">
              </div>
            </div>
          </div>
          <div class="col l6 m6 s12">
            <div class="about">
              <h2><?php echo $about['title'];?></h2>
              <p>
                <?php echo $about['description'];?>
              </p>

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