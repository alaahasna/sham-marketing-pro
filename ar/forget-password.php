<?php
ob_start();
session_start();
include "lib/main.php";

function send_password($email,$submit){
            $select_main_settings = @mysql_query("SELECT * FROM main_settings");
            $setting = @mysql_fetch_assoc($select_main_settings);
            $email = safe_input($email);
            if(isset($submit)){
              if(!empty($email)){
                $query = @mysql_query("SELECT email,password FROM users WHERE email='".$email."'") or die(mysql_error());
                $row = @mysql_fetch_assoc($query);
                if(@mysql_num_rows($query) == 1){
                  $text = rand(00000,99999);

                $your_new_password = $text;
                $your_password = md5($text);
                $update_new_password = mysql_query("UPDATE users SET password='$your_password' WHERE email='".$email."'") or die(mysql_error());
                $to = $email;
                $subject = $setting['site_name']." ....  Your Password";
                if(isset($your_password))
                $message = "Your new password is ( ".$your_new_password." )";
                 if($sendmail = mail($to,$subject,$message)){
                   error_message("تم إرسال كلمة المرور الجديدة إلى بريدك الإلكتروني.");
                   }else{
                   error_message("خطأ، لا يمكن إرسال الرسالة!");
                 }


                }else{
                  error_message("البريد الإلكتروني غير موجود!");
                }
              }else{
                 error_message("حقل البريد الإلكتروني مطلوب!");
              }
            }
          }

          if(isset($_POST['send'])){
            send_password($_POST['email'],$_POST['send']);
          }

?>
<!DOCTYPE html>
<html>
  <head>
      <link rel="shortcut icon" href="imgs/logo2.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['ar_site_name'];?> | نسيان كلمة المرور</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize-rtl.min.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/forget-password.css">
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

    <div class="forget-password rtl">
      <div class="container">
        <form action="forget-password.php" method="post">
          <div class="input-field">
            <input type="email" name="email" required="required" id="forget-password" class="forget-password-input">
            <label for="forget-password">أدخل البريد الإلكتروني هنا</label>
            <input type="submit" name="send" value="إرسال" class="btn btn-float submit-button">
          </div>
        </form>
      </div>
    </div>

    <?php footer();?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
  </body>
</html>
