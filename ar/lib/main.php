<?php

          function connect_db(){
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "ssp";
            $connect_db = @mysql_connect($host,$user,$password) or die(mysql_error());
            $select_db = @mysql_select_db($database,$connect_db);
          }

          function create_db(){
            $database = "ssp";
            $create_database = @mysql_query("CREATE DATABASE IF NOT EXISTS ".$database."");
            if(isset($create_database)){
              $create_table_admin = @mysql_query("CREATE TABLE IF NOT EXISTS admin(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), username VARCHAR(250) NOT NULL, email VARCHAR(250) NOT NULL, password LONGTEXT NOT NULL)");
              $create_table_main_settings = @mysql_query("CREATE TABLE IF NOT EXISTS main_settings(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), site_name VARCHAR(250) NOT NULL, ar_site_name VARCHAR(250) NOT NULL, site_url VARCHAR(255) NOT NULL, site_mail VARCHAR(255) NOT NULL, copyrights VARCHAR(250) NOT NULL, ar_copyrights VARCHAR(250) NOT NULL, facebook_link VARCHAR(250) NOT NULL, youtube_link VARCHAR(250) NOT NULL, instagram_link VARCHAR(250) NOT NULL, phone VARCHAR(250) NOT NULL, address VARCHAR(250) NOT NULL, ar_address VARCHAR(250) NOT NULL, linkedin_link VARCHAR(250) NOT NULL)");
              $create_table_about = @mysql_query("CREATE TABLE IF NOT EXISTS about(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), title LONGTEXT NOT NULL, description LONGTEXT NOT NULL, ar_title LONGTEXT NOT NULL, ar_description LONGTEXT NOT NULL, pic LONGTEXT NOT NULL, pic2 LONGTEXT NOT NULL)");
              $create_table_services = @mysql_query("CREATE TABLE IF NOT EXISTS services(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), title1 LONGTEXT NOT NULL, description1 LONGTEXT NOT NULL, ar_title1 LONGTEXT NOT NULL, ar_description1 LONGTEXT NOT NULL, pic1 LONGTEXT NOT NULL, title2 LONGTEXT NOT NULL, description2 LONGTEXT NOT NULL, ar_title2 LONGTEXT NOT NULL, ar_description2 LONGTEXT NOT NULL, pic2 LONGTEXT NOT NULL, title3 LONGTEXT NOT NULL, description3 LONGTEXT NOT NULL, ar_title3 LONGTEXT NOT NULL, ar_description3 LONGTEXT NOT NULL, pic3 LONGTEXT NOT NULL)");
              $create_table_index_slid = @mysql_query("CREATE TABLE IF NOT EXISTS index_slid(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), pic LONGTEXT NOT NULL, title LONGTEXT NOT NULL, description LONGTEXT NOT NULL, ar_title LONGTEXT NOT NULL, ar_description LONGTEXT NOT NULL)");
              $create_table_category = @mysql_query("CREATE TABLE IF NOT EXISTS category(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), pic LONGTEXT NOT NULL, category_name LONGTEXT NOT NULL, ar_category_name LONGTEXT NOT NULL, view_in_index_in_part LONGTEXT NOT NULL)");
              $create_table_sub_category = @mysql_query("CREATE TABLE IF NOT EXISTS sub_category(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), title LONGTEXT NOT NULL, ar_title LONGTEXT NOT NULL, category_id int NOT NULL)");
              $create_table_products = @mysql_query("CREATE TABLE IF NOT EXISTS products(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), pic LONGTEXT NOT NULL,title LONGTEXT NOT NULL, ar_title LONGTEXT NOT NULL,description LONGTEXT NOT NULL,ar_description LONGTEXT NOT NULL, category_id int NOT NULL, price float NOT NULL, put_in_daily_deals VARCHAR(25) NOT NULL, value_of_discount int NOT NULL, price_after_discount float NOT NULL, view_in_index VARCHAR(25) NOT NULL, quantity int NOT NULL, deleted_product varchar(25) NOT NULL)");
              $create_table_sub_products = @mysql_query("CREATE TABLE IF NOT EXISTS sub_products(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), pic LONGTEXT NOT NULL, product_id int NOT NULL)");
              $create_table_users = @mysql_query("CREATE TABLE IF NOT EXISTS users(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), first_name LONGTEXT NOT NULL,last_name LONGTEXT NOT NULL, password LONGTEXT NOT NULL,email LONGTEXT NOT NULL,phone LONGTEXT NOT NULL, address LONGTEXT NOT NULL, register_date date NOT NULL, register_by LONGTEXT NOT NULL, social_media_id int NOT NULL)");
              $create_table_cart = @mysql_query("CREATE TABLE IF NOT EXISTS cart(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), session_id LONGTEXT NOT NULL, product_id int NOT NULL, quantity int NOT NULL, date_of_add datetime NOT NULL, requested VARCHAR(10) NOT NULL)");
              $create_table_request_product = @mysql_query("CREATE TABLE IF NOT EXISTS request_product(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), user_id int NOT NULL, session_id LONGTEXT NOT NULL, ok_from_admin LONGTEXT NOT NULL)");
              $create_table_index_deals = @mysql_query("CREATE TABLE IF NOT EXISTS index_deals(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), pic1 LONGTEXT NOT NULL, title1 LONGTEXT NOT NULL, ar_title1 LONGTEXT NOT NULL, link1 LONGTEXT NOT NULL, pic2 LONGTEXT NOT NULL, title2 LONGTEXT NOT NULL, ar_title2 LONGTEXT NOT NULL, link2 LONGTEXT NOT NULL, pic3 LONGTEXT NOT NULL, title3 LONGTEXT NOT NULL, ar_title3 LONGTEXT NOT NULL, link3 LONGTEXT NOT NULL, pic4 LONGTEXT NOT NULL, title4 LONGTEXT NOT NULL, ar_title4 LONGTEXT NOT NULL, link4 LONGTEXT NOT NULL)");

            }
            }

            function defult_values(){
            $check = @mysql_query("SELECT id FROM admin");
            $num = @mysql_num_rows($check);
            $password = md5('12345');
            if($num == 0){
            $defult_admin = @mysql_query("INSERT INTO admin (username,email,password) VALUES ('Admin','admin@domain.com','".$password."')");
            $defult_main_settings = @mysql_query("INSERT INTO main_settings
                                                  (site_name,ar_site_name,site_url,site_mail,copyrights,ar_copyrights,facebook_link,youtube_link,instagram_link,phone,address,ar_address,linkedin_link)
                                                  VALUES
                                                  ('S.S.P','','http://s-s-p.com/','info@s-s-p.com','All Terms Reserved For Sham Shopping Plus ','','https://facebook.com','','','','','','')
                                                ") or die(mysql_error());
            $title = 'Lorem ipsum dolor sit amet';
            $description = 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor. Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa. ';
            $defult_about = @mysql_query("INSERT INTO about (title,description,ar_title,ar_description,pic,pic2) VALUES ('".$title."','".$description."','".$title."','".$description."','about.png','about-mobile.png')") or die(mysql_error());
            $defult_services = @mysql_query("INSERT INTO services (title1,description1,ar_title1,ar_description1,pic1,title2,description2,ar_title2,ar_description2,pic2,title3,description3,ar_title3,ar_description3,pic3) VALUES ('".$title."','".$description."','".$title."','".$description."','service1.jpeg','".$title."','".$description."','".$title."','".$description."','service3.jpg','".$title."','".$description."','".$title."','".$description."','service2.jpg')") or die(mysql_error());
            $defult_index_deals = @mysql_query("INSERT INTO index_deals (pic1,title1,link1,pic2,title2,link2,pic3,title3,link3,pic4,title4,link4,ar_title1,ar_title2,ar_title3,ar_title4) VALUES ('fashion1.jpeg','Fashion','http://www.example.com/','fashion1.jpeg','Fashion','http://www.example.com/','fashion1.jpeg','Fashion','http://www.example.com/','fashion1.jpeg','Fashion','http://www.example.com/','','','','')") or die(mysql_error());


            }
            }

            function safe_input($x){
            if(isset($x)){
            $x = htmlentities($x);
            $x = strip_tags($x);
            $x = addslashes($x);
            $x = mysql_real_escape_string($x);
            $x = trim($x);
            }
            return $x;
            }


            function error_message($message){
              echo '
              <div class="mfp-wrap mfp-gallery mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="margin-top: 200px; overflow-x: hidden; overflow-y: auto;">
              <div class="mfp-container mfp-s-ready mfp-image-holder" style="background: rgba(0, 0, 0, 0.59); ">
              <div class="mfp-content" style="top: -20px;text-align: center;color: #000;padding: 35px 35px 20px 35px;background-color: #fff;border: 1px solid #000;box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);padding-left: 15px;padding-right: 15px;">

              <p><strong>'.$message.'</strong></p><br>
              <a href="'.esc_url($_SERVER['PHP_SELF']).'">
              <button class="basket-table__confirm-remove__remove button xs--one-whole">موافق</button>
              </a></div>
              </div>
              </div>
              ';
            }

            function error_message_with_link($message,$link){
              echo '
              <div class="mfp-wrap mfp-gallery mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="margin-top: 200px; overflow-x: hidden; overflow-y: auto;">
              <div class="mfp-container mfp-s-ready mfp-image-holder" style="background: rgba(0, 0, 0, 0.59); ">
              <div class="mfp-content" style="top: -20px;text-align: center;color: #000;padding: 35px 35px 20px 35px;background-color: #fff;border: 1px solid #000;box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);padding-left: 15px;padding-right: 15px;">

              <p><strong>'.$message.'</strong></p><br>
              <a href="'.$link.'">
              <button class="basket-table__confirm-remove__remove button xs--one-whole">موافق</button>
              </a></div>
              </div>
              </div>
              ';
            }

            function confirm_message($message,$ok_link,$no_link){
              echo '
              <div class="mfp-wrap mfp-gallery mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="margin-top: 200px; overflow-x: hidden; overflow-y: auto;">
              <div class="mfp-container mfp-s-ready mfp-image-holder" style="background: rgba(0, 0, 0, 0.59); ">
              <div class="mfp-content" style="top: -20px;text-align: center;color: #000;padding: 35px 35px 20px 35px;background-color: #fff;border: 1px solid #000;box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);padding-left: 15px;padding-right: 15px;">
              <p><strong>'.$message.'</strong></p><br>
              <a href="'.$no_link.'">
              <button class="basket-table__confirm-remove__cancel button button--snd cancel xs--one-whole">لا</button>
              </a>
              &nbsp;&nbsp;
              <a href="'.$ok_link.'">
              <button class="basket-table__confirm-remove__remove button xs--one-whole">نعم</button>
              </a>
              </div>
              </div>
              </div>
              ';
            }

            function esc_url($url) {

                if ('' == $url) {
                    return $url;
                }
                $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
                $strip = array('%0d', '%0a', '%0D', '%0A');
                $url = (string) $url;
                $count = 1;
                while ($count) {
                    $url = str_replace($strip, '', $url, $count);
                }
                $url = str_replace(';//', '://', $url);
                $url = htmlentities($url);
                $url = str_replace('&amp;', '&#038;', $url);
                $url = str_replace("'", '&#039;', $url);
                if ($url[0] !== '/') {
                    // We're only interested in relative links from $_SERVER['PHP_SELF']
                    return '';
                } else {
                    return $url;
                }
            }

            function delete_spechial_char($x){
              $x = str_ireplace("!","-",$x);
              $x = str_ireplace("@","-",$x);
              $x = str_ireplace("#","-",$x);
              $x = str_ireplace("$","-",$x);
              $x = str_ireplace("%","-",$x);
              $x = str_ireplace("^","-",$x);
              $x = str_ireplace("&","-",$x);
              $x = str_ireplace("*","-",$x);
              $x = str_ireplace("(","-",$x);
              $x = str_ireplace(")","-",$x);
              $x = str_ireplace("/","-",$x);
              $x = str_ireplace("?","-",$x);
              return $x;
            }

            function categories_in_nav(){
              $select_nav_category = @mysql_query("select * from category") or die(mysql_error());
              while($nav_category = @mysql_fetch_assoc($select_nav_category)){
                echo '
                  <div class="category">
                      <!-- Dropdown Trigger -->
                      <a class="dropdown-trigger btn" href="#" data-target="dropdown'.$nav_category['id'].'">'.$nav_category['ar_category_name'].'</a>
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
                                  <h6>'.$nav_sub_category['ar_title'].'</h6>';

                                  $select_nav_products = @mysql_query("select * from products where category_id='".$nav_sub_category['id']."'") or die(mysql_error());
                                  while($nav_products = @mysql_fetch_assoc($select_nav_products)){

                                  echo '
                                  <a href="single.php?id='.$nav_products['id'].'">'.$nav_products['ar_title'].'</a>
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
                ';
              }
            }

            function nav_bar($session,$session_id){
              echo '
              <nav>
        <div class="nav-wrapper">
          <a class="right hide-on-large-only search-mid-screen modal-trigger" href="#search"><i class="fa fa-search fa-2x"></i></a>
          <a href="index.php" class="brand-logo">
              <img src="imgs/logo.png" class="responsive-img" width="250">
          </a>
          <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li><a href="index.php">الرئيسية</a></li>
            <li><a href="categories.php">التصنيفات</a></li>
            <li><a href="products.php">المنتجات</a></li>
            <li><a href="services.php">الخدمات</a></li>
            <li><a href="deals.php">العروض اليومية</a></li>
            <li><a href="about.php">من نحن</a></li>
            <li><a href="contact.php">الإتصال بنا</a></li>
          </ul>
          <ul class="right hide-on-med-and-down">
          ';
          $select_num_cart = @mysql_query("select sum(quantity) as sum_quantity from cart where session_id='".$session_id."' and requested='No'") or die(mysql_error());
          $num_cart = @mysql_fetch_assoc($select_num_cart);
          echo '
            <li><a href="cart.php"><i class="fa fa-shopping-cart fa-2x"></i><span style="color: red;">'.$num_cart['sum_quantity'].'</span></a></li>
            ';
            if($session == 'with_out_session'){
              echo '
            <li><a href="#login" class="modal-trigger"><i class="fa fa-user fa-2x"></i></a></li>
              ';
            }else{
              $select_user_name = @mysql_query("select first_name,last_name from users where id='".$session."'") or die(mysql_error());
              $user_name = @mysql_fetch_assoc($select_user_name);
              echo '
            <li><a href="#user-dropdown" data-beloworigin="true" class="dropdown-button" data-activates="user-dropdown"><i class="fa fa-user fa-2x"></i> مرحباً '.$user_name['first_name'].'</a></li>
            <!-- Dropdown Structure -->"
           <ul id="user-dropdown" class="dropdown-content">
             <li><a href="user-info.php">الملف الشخصي</a></li>
             <li><a href="purchased-items.php">المنتجات التي تم شرائها</a></li>
             <li><a href="logout.php">تسجيل الخروج</a></li>
           </ul>

              ';
            }
            echo '
            <li><a href="#search" class="modal-trigger"><i class="fa fa-search fa-2x"></i></a></li>
            <li><a href="../">English</a></li>
          </ul>

          <ul class="sidenav" id="mobile-navbar">
            <li><a href="index.php">الرئيسية</a></li>
            <li><a href="categories.php">التصنيفات</a></li>
            <li><a href="products.php">المنتجات</a></li>
            <li><a href="services.php">الخدمات</a></li>
            <li><a href="deals.php">العروض اليومية</a></li>
            <li><a href="about.php">من نحن</a></li>
            <li><a href="contact.php">الإتصال بنا</a></li>
            <li><a href="cart.php">سلة الشراء</a></li>
            <li><a href="#login">تسجيل الدخول</a></li>
            <li><a href="../">English</a></li>
          </ul>
        </div>
        <!-- Search Modal Structure -->
        <div id="search" class="modal">
          <div class="modal-content center-align">
            <div class="container">
              <div class="row">
                <h4>البحث</h4>
                <form action="search.php" method="get">
                <input type="text" name="search" placeholder="أبحث عن.." required="required" />
                <input type="submit" value="إبحث" class="btn btn-float" />
                </form>
              </div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="login.js"></script>
         <!-- Search Modal Structure -->
        <div id="login" class="modal">
          <div class="modal-content center-align">
            <div class="container">
              <div class="row">
                <h4>تسجيل الدخول</h4>
                <p id="error" style="color: red; margin: -30px;"> &nbsp;</p>
                <input type="text" name="username" id="username"  placeholder="البريد الإلكتروني">
                <input type="password" name="password" id="password" placeholder="كلمة المرور">
                <a href="#" name="login" onclick="login()" class="btn btn-float signin">تسجيل الدخول</a>
                <a href="register.php" class="btn btn-block btn-float signup">تسجيل حساب جديد</a>
                <a href="forget-password.php" class="center-align" style="color: #000; margin-top: -10px; text-decoration: underline;">نسيت كلمة المرور؟ إضغط هنا..</a>
                <!--<p class="center-align" style="margin-top: -20px;">التسجيل عن طريق:</p>
                <div class="center-align" style="margin-top: -20px;">
                  <div class="facebook">
                    <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                  </div>
                  <div class="google">
                    <a href="#"><i class="fa fa-google fa-2x"></i></a>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
        </div>
          <div class="nav-content hide-on-med-and-down">
            <div class="categories-list">
              <div class="row">
              ';
              categories_in_nav();
              echo '
              </div>
            </div>
          </div>
      </nav>
              ';
            }

            function footer(){

            $select_main_settings = @mysql_query("select * from main_settings");
            $main_settings = @mysql_fetch_assoc($select_main_settings);

              ?>
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
            <?php echo $main_settings['ar_copyrights'];?>
          </p>
          <p class="center-align syweb">تم هذا المشروع مع <span style="color:red;"> <i class="fa fa-heart"></i> </span> عن طريق <a href="http://www.syweb.co/" style="color: #FFF;">SYweb</a></p>
        </div>
      </footer>
              <?php
            }
            connect_db();
            create_db();
            defult_values();

            $select_main_settings = @mysql_query("select * from main_settings");
            $main_settings = @mysql_fetch_assoc($select_main_settings);


?>
