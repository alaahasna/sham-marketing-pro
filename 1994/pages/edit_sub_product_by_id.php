<?php
if(isset($_GET['id'])){
  $gid = safe_input($_GET['id']);
}

$select_products = @mysql_query("select * from sub_products where id='".$gid."'") or die(mysql_error());
$product = @mysql_fetch_assoc($select_products);


        if(isset($_POST['edit'])){

        $folder = "../images/";

              $fname1 = &$_FILES['pic']['name'];
              // For File 1
              if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "Product_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                 $add_file_1 = @mysql_query("update sub_products set pic='$newfilename1' where id='".$gid."'") or die(mysql_error());
                }else{
                  die(error_message_with_link("File not uploaded!!","index.php?cpages=pages/edit_sub_product_by_id&id=".$gid.""));
                }
              }

        if(isset($add_file_1)){
    header("Location: index.php?cpages=pages/edit_sub_product_by_id&id=".$gid."");
  }
  }
   
?>
<!--1-->
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/add_product"><i class="fa fa-plus"></i>
    <br />
        Add Product</a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/edit_product"><i class="fa fa-edit"></i>
    <br />
        Edit | Delete Product</a>
    </div>
</div>
      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Edit Product</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/edit_sub_product_by_id&id=<?php echo $gid;?>" method="post" enctype="multipart/form-data">
            <tr>
                    <td colspan="2" align="center"><img src="../images/<?php echo $product['pic'];?>" width="300px" alt="" /><br /><br />
                   <input type="file" name="pic" class="form-control" /></td>
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