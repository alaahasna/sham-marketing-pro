    <?php
    if(isset($_GET['id']))
      $gid = safe_input(intval($_GET['id']));

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'no'){
      confirm_message("Delete This?","index.php?cpages=pages/view_admins&id=".$gid."&confirm=yes","index.php?cpages=pages/view_admins");
    }

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'yes'){
      $delete_team = @mysql_query("DELETE FROM admin WHERE id='".$gid."' and id!=1") or die(mysql_error());
      header("Location: index.php?cpages=pages/view_admins");
    }
    ?>
<!--1-->
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
        <a href="index.php?cpages=pages/add_new_admin" class="page-link">
            <i class="fa fa-plus"></i>
            <br />
                <a class="link-title" href="index.php?cpages=pages/add_new_admin">add new Admin</a>

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

<!--1-->
            <h3>View admins</h3>

            <table class="table" style="width: 80%;">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Edit / Delete</th>
            </tr>
            <?php
                $select_team = @mysql_query("select * from admin order by id desc");
                while($team = @mysql_fetch_assoc($select_team)){
                  echo '
                    <tr>
                        <td>'.$team['username'].'</td>
                        <td>'.$team['email'].'</td>
                        <td><a href="index.php?cpages=pages/edit_admin_by_id&id='.$team['id'].'"><input type="image" src="../images/icn_edit.png" title="Edit"></a>&nbsp;&nbsp;   / &nbsp;&nbsp;
                        <a href="index.php?cpages=pages/view_admins&id='.$team['id'].'&confirm=no"><input type="image" src="../images/icn_trash.png" title="delete"></a></td>     </td>
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