<?php
ob_start();
session_start();
include "lib/main.php";
function login($email,$password){
            $email = safe_input($email);
            $password = safe_input(md5($password));

              if(!empty($email)){
                if(!empty($password)){
                  $find_user = @mysql_query("SELECT * FROM users WHERE email='".$email."'") or die(mysql_error());
                  if (@mysql_num_rows($find_user) == 1){
                    $user = @mysql_fetch_assoc($find_user);

                     $uemail = stripslashes($user['email']);
                     $upass = stripslashes($user['password']);
                     $uid = stripslashes($user['id']);
                     if($email == $uemail){
                       if($password != $upass){
                       echo "Error in password!";
                     }else{
                           $_SESSION['US_id'] = $user['id'];
                           $_SESSION['US_test'] = md5($user['id']."_".$uemail);
                           echo "done";
                       }
                     }else{
                      echo "Error in Email!";
                     }
                     }else{
                       echo "No users in this Email!";
                     }

                }else{
                 echo "Password is empty!";
                }
              }else{
               echo "Email is empty!";
              }


          }


    login($_GET['username'],$_GET['password']);

?>