    <?php

    if(isset($_GET['id']))
    $gid = safe_input(intval($_GET['id']));

    $select_team = @mysql_query("select * from admin where id='".$gid."'") or die(mysql_error());
    $team = @mysql_fetch_assoc($select_team);
    if(isset($_POST['save'])){
        // Text Box Values :
        $username = $_POST['username'];
        $email = strtolower($_POST['email']);
        $password = $_POST['password'];
        $md5password = md5($_POST['password']);
        $select_username = @mysql_query("select * from admin where email='".$email."' and id!='".$gid."'") or die(mysql_error());
        $num_username = @mysql_num_rows($select_username);

              if($num_username == 0){
                $update_admin = @mysql_query("update admin set email='$email',username='$username' where id='".$gid."'") or die(mysql_error());
              }
        else{
        $update_team = @mysql_query("update admin set
        username='$username'
        where id='".$gid."'") or die(mysql_error());

        }

        if(!empty($_POST['password']) and $_POST['password'] != "ppp"){
         $update_password = @mysql_query("update admin set
        password='$md5password'
        where id='".$gid."'") or die(mysql_error());
        }
        header("Location: index.php?cpages=pages/edit_admin_by_id&id=".$gid."");
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
            <h3>Edit admin</h3>
            <table class="table">
            <form action="index.php?cpages=pages/edit_admin_by_id&id=<?php echo $gid;?>" method="post"enctype="multipart/form-data">

               <tr>
                <td>UserName</td>
                <td><input type="text" name="username" class="form-control" value="<?php echo $team['username'];?>" required="required" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" class="form-control" value="<?php echo $team['email'];?>" required="required" /></td>
            </tr>
             <tr>
                <td>Password</td>
                <td><input type="password" name="password" class="form-control" value="ppp" autocomplete="off" /></td>
            </tr>

                <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="save" value="Save" class="btn btn-success" /></td>
            </tr>
            </form>
            </table>
           </section>
</section>