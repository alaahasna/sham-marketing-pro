<?php           // ترميز  &apos;
if(isset($_POST['save'])){
        // Text Box Values :
        $title1 = $_POST['title1'];
        $desc1 = $_POST['desc1'];
        $ar_title1 = $_POST['ar_title1'];
        $ar_desc1 = $_POST['ar_desc1'];
        $title2 = $_POST['title2'];
        $desc2 = $_POST['desc2'];
        $ar_title2 = $_POST['ar_title2'];
        $ar_desc2 = $_POST['ar_desc2'];
        $title3 = $_POST['title3'];
        $desc3 = $_POST['desc3'];
        $ar_title3 = $_POST['ar_title3'];
        $ar_desc3 = $_POST['ar_desc3'];

        $folder = "../images/";

              $fname1 = &$_FILES['pic1']['name'];
              $fname2 = &$_FILES['pic2']['name'];
              $fname3 = &$_FILES['pic3']['name'];

              // For File 1
              if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "services1_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic1']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                 $add_file_1 = @mysql_query("update services set pic1='$newfilename1'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/services"));
                }
              }

              // For File 2
              if(!empty($fname2)){
                $file_ext2 = pathinfo($fname2, PATHINFO_EXTENSION);
                $newfilename2 = "services2_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext2;
                $ftmp2 = &$_FILES['pic2']['tmp_name'];
                if(move_uploaded_file($ftmp2,$folder.$newfilename2)){
                 $add_file_2 = @mysql_query("update services set pic2='$newfilename2'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/services"));
                }
              }

              // For File 3
              if(!empty($fname3)){
                $file_ext3 = pathinfo($fname3, PATHINFO_EXTENSION);
                $newfilename3 = "services3_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext3;
                $ftmp3 = &$_FILES['pic3']['tmp_name'];
                if(move_uploaded_file($ftmp3,$folder.$newfilename3)){
                 $add_file_3 = @mysql_query("update services set pic3='$newfilename3'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/services"));
                }
              }


        $update_main_settings = @mysql_query("update services set
        title1='$title1',
        description1='$desc1',
        ar_title1='$ar_title1',
        ar_description1='$ar_desc1',
        title2='$title2',
        description2='$desc2',
        ar_title2='$ar_title2',
        ar_description2='$ar_desc2',
        title3='$title3',
        description3='$desc3',
        ar_title3='$ar_title3',
        ar_description3='$ar_desc3'
        ") or die(mysql_error());

        header("Location: index.php?cpages=pages/services");
}

$select_services = @mysql_query("select * from services") or die(mysql_error());
$services = @mysql_fetch_assoc($select_services);
?><!--1-->
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Edit Services</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/services" method="post" enctype="multipart/form-data">
            <tr>
                <td colspan="2" align="center"><img src="../images/<?php echo $services['pic1'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic1" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title1</td>
                <td><input type="text" name="title1" class="form-control" value="<?php echo $services['title1'];?>" /></td>
            </tr>
            <tr>
                <td>English Description1</td>
                <td><textarea name="desc1"><?php echo $services['description1'];?></textarea></td>
            </tr>
            <tr>
                <td>Arabic Title1</td>
                <td><input type="text" name="ar_title1" class="form-control" value="<?php echo $services['ar_title1'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Description1</td>
                <td><textarea name="ar_desc1"><?php echo $services['ar_description1'];?></textarea></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><img src="../images/<?php echo $services['pic2'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic2" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title2</td>
                <td><input type="text" name="title2" class="form-control" value="<?php echo $services['title2'];?>" /></td>
            </tr>
            <tr>
                <td>English Description2</td>
                <td><textarea name="desc2"><?php echo $services['description2'];?></textarea></td>
            </tr>
            <tr>
                <td>Arabic Title2</td>
                <td><input type="text" name="ar_title2" class="form-control" value="<?php echo $services['ar_title2'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Description2</td>
                <td><textarea name="ar_desc2"><?php echo $services['ar_description2'];?></textarea></td>
            </tr>

            <tr style="display: none;">
                <td colspan="2" align="center"><img src="../images/<?php echo $services['pic3'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic3" class="form-control" /></td>
            </tr>
            <tr style="display: none;">
                <td>English Title3</td>
                <td><input type="text" name="title3" class="form-control" value="<?php echo $services['title3'];?>" /></td>
            </tr>
            <tr style="display: none;">
                <td>English Description3</td>
                <td><textarea name="desc3"><?php echo $services['description3'];?></textarea></td>
            </tr>
            <tr style="display: none;">
                <td>Arabic Title3</td>
                <td><input type="text" name="ar_title3" class="form-control" value="<?php echo $services['ar_title3'];?>" /></td>
            </tr>
            <tr style="display: none;">
                <td>Arabic Description3</td>
                <td><textarea name="ar_desc3"><?php echo $services['ar_description3'];?></textarea></td>
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