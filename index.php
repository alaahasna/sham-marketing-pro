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
      <nav>
        <div class="nav-wrapper">
          <a class="right hide-on-large-only search-mid-screen modal-trigger" href="#search"><i class="fa fa-search fa-2x"></i></a>
          <a href="#!" class="brand-logo">
              <img src="imgs/logo.png" class="responsive-img" width="250">
          </a>
          <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="services.php">Daily Deals</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
          <ul class="right hide-on-med-and-down">
            <li><a href="cart.php"><i class="fa fa-shopping-cart fa-2x"></i></a></li>
            <li><a href="#login" class="modal-trigger"><i class="fa fa-user fa-2x"></i></a></li>
            <li><a href="#search" class="modal-trigger"><i class="fa fa-search fa-2x"></i></a></li>
            <li><a href="ar/">Arabic</a></li>
          </ul>

          <ul class="sidenav" id="mobile-navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="daily-deals.php">Daily Deals</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="#login">Login</a></li>
            <li><a href="ar/">Arabic</a></li>
          </ul>
        </div>
        <!-- Search Modal Structure -->
        <div id="search" class="modal">
          <div class="modal-content center-align">
            <div class="container">
              <div class="row">
                <h4>Search</h4>
                <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search.." required="required" />
                <input type="submit" value="Search" class="btn btn-float" />
                </form>
              </div>
            </div>
          </div>
        </div>
         <!-- Search Modal Structure -->
        <div id="login" class="modal">
          <div class="modal-content center-align">
            <div class="container">
              <div class="row">
                <h4>Sign In</h4>
                <input type="text" name="username" placeholder="Email or Username..">
                <input type="password" name="password" placeholder="Password..">
                <input type="submit" value="Login" class="btn btn-float">
                <a href="register.php" class="btn btn-block btn-float signup">SIGN UP</a>
                <p class="center-align">Login Or SignUp using:</p>
                <div class="center-align">
                  <div class="facebook">
                    <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                  </div>
                  <div class="google">
                    <a href="#"><i class="fa fa-google fa-2x"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="nav-content hide-on-med-and-down">
            <div class="categories-list">
              <div class="row">
              <?php
              $select_nav_category = @mysql_query("select * from category") or die(mysql_error());
              while($nav_category = @mysql_fetch_assoc($select_nav_category)){
                echo '
               <div class="col l2">
                  <div class="category">
                      <!-- Dropdown Trigger -->
                      <a class="dropdown-trigger btn" href="#" data-target="dropdown'.$nav_category['id'].'">'.$nav_category['category_name'].'</a>
                      <i class="material-icons">expand_more</i>

                      <!-- Dropdown Structure -->
                      <ul id="dropdown'.$nav_category['id'].'" class="dropdown-content">
                        <li>
                          <div class="container">
                            <div class="row">
                            ';
                                $select_nav_sub_category = @mysql_query("select * from sub_category where category_id='".$nav_category['id']."'") or die(mysql_error());
                                while($nav_sub_category = @mysql_fetch_assoc($select_nav_sub_category)){
                                  echo '
                                  <div class="col l3">
                                  <h6>'.$nav_sub_category['title'].'</h6>';

                                  $select_nav_products = @mysql_query("select * from products where category_id='".$nav_sub_category['id']."'") or die(mysql_error());
                                  while($nav_products = @mysql_fetch_assoc($select_nav_products)){

                                  echo '
                                  <a href="#">'.$nav_products['title'].'</a>
                                  ';
                                  }

                                  echo '</div>';
                                }
                                echo'

                            </div>
                          </div>
                        </li>
                      </ul>
                  </div>
                </div>
                ';
              }
              ?>
              </div>
            </div>
          </div>
      </nav>
      <header>
        <div class="row">
        <div class="col l8 m12 s12">
          <div class="slider">
            <ul class="slides">
              <li>
                <img src="imgs/fashion1.jpeg"> <!-- random image -->
                <div class="caption center-align">
                  <h3>This is our big Tagline!</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
              </li>
              <li>
                <img src="imgs/slide3.jpeg"> <!-- random image -->
                <div class="caption left-align">
                  <h3>Left Aligned Caption</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
              </li>
              <li>
                <img src="imgs/slide2.jpeg"> <!-- random image -->
                <div class="caption right-align">
                  <h3>Right Aligned Caption</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
              </li>
              <li>
                <img src="imgs/slide3.jpeg"> <!-- random image -->
                <div class="caption center-align">
                  <h3>This is our big Tagline!</h3>
                  <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col l4 m12 s12">
          <div class="category">
            <div class="row">
              <div class="col l6 m3 s12">
                <a href="#">
                  <img src="imgs/fashion.jpeg" class="responsive-img">
                  <p class="category-name center-align">Fashion</p>

                </a>
              </div>
              <div class="col l6 m3 s12">
                <a href="#">
                  <img src="imgs/lifestyle.jpeg" class="responsive-img">
                  <p class="category-name center-align">Fashion</p>
                </a>
              </div>
              <div class="col l6 m3 s12">
                <a href="#">
                  <img src="imgs/sport.jpeg" class="responsive-img">
                  <p class="category-name center-align">Fashion</p>
                </a>
              </div>
              <div class="col l6 m3 s12">
                <a href="#">
                  <img src="imgs/ele1.jpeg" class="responsive-img">
                  <p class="category-name center-align">Fashion</p>
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
            <div class="col l8 hide-on-med-and-down">
              <img src="imgs/deal.jpg" class="responsive-img">
            </div>
            <div class="col l4 s12 center-align">
              <h2>Shopping Now</h2>
              <p>Deal of the Day</p>
              <h1 class="deal-name">
                Spring 2018
              </h1>
              <a class="btn btn-float btn-block" href="daily-deals.php">Show Deals</a>
            </div>
          </div>
        </div>
      </section>
      <section class="panel-fashion">
        <div class="container-fluid">
          <div class="section-title">
            <h2>New Fashion Arrivals</h2>
          </div>
          <div class="row">
            <div class="col l6 m6 s12">
              <a href="#">
                <img src="imgs/fashion1.jpeg" class="responsive-img">
                <p class="center-align">Fashion Name</p>
              </a>
            </div>
            <div class="col l3 m3 s12">
              <div class="row">
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/fashion1.jpeg" class="responsive-img">
                      <p class="center-align">Fashion Name</p>
                  </a>
                </div>
                <div class="col l12 m12 s12">
                    <a href="#">
                      <img src="imgs/fashion1.jpeg" class="responsive-img">
                      <p class="center-align">Fashion Name</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col l3 m3 s12">
              <div class="row">
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/fashion1.jpeg" class="responsive-img">
                      <p class="center-align">Fashion Name</p>
                  </a>
                </div>
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/fashion1.jpeg" class="responsive-img">
                      <p class="center-align">Fashion Name</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="panel-electronic">
        <div class="container-fluid">
          <div class="section-title">
            <h2>New Electronic Arrivals</h2>
          </div>
          <div class="row">
            <div class="col l6 m6 s12">
              <a href="#">
                <img src="imgs/ele.jpeg" class="responsive-img">
                <p class="center-align">Electronic Name</p>
              </a>
            </div>
            <div class="col l3 m3 s12">
              <div class="row">
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/ele.jpeg" class="responsive-img">
                      <p class="center-align">Electronic Name</p>
                  </a>
                </div>
                <div class="col l12 m12 s12">
                    <a href="#">
                      <img src="imgs/ele.jpeg" class="responsive-img">
                      <p class="center-align">Electronic Name</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col l3 m3 s12">
              <div class="row">
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/ele.jpeg" class="responsive-img">
                      <p class="center-align">Fashion Name</p>
                  </a>
                </div>
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/ele.jpeg" class="responsive-img">
                      <p class="center-align">Fashion Name</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="latest-products">
        <div class="container-fluid">
          <div class="section-title">
            <h2>Latest Products</h2>
          </div>
          <div class="row">
            <div class="col l3 s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="imgs/item.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title</span>
                  <p>$ 20.00</p>
                  <a class="btn btn-float" href="#">Show Product</a>
                </div>
              </div>
            </div>
            <div class="col l3 s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="imgs/item.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title</span>
                  <p>$ 20.00</p>
                  <a class="btn btn-float" href="#">Show Product</a>
                </div>
              </div>
            </div>
            <div class="col l3 s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="imgs/item.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title</span>
                  <p>$ 20.00</p>
                  <a class="btn btn-float" href="#">Show Product</a>
                </div>
              </div>
            </div>
            <div class="col l3 s12 m4">
              <div class="card">
                <div class="card-image">
                  <img src="imgs/item.jpg">
                </div>
                <div class="card-content">
                  <span class="card-title">Card Title</span>
                  <p>$ 20.00</p>
                  <a class="btn btn-float" href="#">Show Product</a>
                </div>
              </div>
            </div>
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
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                    <a href="#">
                      <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="imgs/item.jpg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">Card Title</span>
                          <p>$ 20.00</p>
                        </div>
                      </div>
                    </a>
                </div>
              </div>
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
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/fashion.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>Fashion</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/lifestyle.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>LifeStyle</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/sport.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>Sport & Fitness</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/sport.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>Sport & Fitness</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/fashion.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>Fashion</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/lifestyle.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>LifeStyle</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/sport.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>Sport & Fitness</h6>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col l12 m12 s12">
                <div class="item">
                  <a href="#">
                    <div class="category-image">
                      <img src="imgs/sport.jpeg" class="responsive-img">
                    </div>
                    <div class="category-name">
                      <h6>Sport & Fitness</h6>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      

      <section class="panel-electronic">
        <div class="container-fluid">
          <div class="section-title">
            <h2>New House Style Arrivals</h2>
          </div>
          <div class="row">
            <div class="col l6 m6 s12">
              <a href="#">
                <img src="imgs/home1.jpeg" class="responsive-img">
                <p class="center-align">House Style Name</p>
              </a>
            </div>
            <div class="col l3 m3 s12">
              <div class="row">
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/home2.jpeg" class="responsive-img">
                      <p class="center-align">House Style Name</p>
                  </a>
                </div>
                <div class="col l12 m12 s12">
                    <a href="#">
                      <img src="imgs/home3.jpeg" class="responsive-img">
                      <p class="center-align">House Style Name</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col l3 m3 s12">
              <div class="row">
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/home1.jpeg" class="responsive-img">
                      <p class="center-align">House Style Name</p>
                  </a>
                </div>
                <div class="col l12 m12 s12">
                  <a href="#">
                      <img src="imgs/home2.jpeg" class="responsive-img">
                      <p class="center-align">House Style Name</p>
                  </a>
                </div>
              </div>
            </div>
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