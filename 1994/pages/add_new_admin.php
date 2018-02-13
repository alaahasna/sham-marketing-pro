    <?php

    if(isset($_POST['add'])){
        // Text Box Values :
        $email = safe_input(strtolower($_POST['email']));
        $user_name = safe_input($_POST['user_name']);
        $password = safe_input($_POST['password']);
        $re_password = safe_input($_POST['re_password']);
        $encripted_password = md5(safe_input($_POST['password']));


        if(!empty($user_name) and !empty($password)){
          if($password == $re_password){
            $select_admins = @mysql_query("select * from admin where email='".$email."'") or die(mysql_error());
            $num_admins = @mysql_num_rows($select_admins);
            if($num_admins == 0){
        $add_new_admin = @mysql_query("insert into admin (email,username,password) values ('".$email."','".$user_name."','".$encripted_password."')") or die(mysql_error());

        error_message_with_link("done.","index.php?cpages=pages/add_new_admin");
        }else{
         error_message_with_link("This email is exists!","index.php?cpages=pages/add_new_admin");
        }
    }else {
      error_message_with_link("error in re password!","index.php?cpages=pages/add_new_admin");
    }
    }else {
      error_message_with_link("empty fields!","index.php?cpages=pages/add_new_admin");
    }
    }
    ?>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
        <a href="index.php?cpages=pages/add_new_admin" class="page-link">
            <i class="fa fa-plus"></i>
            <br />
                <a class="link-title" href="index.php?cpages=pages/add_new_admin">Add new Admin</a>

        </a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
        <a href="index.php?cpages=pages/edit_admin_password" class="page-link">
            <i class="fa fa-pencil"></i>
            <br />
            <a class="link-title" href="index.php?cpages=pages/edit_admin_password">Edit Password</a>
        </a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
        <a href="index.php?cpages=pages/view_admins" class="page-link">
            <i class="fa fa-eye"></i>
            <br />
            <a class="link-title" href="index.php?cpages=pages/view_admins">View admins</a>
        </a>
    </div>
</div>
    <section id="main-content">
          <section class="wrapper site-min-height">
            <h3>Add new admin</h3>

            <form action="index.php?cpages=pages/add_new_admin" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td style="width: 25%;">Email</td>
                    <td><input type="email" name="email" required="required" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">User name</td>
                    <td><input type="text" name="user_name" required="required" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Password</td>
                    <td><input type="password" name="password" required="required" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Re password</td>
                    <td><input type="password" name="re_password" required="required" class="form-control" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="add" value="Add" /></td>
                </tr>
            </table>
            </form>
            </section>
</section>