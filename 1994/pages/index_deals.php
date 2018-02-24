<?php           // ترميز  &apos;
if(isset($_POST['save'])){
        // Text Box Values :
        $title1 = $_POST['title1'];
        $ar_title1 = $_POST['ar_title1'];
        $link1 = $_POST['link1'];
        $title2 = $_POST['title2'];
        $ar_title2 = $_POST['ar_title2'];
        $link2 = $_POST['link2'];
        $title3 = $_POST['title3'];
        $ar_title3 = $_POST['ar_title3'];
        $link3 = $_POST['link3'];
        $title4 = $_POST['title4'];
        $ar_title4 = $_POST['ar_title4'];
        $link4 = $_POST['link4'];
        $folder = "../images/";

              $fname1 = &$_FILES['pic1']['name'];
              $fname2 = &$_FILES['pic2']['name'];
              $fname3 = &$_FILES['pic3']['name'];
              $fname4 = &$_FILES['pic4']['name'];
              // For File 1
              if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "index_deals_1_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic1']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                 $add_file_1 = @mysql_query("update index_deals set pic1='$newfilename1'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/index_deals"));
                }
              }

              // For File 2
              if(!empty($fname2)){
                $file_ext2 = pathinfo($fname2, PATHINFO_EXTENSION);
                $newfilename2 = "index_deals_2_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext2;
                $ftmp2 = &$_FILES['pic2']['tmp_name'];
                if(move_uploaded_file($ftmp2,$folder.$newfilename2)){
                 $add_file_2 = @mysql_query("update index_deals set pic2='$newfilename2'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/index_deals"));
                }
              }

              // For File 3
              if(!empty($fname3)){
                $file_ext3 = pathinfo($fname3, PATHINFO_EXTENSION);
                $newfilename3 = "index_deals_3_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext3;
                $ftmp3 = &$_FILES['pic3']['tmp_name'];
                if(move_uploaded_file($ftmp3,$folder.$newfilename3)){
                 $add_file_3 = @mysql_query("update index_deals set pic3='$newfilename3'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/index_deals"));
                }
              }

              // For File 4
              if(!empty($fname4)){
                $file_ext4 = pathinfo($fname4, PATHINFO_EXTENSION);
                $newfilename4 = "index_deals_4_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext4;
                $ftmp4 = &$_FILES['pic4']['tmp_name'];
                if(move_uploaded_file($ftmp4,$folder.$newfilename4)){
                 $add_file_4 = @mysql_query("update index_deals set pic4='$newfilename4'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/index_deals"));
                }
              }

        $update_main_settings = @mysql_query("update index_deals set
        title1='$title1',
        ar_title1='$ar_title1',
        link1='$link1',
        title2='$title2',
        ar_title2='$ar_title2',
        link2='$link2',
        title3='$title3',
        ar_title3='$ar_title3',
        link3='$link3',
        title4='$title4',
        ar_title4='$ar_title4',
        link4='$link4'
        ") or die(mysql_error());

        header("Location: index.php?cpages=pages/index_deals");
}

$select_index_deals = @mysql_query("select * from index_deals") or die(mysql_error());
$index_deals = @mysql_fetch_assoc($select_index_deals);
?><!--1-->
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Edit Index deals</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/index_deals" method="post" enctype="multipart/form-data">
            <tr>
                <td colspan="2" align="center"> Picture 1 <br /><img src="../images/<?php echo $index_deals['pic1'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic1" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title1</td>
                <td><input type="text" name="title1" class="form-control" value="<?php echo $index_deals['title1'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Title1</td>
                <td><input type="text" name="ar_title1" class="form-control" value="<?php echo $index_deals['ar_title1'];?>" /></td>
            </tr>
            <tr>
                <td>Link 1</td>
                <td><input type="text" name="link1" class="form-control" value="<?php echo $index_deals['link1'];?>" /></td>
            </tr>

            <tr>
                <td colspan="2" align="center"> Picture 2 <br /><img src="../images/<?php echo $index_deals['pic2'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic2" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title2</td>
                <td><input type="text" name="title2" class="form-control" value="<?php echo $index_deals['title2'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Title2</td>
                <td><input type="text" name="ar_title2" class="form-control" value="<?php echo $index_deals['ar_title2'];?>" /></td>
            </tr>
            <tr>
                <td>Link 2</td>
                <td><input type="text" name="link2" class="form-control" value="<?php echo $index_deals['link2'];?>" /></td>
            </tr>

            <tr>
                <td colspan="2" align="center"> Picture 3 <br /><img src="../images/<?php echo $index_deals['pic3'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic3" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title3</td>
                <td><input type="text" name="title3" class="form-control" value="<?php echo $index_deals['title3'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Title3</td>
                <td><input type="text" name="ar_title3" class="form-control" value="<?php echo $index_deals['ar_title3'];?>" /></td>
            </tr>
            <tr>
                <td>Link 3</td>
                <td><input type="text" name="link3" class="form-control" value="<?php echo $index_deals['link3'];?>" /></td>
            </tr>

            <tr>
                <td colspan="2" align="center"> Picture 4 <br /><img src="../images/<?php echo $index_deals['pic4'];?>" width="300px" alt="" /><br /><br />
                <input type="file" name="pic4" class="form-control" /></td>
            </tr>
            <tr>
                <td>English Title4</td>
                <td><input type="text" name="title4" class="form-control" value="<?php echo $index_deals['title4'];?>" /></td>
            </tr>
            <tr>
                <td>Arabic Title4</td>
                <td><input type="text" name="ar_title4" class="form-control" value="<?php echo $index_deals['ar_title4'];?>" /></td>
            </tr>
            <tr>
                <td>Link 4</td>
                <td><input type="text" name="link4" class="form-control" value="<?php echo $index_deals['link4'];?>" /></td>
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