<?php
ob_start();
session_start();
include "lib/main.php";
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo2.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['site_name'];?> | Contact us</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/contact.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <?php
if(isset($_POST['send'])){
  if(!empty($_POST['first_name'])){
  if(!empty($_POST['last_name'])){
  if(!empty($_POST['phone'])){
    if(!empty($_POST['email'])){
      if(!empty($_POST['message'])){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
         $name = safe_input($_POST['first_name']) ." ".safe_input($_POST['last_name']);
         $email = safe_input($_POST['email']);
         $phone = safe_input($_POST['phone']);
         $message1 = safe_input($_POST['message']);
         $to = $main_settings['site_mail'];
         $subject1 = $main_settings['site_name'];
         $message = "
         "."Name : ". $name."
         "."<br />Email : ". $email."
         "."<br />phone : ". $phone."
         "."<br />Message : <p style='white-space: pre-line;'>". $message1."</p>";
         if($sendmail = mail($to,$subject1,$message,'Content-type: text/html; charset=utf-8')){
             error_message('Message Sent.');
           }else{
             error_message("Error, Message does not sent!");
           }
      }else{
        error_message("Invalid Email!");
      }
      }else{
        error_message("Message is required!");
      }
    }else{
     error_message("Email is required!");
    }
    }else{
    error_message("Phone is required!");
  }
  }else{
    error_message("Last name is required!");
  }
  }else{
    error_message("First name is required!");
  }
}
?>
    <?php
        if(isset($_SESSION['US_id'])){
        nav_bar($_SESSION['US_id'],session_id());
        }else{
        nav_bar('with_out_session',session_id());
        }
      ?>

      <section class="contact">
        <div class="container">
          <div class="section-title center-align">
            <h1>Contact Us</h1>
          </div>
          <div class="row">
            <div class="col l3 hide-on-med-and-down">
              <div class="contact-message">
              <h4>Contact Us</h4>
              <p>We would be so glad to hear from you a message.</p>
              </div>
            </div>
            <div class="col l9 m12 s12">
              <div class="contact-form">
                <div class="row">
                  <form class="col s12" method="post" action="contact.php">
                    <div class="row">
                      <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="first_name" name="first_name" type="text" class="validate" required="required">
                        <label for="first_name">First Name</label>
                      </div>
                      <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="last_name" type="text" name="last_name" class="validate" required="required">
                        <label for="last_name">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email" name="email" class="validate" required="required">
                        <label for="email">Email</label>
                      </div>
                      <div class="input-field col l6 m6 s12">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone" type="text" name="phone" class="validate">
                        <label for="phone">Phone Number(optional)</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col l12">
                        <i class="material-icons prefix">message</i>
                        <textarea id="message" name="message" class="materialize-textarea"></textarea>
                        <label for="message">Type Your Message..</label>
                      </div>
                    </div>
                      <div class="input-field col s12 center-align">
                        <input type="submit" value="Send" name="send" class="submit-button validate btn btn-float">
                      </div>
                  </form>
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