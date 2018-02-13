    <?php

    if(isset($_GET['id']))
    $gid = safe_input(intval($_GET['id']));

    $select_team = @mysql_query("select * from index_slid where id='".$gid."'") or die(mysql_error());
    $team = @mysql_fetch_assoc($select_team);

    if(isset($_POST['save'])){
        // Text Box Values :
        $title = safe_input($_POST['title']);
        $ar_title = safe_input($_POST['ar_title']);
        $description = safe_input($_POST['description']);
        $ar_description = safe_input($_POST['ar_description']);

        $update_team = @mysql_query("update index_slid set
        title='$title',
        ar_title='$ar_title',
        description='$description',
        ar_description='$ar_description'
        where id='".$gid."'") or die(mysql_error());

        //For ad_attachments :
              $folder = "../images/";

              $fname1 = &$_FILES['pic']['name'];

              // For File 1
              if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "Index_slider_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                 $add_file_1 = @mysql_query("update index_slid set pic='$newfilename1' where id='".$gid."'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/edit_index_slid_by_id&id=".$gid.""));
                }
              }
        header("Location: index.php?cpages=pages/edit_index_slid_by_id&id=".$gid."");

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
            <h3>Edit Index Slider</h3>
            <table class="table">
            <form action="index.php?cpages=pages/edit_index_slid_by_id&id=<?php echo $gid;?>" method="post"enctype="multipart/form-data">
                <tr>
                    <td colspan="2" align="center"><img src="../images/<?php echo $team['pic'];?>" width="300px" alt="" /><br /><br />
                   <input type="file" name="pic" class="form-control" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">English Title</td>
                    <td><input type="text" name="title" class="form-control" value="<?php echo stripcslashes($team['title']);?>" /></td>
                </tr>
                <tr>
                    <td style="width: 25%;">Arabic Title</td>
                    <td><input type="text" name="ar_title" class="form-control" value="<?php echo stripcslashes($team['ar_title']);?>" /></td>
                </tr>
                <tr>
                <td>English Description</td>
                <td><input type="text" name="description" class="form-control" value="<?php echo stripcslashes($team['description']);?>" /></td>
                </tr>
                <tr>
                <td>Arabic Description</td>
                <td><input type="text" name="ar_description" class="form-control" value="<?php echo stripcslashes($team['ar_description']);?>" /></td>
                </tr>
                <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="save" value="Save" class="btn btn-success" /></td>
            </tr>
            </form>
            </table>
           </section>
</section>