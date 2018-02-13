<?php              // ترميز  &apos;
    if(isset($_GET['id']))
      $gid = safe_input(intval($_GET['id']));

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'no'){
      confirm_message("Delete This User?","index.php?cpages=pages/users&id=".$gid."&confirm=yes","index.php?cpages=pages/users");
    }

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'yes'){
      $delete_users = @mysql_query("DELETE FROM users WHERE id='".$gid."'") or die(mysql_error());
      header("Location: index.php?cpages=pages/users");
    }
    $select_users = @mysql_query("select * from users") or die(mysql_error());
    $num_users = @mysql_num_rows($select_users);
    ?>
    <!--1-->
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Users ( <?php echo $num_users;?> )</h3>
            <input id="searchUser" class="search-content" type="search" placeholder="Search users by name" onkeyup="searchUser()">
            <table id="users-table" class="table" style="width: 80%;">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Register date</th>
                <th>View - Edit - Delete</th>
            </tr>
            <?php

            while($users = @mysql_fetch_assoc($select_users)){
              echo '
              <tr>
                <td>'.$users['first_name'].' '.$users['last_name'].'</td>
                <td>'.$users['email'].'</td>
                <td>'.$users['phone'].'</td>
                <td>'.$users['address'].'</td>
                <td>'.$users['register_date'].'</td>
                <td>
                <a href="index.php?cpages=pages/view_user&id='.$users['id'].'"><input type="image" src="../images/icon3.png" title="View"></a> &nbsp;&nbsp;
                <a href="index.php?cpages=pages/edit_user&id='.$users['id'].'"><input type="image" src="../images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;
                <a href="index.php?cpages=pages/users&id='.$users['id'].'&confirm=no"><input type="image" src="../images/icn_trash.png" title="Delete"></a> &nbsp;&nbsp;

                </td>
              </tr>
              ';
            }
            ?>
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