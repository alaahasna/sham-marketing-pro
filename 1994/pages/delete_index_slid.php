             <?php
    if(isset($_GET['id']))
      $gid = safe_input(intval($_GET['id']));

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'no'){
      confirm_message("Delete This?","index.php?cpages=pages/delete_index_slid&id=".$gid."&confirm=yes","index.php?cpages=pages/delete_index_slid");
    }

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'yes'){
      $delete_team = @mysql_query("DELETE FROM index_slid WHERE id='".$gid."'") or die(mysql_error());
      header("Location: index.php?cpages=pages/delete_index_slid");
    }
    ?>
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/add_index_slid"><i class="fa fa-plus"></i>
    <br />
        Add Index Slider</a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/edit_index_slid"><i class="fa fa-edit"></i>
    <br />
        Edit Index Slider</a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/delete_index_slid"><i class="fa fa-times"></i>
    <br />
       Delete Index Slider</a>
    </div>
</div>
    <section id="main-content">
          <section class="wrapper site-min-height">
            <h3>Delete Index Slider</h3>
            <table class="table">
                <tr>
                    <th>Picture</th>
                    <th>Delete</th>
                </tr>
                <?php
                $select_team = @mysql_query("select * from index_slid order by id desc");
                while($team = @mysql_fetch_assoc($select_team)){
                  echo '
                    <tr>
                        <td><img src="../images/'.$team['pic'].'" width="40px" alt="" /></td>
                        <td><a href="index.php?cpages=pages/delete_index_slid&id='.$team['id'].'&confirm=no"><input type="image" src="../images/icn_trash.png" title="Delete"></a></td>
                    </tr>
                  ';
                }
                ?>

            </table>
              </section>
</section>