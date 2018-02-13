<?php
if(isset($_GET['id'])){
  $gid = safe_input($_GET['id']);
}

$select_user = @mysql_query("select * from users where id='".$gid."'") or die(mysql_error());
$user = @mysql_fetch_assoc($select_user);

if(isset($_POST['edit'])){
  $first_name = safe_input($_POST['first_name']);
  $last_name = safe_input($_POST['last_name']);
  $email = safe_input($_POST['email']);
  $phone = safe_input($_POST['phone']);
  $address = safe_input($_POST['address']);

  $update_user = @mysql_query("update users set
  first_name='$first_name',
  last_name='$last_name',
  email='$email',
  phone='$phone',
  address='$address'
  where id='".$gid."'") or die(mysql_error());

  if(isset($update_user)){
    header("Location: index.php?cpages=pages/edit_user&id=".$gid."");
  }
}
?>
<!--1-->
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Edit User</h3>
            <form action="index.php?cpages=pages/edit_user&id=<?php echo $gid;?>" method="post">
            <table class="table" style="width: 80%;">
            <tr>
                <th>Register date</th>
                <td><?php echo $user['register_date'];?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input type="text" name="first_name" value="<?php echo $user['first_name'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text" name="last_name" value="<?php echo $user['last_name'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" value="<?php echo $user['email'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><input type="text" name="phone" value="<?php echo $user['phone'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input type="text" name="address" value="<?php echo $user['address'];?>" class="form-control" /></td>
            </tr>
           <!-- <tr>
                <th>subscribe</th>
                <td><select name="subscribed" class="form-control" id="">
                <?php
                if($user['subscribed'] == 'yes'){
                echo '
                <option value="yes" selected="selected">yes</option>
                <option value="no">no</option>
                ';
                }else{
                echo '
                <option value="yes">yes</option>
                <option value="no" selected="selected">no</option>
                ';
                }
                ?>
                </select></td>  -->
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="edit" value="Edit" /></td>
                </tr>

            </table>
            </form>
<!--1
<div class="showback">
      					<h4><i class="fa fa-angle-right"></i> Alerts Examples</h4>
							<div class="alert alert-success"><b>Well done!</b> You successfully read this important alert message.</div>
							<div class="alert alert-info"><b>Heads up!</b> This alert needs your attention, but it's not super important.</div>
							<div class="alert alert-warning"><b>Warning!</b> Better check yourself, you're not looking too good.</div>
							<div class="alert alert-danger"><b>Oh snap!</b> Change a few things up and try submitting again.</div>
      				</div>
<!-- sidebar menu end-->
</section>
</section>