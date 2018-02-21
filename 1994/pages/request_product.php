<?php
    if(isset($_GET['id']))
      $gid = safe_input(intval($_GET['id']));

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'no'){
      confirm_message("Delete This?","index.php?cpages=pages/request_product&id=".$gid."&confirm=yes","index.php?cpages=pages/request_product");
    }

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'yes'){
      $delete_team = @mysql_query("DELETE FROM request_product WHERE id='".$gid."'") or die(mysql_error());
      header("Location: index.php?cpages=pages/request_product");
    }

    if(isset($_GET['approval']) and $_GET['approval'] == 'yes'){

      $approve_this_product = @mysql_query("update request_product set ok_from_admin='Yes' where id='".$gid."'") or die(mysql_error());

      if(isset($approve_this_product)){
      header("Location: index.php?cpages=pages/request_product");
      }
    }
    ?>
<!--1-->

      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Products Requests</h3>

            <input id="searchUser" class="search-content" type="search" placeholder="Search by Request number" onkeyup="searchUser()">
            <table id="users-table" class="table" style="width: 80%;">
            <tr>
                <th>Request number</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>View | Agree | Delete</th>
            </tr>
            <?php
                $select_team = @mysql_query("select * from request_product order by id desc");
                while($team = @mysql_fetch_assoc($select_team)){
                $select_user_info = @mysql_query("select * from users where id='".$team['user_id']."'") or die(mysql_error());
                $user_info = @mysql_fetch_assoc($select_user_info);
                $request_number = $team['id'] + 10000;
                  echo '
                    <tr>
                        <td>'. $request_number.'</td>
                        <td>'.stripcslashes($user_info['first_name'] . " " .$user_info['last_name']).'</td>
                        <td>'.stripcslashes($user_info['address']).'</td>
                        <td>'.stripcslashes($user_info['phone']).'</td>
                        <td>'.stripcslashes($user_info['email']).'</td>
                        <td>
                        <a href="index.php?cpages=pages/view_request_product&session='.$team['session_id'].'"><input type="image" src="../images/icon3.png" title="View"></a>
                        ';
                        if($team['ok_from_admin'] != 'Yes'){
                          echo '  |
                        <a href="index.php?cpages=pages/request_product&id='.$team['id'].'&approval=yes"><input type="image" src="../images/icn_alert_success.png" title="Approve"></a>
                        ';
                        }
                        echo '
                        &nbsp; | &nbsp;
                        <a href="index.php?cpages=pages/request_product&id='.$team['id'].'&confirm=no"><input type="image" src="../images/icn_trash.png" title="Delete"></a>

                        </td>                   </tr>
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