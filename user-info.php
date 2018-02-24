<?php
ob_start();
session_start();
include "lib/main.php";

if(!isset($_SESSION['US_id']) or !isset($_SESSION['US_test'])){
  header("Location: 404.php");
}else{
  $select_user_info = @mysql_query("select * from users where id='".$_SESSION['US_id']."'") or die(mysql_error());
  $user_info = @mysql_fetch_assoc($select_user_info);
  $num_users = @mysql_num_rows($select_user_info);

  if($num_users == 0){
    header("Location: 404.php");
  }

  //Test session
  if($_SESSION['US_test'] != md5($user_info['id']."_".$user_info['email'])){
    header("Location: logout.php");
  }

  //Update info
  if(isset($_POST['update'])){
  $first_name = safe_input($_POST['first_name']);
  $last_name = safe_input($_POST['last_name']);
  $password = safe_input($_POST['password']);
  $new_password = md5(safe_input($_POST['password']));
  $email = safe_input($_POST['email']);
  $phone = safe_input($_POST['phone']);
  $address = safe_input($_POST['address']);

  if(!empty($first_name)){
  if(!empty($last_name)){
  if(!empty($email)){
  if(!empty($phone)){
  if(!empty($address)){
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $select_emails = @mysql_query("select email from users where email='".$email."' and id!='".$_SESSION['US_id']."'") or die(mysql_error());
    $num_emails = @mysql_num_rows($select_emails);
    if($num_emails == 0){
      $update_info = @mysql_query("update users set
      first_name='$first_name',
      last_name='$last_name',
      email='$email',
      phone='$phone',
      address='$address'
      where id='".$_SESSION['US_id']."'") or die(mysql_error());

      if(!empty($password)){
      $update_password = @mysql_query("update users set
      password='$new_password'
      where id='".$_SESSION['US_id']."'") or die(mysql_error());
      }

      header("Location: user-info.php");
    }else{
      error_message("This Email is Exists!<br />Try in the other one.");
    }
  }else{
    error_message("Invalid Email!");
  }
  }else{
    error_message("Address is required!");
  }
  }else{
    error_message("Phone is required!");
  }
  }else{
    error_message("Email is required!");
  }
  }else{
    error_message("Last name is required!");
  }
  }else{
    error_message("First name is required!");
  }
  }


}
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | Profile</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/user-info.css">
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

      <section class="user-info">
        <div class="container">
          <div class="row">
            <form class="col s12" action="user-info.php" method="post">
              <div class="row center-align">
                <i class="material-icons profile-icon">person_pin</i>
                <h5>User Information</h5>
              </div>
              <div class="row">
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="first_name" name="first_name" value="<?php echo $user_info['first_name'];?>" type="text" class="validate">
                  <label for="first_name">First Name</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="last_name" name="last_name" value="<?php echo $user_info['last_name'];?>" type="text" class="validate">
                  <label for="last_name">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col l6 m6 s12">
                   <i class="material-icons prefix">lock_outline</i>
                  <input id="password" name="password" type="password" class="validate">
                  <label for="password">Password</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">email</i>
                  <input id="email" name="email" type="email" value="<?php echo $user_info['email'];?>" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">phone</i>
                  <input id="phone" name="phone" type="text" value="<?php echo $user_info['phone'];?>" class="validate">
                  <label for="phone">Phone Number</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <i class="material-icons prefix">location_on</i>
                  <input id="location" name="address" type="text" value="<?php echo $user_info['address'];?>" class="validate">
                  <label for="location">Address</label>
                </div>
              </div>
                <div class="input-field col s12 center-align">
                  <input type="submit" name="update" value="Edit" class="submit-button validate btn btn-float">
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