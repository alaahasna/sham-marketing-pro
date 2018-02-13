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
              $create_table_products = @mysql_query("CREATE TABLE IF NOT EXISTS products(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), pic LONGTEXT NOT NULL,title LONGTEXT NOT NULL, ar_title LONGTEXT NOT NULL,description LONGTEXT NOT NULL,ar_description LONGTEXT NOT NULL, category_id int NOT NULL, price float NOT NULL, put_in_daily_deals VARCHAR(25) NOT NULL, value_of_discount int NOT NULL, price_after_discount float NOT NULL, view_in_index VARCHAR(25) NOT NULL, quantity int NOT NULL)");
              $create_table_users = @mysql_query("CREATE TABLE IF NOT EXISTS users(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), first_name LONGTEXT NOT NULL,last_name LONGTEXT NOT NULL, password LONGTEXT NOT NULL,email LONGTEXT NOT NULL,phone LONGTEXT NOT NULL, address LONGTEXT NOT NULL, register_date date NOT NULL)");
              $create_table_cart = @mysql_query("CREATE TABLE IF NOT EXISTS cart(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), session_id LONGTEXT NOT NULL, product_id int NOT NULL, quantity int NOT NULL, date_of_add datetime NOT NULL, requested VARCHAR(10) NOT NULL)");
              $create_table_request_product = @mysql_query("CREATE TABLE IF NOT EXISTS request_product(id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(id), user_id int NOT NULL, session_id LONGTEXT NOT NULL, ok_from_admin LONGTEXT NOT NULL)");
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
              <div class="mfp-wrap mfp-gallery mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow-x: hidden; overflow-y: auto;">
              <div class="mfp-container mfp-s-ready mfp-image-holder" style="background: rgba(0, 0, 0, 0.59); ">
              <div class="mfp-content" style="top: -20px;text-align: center;color: #000;padding: 35px 35px 20px 35px;background-color: #fff;border: 1px solid #000;box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);padding-left: 15px;padding-right: 15px;">

              <p><strong>'.$message.'</strong></p><br>
              <a href="'.esc_url($_SERVER['PHP_SELF']).'">
              <button class="basket-table__confirm-remove__remove button xs--one-whole">Ok</button>
              </a></div>
              </div>
              </div>
              ';
            }

            function error_message_with_link($message,$link){
              echo '
              <div class="mfp-wrap mfp-gallery mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow-x: hidden; overflow-y: auto;">
              <div class="mfp-container mfp-s-ready mfp-image-holder" style="background: rgba(0, 0, 0, 0.59); ">
              <div class="mfp-content" style="top: -20px;text-align: center;color: #000;padding: 35px 35px 20px 35px;background-color: #fff;border: 1px solid #000;box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);padding-left: 15px;padding-right: 15px;">

              <p><strong>'.$message.'</strong></p><br>
              <a href="'.$link.'">
              <button class="basket-table__confirm-remove__remove button xs--one-whole">Ok</button>
              </a></div>
              </div>
              </div>
              ';
            }

            function confirm_message($message,$ok_link,$no_link){
              echo '
              <div class="mfp-wrap mfp-gallery mfp-close-btn-in mfp-auto-cursor mfp-ready" tabindex="-1" style="overflow-x: hidden; overflow-y: auto;">
              <div class="mfp-container mfp-s-ready mfp-image-holder" style="background: rgba(0, 0, 0, 0.59); ">
              <div class="mfp-content" style="top: -20px;text-align: center;color: #000;padding: 35px 35px 20px 35px;background-color: #fff;border: 1px solid #000;box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);padding-left: 15px;padding-right: 15px;">
              <p><strong>'.$message.'</strong></p><br>
              <a href="'.$no_link.'">
              <button class="basket-table__confirm-remove__cancel button button--snd cancel xs--one-whole">No</button>
              </a>
              &nbsp;&nbsp;
              <a href="'.$ok_link.'">
              <button class="basket-table__confirm-remove__remove button xs--one-whole">Yes</button>
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


            connect_db();
            create_db();
            defult_values();

            $select_main_settings = @mysql_query("select * from main_settings");
            $main_settings = @mysql_fetch_assoc($select_main_settings);


?>