<?php           // ترميز  &apos;
if(isset($_POST['add'])){
        // Text Box Values :
        $folder = "../images/";
        $fname1 = &$_FILES['pic']['name'];
        $category_name = $_POST['category_name'];
        $ar_category_name = $_POST['ar_category_name'];
        $view_in_index_in_part = $_POST['view_in_index_in_part'];

                 if(!empty($_POST['category_name'])){
                   if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "category_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                    ///////
                }else{
                  $newfilename1 = "";
                }
              }
              $update_view_in_index = @mysql_query("update category set view_in_index_in_part='No' where view_in_index_in_part='".$view_in_index_in_part."'") or die(mysql_error());

                 $add_cat_1 = @mysql_query("insert into category
                 (category_name,ar_category_name,view_in_index_in_part,pic)
                 values
                 ('".$category_name."','".$ar_category_name."','".$view_in_index_in_part."','".$newfilename1."')") or die(mysql_error());
                 }

         error_message_with_link("Done.","index.php?cpages=pages/add_category");
}

?><!--1-->
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
            <h3>Add Category</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/add_category" method="post" enctype="multipart/form-data">
            <tr>
                <td>Picture</td>
                <td><input type="file" name="pic" class="form-control" required="required" /></td>
            </tr>
            <tr>
                <td>Category title in English</td>
                <td><input type="text" name="category_name" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Category title in Arabic</td>
                <td><input type="text" name="ar_category_name" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>View in index in part</td>
                <td><select name="view_in_index_in_part" required="required" class="form-control">
                <option value="No" selected="selected">No</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                </select></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="add" value="Add" class="btn btn-success" /></td>
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