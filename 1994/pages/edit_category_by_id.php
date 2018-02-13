<?php
if(isset($_GET['id'])){
  $gid = safe_input($_GET['id']);
}
$folder = "../images/";

              $fname1 = &$_FILES['pic']['name'];
              // For File 1
              if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "category_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                 $add_file_1 = @mysql_query("update category set pic='$newfilename1' where id='".$gid."'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/edit_category_by_id&id=".$gid.""));
                }
              }
$select_category = @mysql_query("select * from category where id='".$gid."'") or die(mysql_error());
$category = @mysql_fetch_assoc($select_category);


        if(isset($_POST['edit'])){
              $category_name = $_POST['category_name'];
              $ar_category_name = $_POST['ar_category_name'];
              $view_in_index_in_part = $_POST['view_in_index_in_part'];

              $update_category = @mysql_query("update category set
        category_name='$category_name',
        ar_category_name='$ar_category_name',
        view_in_index_in_part='$view_in_index_in_part'
        where id='".$gid."'") or die(mysql_error());
        }

        if(isset($update_category)){
    header("Location: index.php?cpages=pages/edit_category_by_id&id=".$gid."");
  }
?>
<!--1-->
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/add_category"><i class="fa fa-plus"></i>
    <br />
        Add Category</a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/edit_category"><i class="fa fa-edit"></i>
    <br />
        Edit | Delete Category</a>
    </div>
</div>
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Edit Category</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/edit_category_by_id&id=<?php echo $gid;?>" method="post" enctype="multipart/form-data">
            <tr>
                    <td colspan="2" align="center"><img src="../images/<?php echo $category['pic'];?>" width="300px" alt="" /><br /><br />
                   <input type="file" name="pic" class="form-control" /></td>
                </tr>
            <tr>
                <th>Category title in English</th>
                <td><input type="text" name="category_name" required="required" value="<?php echo $category['category_name'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <th>Category title in Arabic</th>
                <td><input type="text" name="ar_category_name" required="required" value="<?php echo $category['ar_category_name'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td>View in index in part</td>
                <td><select name="view_in_index_in_part" required="required" class="form-control">
                <option value="<?php echo $category['view_in_index_in_part'];?>" selected="selected"><?php echo $category['view_in_index_in_part'];?></option>
                <option value="No">No</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                </select></td>
            </tr>
            <tr>
                    <td colspan="2" align="center"><input type="submit" class="btn btn-success" name="edit" value="Edit" /></td>
                </tr>
                </form>
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