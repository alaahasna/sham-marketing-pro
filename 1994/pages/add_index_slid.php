<?php           // ترميز  &apos;
if(isset($_POST['add'])){
        // Text Box Values :
        $folder = "../images/";
        $fname1 = &$_FILES['pic']['name'];
        $title = safe_input($_POST['title']);
        $description = safe_input($_POST['description']);
        $ar_title = safe_input($_POST['ar_title']);
        $ar_description = safe_input($_POST['ar_description']);
        if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "index_slid_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                    ///////
                }else{
                  $newfilename1 = "";
                }
              }
              $add_file_1 = @mysql_query("insert into index_slid (pic,title,description,ar_title,ar_description) values ('".$newfilename1."','".$title."','".$description."','".$ar_title."','".$ar_description."')") or die(mysql_error());

         error_message_with_link("Done.","index.php?cpages=pages/add_index_slid");
}

?><!--1-->
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
            <h3>Add index slider</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/add_index_slid" method="post" enctype="multipart/form-data">

            <tr>
                <td>Picture</td>
                <td><input type="file" name="pic" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title</td>
                <td><input type="text" name="title" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Arabic Title </td>
                <td><input type="text" name="ar_title" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>English Description </td>
                <td><input type="text" name="description" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Arabic Description</td>
                <td><input type="text" name="ar_description" class="form-control" value="" /></td>
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