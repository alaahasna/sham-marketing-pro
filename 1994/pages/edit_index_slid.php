<!--1-->
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

<!--1-->
            <h3>Edit Index Slider</h3>

            <table class="table" style="width: 80%;">
            <tr>
                <th>Picture</th>
                <th>Title</th>
                <th>Edit</th>
            </tr>
            <?php
                $select_team = @mysql_query("select * from index_slid order by id desc");
                while($team = @mysql_fetch_assoc($select_team)){
                  echo '
                    <tr>
                        <td><img src="../images/'.$team['pic'].'" width="40px" alt="" /></td>
                        <td>'.$team['title'].'</td>
                        <td><a href="index.php?cpages=pages/edit_index_slid_by_id&id='.$team['id'].'"><input type="image" src="../images/icn_edit.png" title="Edit"></a></td>
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