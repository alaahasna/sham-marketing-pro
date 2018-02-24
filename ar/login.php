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
                       echo "خطأ بكلمة المرور!";
                     }else{
                           $_SESSION['US_id'] = $user['id'];
                           $_SESSION['US_test'] = md5($user['id']."_".$uemail);
                           echo "done";
                       }
                     }else{
                      echo "خطأ بالبريد الإلكتروني!";
                     }
                     }else{
                       echo "لا يوجد مستخدمين بنفس هذا البريد الإلكتروني!";
                     }

                }else{
                 echo "كلمة المرور فارغة!";
                }
              }else{
               echo "البريد الإلكتروني فارغ!";
              }


          }


    login($_GET['username'],$_GET['password']);

?>