<?php           // ترميز  &apos;
if(isset($_POST['save'])){
        // Text Box Values :
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $ar_title = $_POST['ar_title'];
        $ar_desc = $_POST['ar_desc'];
        $folder = "../images/";

              $fname1 = &$_FILES['pic']['name'];
              $fname2 = &$_FILES['pic2']['name'];
              // For File 1
              if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "pc_about_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                 $add_file_1 = @mysql_query("update about set pic='$newfilename1'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/about"));
                }
              }

              // For File 2
              if(!empty($fname2)){
                $file_ext2 = pathinfo($fname2, PATHINFO_EXTENSION);
                $newfilename2 = "mobile_about_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext2;
                $ftmp2 = &$_FILES['pic2']['tmp_name'];
                if(move_uploaded_file($ftmp2,$folder.$newfilename2)){
                 $add_file_2 = @mysql_query("update about set pic2='$newfilename2'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/about"));
                }
              }

        $update_main_settings = @mysql_query("update about set
        title='$title',
        description='$desc',
        ar_title='$ar_title',
        ar_description='$ar_desc'
        ") or die(mysql_error());

        header("Location: index.php?cpages=pages/about");
}

$select_about = @mysql_query("select * from about") or die(mysql_error());
$about = @mysql_fetch_assoc($select_about);
?><!--1-->
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Edit About us</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/about" method="post" enctype="multipart/form-data">
            <tr>
                <td colspan="2" align="center">Computer Picture <br /><img src="../images/<?php echo $about['pic'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic" class="form-control" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">Mobile Picture <br /><img src="../images/<?php echo $about['pic2'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic2" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title1</td>
                <td><input type="text" name="title" class="form-control" value="<?php echo $about['title'];?>" /></td>
            </tr>
            <tr>
                <td>English Description1</td>
                <td><textarea name="desc"><?php echo $about['description'];?></textarea></td>
            </tr>
            <tr>
                <td>Arabic Title1</td>
                <td><input type="text" name="ar_title" class="form-control" value="<?php echo $about['ar_title'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Description1</td>
                <td><textarea name="ar_desc"><?php echo $about['ar_description'];?></textarea></td>
            </tr>

            <tr>
                <td style="text-align: center;" colspan="2"><input type="submit" name="save" value="Save" class="btn btn-success" /></td>
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