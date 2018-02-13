<?php
ob_start();
session_start();
include "../lib/main.php";
            function login($email,$password){
            $email = safe_input(strtolower($email));
            $password = safe_input(md5($password));
              if(!empty($email)){
                if(!empty($password)){
                  $finduser = @mysql_query("SELECT id,email,password,username FROM admin WHERE email='".$email."'") or die(mysql_error());
                  if (@mysql_num_rows($finduser) == 1){
                    $user = @mysql_fetch_assoc($finduser);
                     $uname = stripslashes($user['username']);
                     $uemail = stripslashes(strtolower($user['email']));
                     $upass = stripslashes($user['password']);
                     $uid = stripslashes($user['id']);
                     if($email == $uemail){
                       if($password != $upass){
                       error_message("Error in password!");
                     }else{
                       $_SESSION['I_name'] = $uname;
                       $_SESSION['I_id'] = $uid;
                       $_SESSION['ben_permission'] = 'yes'; 
                       $_SESSION['I_test'] = md5($uid."_".$uname);
                       header("Location: index.php");
                       }
                     }else{
                      error_message("Error in email!");
                     }
                     }else{
                       error_message("No Admin!!!!");
                     }
                }else{
                 error_message("Password is Empty!");
                }
              }else{
               error_message("email is Empty!");
              }
          }
  if(isset($_SESSION['I_name']) and isset($_SESSION['I_id'])){
  header("Location: index.php?cpages=pages/main_settings");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Direct Group Corporation">
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/Logo.png" />
	<title>Control Panel - Login</title>
	<link rel="stylesheet" href="../cpanel_css/bootstrap.min.css">
	<link rel="stylesheet" href="../cpanel_css/font-awesome.min.css">
	<!-- styles for Site -->
	<link rel="stylesheet" href="../cpanel_css/bootstrap-theme.css" media="screen">
  <link rel="stylesheet" href="../cpanel_css/style.css">
  <link rel="stylesheet" href="../cpanel_css/login.css">


</head>
<body id="cp_body">
<?php
if(isset($_POST['login'])){
    login($_POST['email'],$_POST['password']);
}
?>
  <div class="container">
     <center>
       <div id="cp_login-form">
        <div class="login-logo">
         <img class="img-responsive" src="../imgs/logo.png" width="200">
         <br />
         <br />
         <br />
         <br />
         <br />
         <br />
        </div>
       <form action="login.php" method="post">
            <div id="cp_login-header" class="text-center">
           <!-- <b><span>control panel</span></b> -->
            </div>
            <div id="cp_login-container" class="form-group">
            <label for="email" style="float: left;">Email :</label> <br />
            <input type="email" name="email" class="form-control" /> <br />
            <label for="password" style="float: left;">Passowrd : </label> <br />
            <input type="password" name="password" class="form-control" /> <br /><br />

            <br />

            <input type="submit" name="login" value="Login" class="btn btn-success" />

            </div>
       </form>
       </div>
     </center>
  </div>
   <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
   <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush();?>