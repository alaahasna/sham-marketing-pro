
<?php
$select_admin_info = @mysql_query("select * from admin where id='".$_SESSION['I_id']."'") or die(mysql_error());
$info = @mysql_fetch_assoc($select_admin_info);

$old_password = $info['password'];

if(isset($_POST['new_password']))
$new_password = md5(safe_input($_POST['new_password']));

if(isset($_POST['save'])){

  if(md5($_POST['old_password']) == $old_password){

    if($_POST['new_password'] == $_POST['re_new_password']){

      $update_password = @mysql_query("update admin set password='".$new_password."' where id='".$info['id']."'") or die(mysql_error());

      if(isset($update_password)){

        error_message_with_link("Password Edited.","index.php?cpages=pages/edit_admin_password");
      }

    }else{
    error_message_with_link("Error in password!","index.php?cpages=pages/edit_admin_password");
    }

  }else{
    error_message_with_link("Error in old password!","index.php?cpages=pages/edit_admin_password");
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
		<h3 class="tabs_involved">&nbsp;Edit Password</h3>

            <form action="index.php?cpages=pages/edit_admin_password" method="post">
            <table class="table">
			<tbody>
            <tr>
            <td style="width: 25%;">Old password</td>
            <td><input type="password" name="old_password" required="required" class="form-control"></td>
            </tr>
            <tr>
            <td style="width: 25%;">New password</td>
            <td><input type="password" name="new_password" required="required" class="form-control"></td>
            </tr>
            <tr>
            <td style="width: 25%;">Re password</td>
            <td><input type="password" name="re_new_password" required="required" class="form-control"></td>
            </tr>
            <tr>
            <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="save" value="Edit" /></td>
            </tr>
			</tbody>
			</table>
            </form>
            </section>
</section>