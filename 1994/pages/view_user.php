<?php
if(isset($_GET['id'])){
  $gid = safe_input($_GET['id']);
}

$select_user = @mysql_query("select * from users where id='".$gid."'") or die(mysql_error());
$user = @mysql_fetch_assoc($select_user);
?>
<!--1-->
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>View User</h3>

            <table class="table" style="width: 80%;">
            <tr>
                <th>Registeration Data</th>
                <td><?php echo $user['register_date'];?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?php echo $user['first_name'];?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $user['last_name'];?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $user['email'];?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $user['phone'];?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $user['address'];?></td>
            </tr>
           <!-- <tr>
                <th>subscribe</th>
                <td><?php echo $user['subscribed'];?></td>
            </tr> -->
            </table>
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