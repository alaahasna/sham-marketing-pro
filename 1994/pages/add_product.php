<?php           // ترميز  &apos;
if(isset($_POST['add'])){
        // Text Box Values :
        $folder = "../images/";
        $fname1 = &$_FILES['pic']['name'];
        $title = $_POST['title'];
        $ar_title = $_POST['ar_title'];
        $description = $_POST['description'];
        $ar_description = $_POST['ar_description'];
        $category_id = $_POST['category_id'];
        $price = $_POST['price'];
        $put_in_daily_deals = $_POST['put_in_daily_deals'];
        $value_of_discount = $_POST['value_of_discount'];
        $price_after_discount = $_POST['price_after_discount'];
        $view_in_index = $_POST['view_in_index'];
        $quantity = $_POST['quantity'];

                 if(!empty($_POST['title'])){
                   if(!empty($fname1)){
                $file_ext1 = pathinfo($fname1, PATHINFO_EXTENSION);
                $newfilename1 = "Product_".Date("d-m-y-h-m-s-a_").rand(00000,99999).".".$file_ext1;
                $ftmp1 = &$_FILES['pic']['tmp_name'];
                if(move_uploaded_file($ftmp1,$folder.$newfilename1)){
                    ///////
                }else{
                  $newfilename1 = "";
                }
              }
                 $add_cat_1 = @mysql_query("insert into products
                 (title,ar_title,description,ar_description,category_id,price,put_in_daily_deals,value_of_discount,price_after_discount,view_in_index,pic,quantity,deleted_product)
                 values
                 ('".$title."','".$ar_title."','".$description."','".$ar_description."','".$category_id."','".$price."','".$put_in_daily_deals."','".$value_of_discount."','".$price_after_discount."','".$view_in_index."','".$newfilename1."','".$quantity."','No')") or die(mysql_error());
                 }

         error_message_with_link("Done.","index.php?cpages=pages/add_product");
}

?><!--1-->
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
            <h3>Add Product</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/add_product" method="post" enctype="multipart/form-data">
            <tr>
                <td>Picture <span style="color: #333;font-size: 1rem;">(720x480)</span></td>
                <td><input type="file" name="pic" class="form-control" required="required" /></td>
            </tr>
            <tr>
                <td>Product title in English</td>
                <td><input type="text" name="title" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Product title in Arabic</td>
                <td><input type="text" name="ar_title" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Product Description in English</td>
                <td><textarea name="description" class="form-control" value=""></textarea></td>
            </tr>
            <tr>
                <td>Product Description in Arabic</td>
                <td><textarea name="ar_description" class="form-control" value=""></textarea></td>
            </tr>
            <tr>
                <td>Sub-Category</td>
                <td>
                <select name="category_id" class="form-control">
                <?php
                $select_sub_category = @mysql_query("select * from sub_category order by id desc") or die(mysql_error());
                while($sub_category = @mysql_fetch_assoc($select_sub_category)){
                  echo '
                <option value="'.$sub_category['id'].'">'.$sub_category['title'].'</option>
                  ';
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><input type="text" name="quantity" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Put in Daily Deals</td>
                <td>
                <select name="put_in_daily_deals" class="form-control">
                <option value="No" selected="selected">No</option>
                <option value="Yes">Yes</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Value of discount: %</td>
                <td><input type="text" name="value_of_discount" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Price after discount:</td>
                <td><input type="text" name="price_after_discount" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>View in Index</td>
                <td>
                <select name="view_in_index" class="form-control">
                <option value="No">No</option>
                <option value="Yes" selected="selected">Yes</option>
                </select>
                </td>
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