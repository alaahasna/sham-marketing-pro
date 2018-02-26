<?php
ob_start();
session_start();
include "lib/main.php";

if(isset($_POST['signup'])){
  $first_name = safe_input($_POST['first_name']);
  $last_name = safe_input($_POST['last_name']);
  $password = safe_input($_POST['password']);
  $new_password = md5(safe_input($_POST['password']));
  $email = safe_input($_POST['email']);
  $phone = safe_input($_POST['phone']);
  $address = safe_input($_POST['address']);

  if(!empty($first_name)){
  if(!empty($last_name)){
  if(!empty($password)){
  if(!empty($email)){
  if(!empty($phone)){
  if(!empty($address)){
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $select_emails = @mysql_query("select email from users where email='".$email."'") or die(mysql_error());
    $num_emails = @mysql_num_rows($select_emails);
    if($num_emails == 0){

    $add_user = @mysql_query("insert into users
    (first_name,last_name,password,address,email,phone,register_date,register_by,social_media_id)
    values
    ('".$first_name."','".$last_name."','".$new_password."','".$address."','".$email."','".$phone."',NOW(),'Site','0')
    ") or die(mysql_error());

    mail($email,$main_settings['site_name'],"شكراً لك للتسجيل في  ".$main_settings['ar_site_name'],'Content-type: text/html; charset=utf-8');

    //Login after sign up
    $select_user_id = @mysql_query("select id from users where email='".$email."'") or die(mysql_error());
    $user_id = @mysql_fetch_assoc($select_user_id);
    $_SESSION['US_id'] = $user_id['id'];
    $_SESSION['US_test'] = md5($user_id['id']."_".$email);
    header("Location: index.php");
    }else{
      error_message("هذا البريد الإلكتروني موجود! حاول ببريد آخر.");
    }
  }else{
    error_message("البريد الإلكتروني غير صالح!");
  }
  }else{
    error_message("حقل العنوان مطلوب!");
  }
  }else{
    error_message("حقل الهاتف مطلوب!");
  }
  }else{
    error_message("حقل البريد الإلكتروني مطلوب!");
  }
  }else{
    error_message("كلمة المرور مطلوبة!");
  }
  }else{
    error_message("حقل الإسم الأخير مطلوب!");
  }
  }else{
    error_message("حقل الإسم الأول مطلوب!");
  }
}
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo2.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['ar_site_name'];?> | تسجيل حساب جديد</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize-rtl.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/register.css">
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

      <section class="register rtl">
        <div class="container">
          <div class="row">
            <form class="col s12" method="post" action="register.php">
              <div class="row center-align">
                <h3>تسجيل حساب جديد</h3>
              </div>
              <div class="row">
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="first_name" name="first_name" type="text" required="required" class="validate">
                  <label for="first_name">الإسم الأول</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="last_name" name="last_name" type="text" required="required" class="validate">
                  <label for="last_name">الإسم الأخير</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col l6 m6 s12">
                   <i class="material-icons prefix">lock_outline</i>
                  <input id="password" name="password" type="password" required="required" class="validate">
                  <label for="password">كلمة المرور</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">email</i>
                  <input id="email" name="email" type="email" required="required" class="validate">
                  <label for="email">البريد الإلكتروني</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">phone</i>
                  <input id="phone" name="phone" type="text" required="required" class="validate">
                  <label for="phone">الهاتف</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">location_on</i>
                  <input id="location" name="address" type="text" required="required" class="validate">
                  <label for="location">العنوان</label>
                </div>
              </div>
                <div class="input-field col s12 center-align">
                  <input type="submit" value="تسجيل" name="signup" class="submit-button validate btn btn-float">
                </div>
            </form>
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
