<?php
if(isset($_GET['id']))
      $gid = safe_input(intval($_GET['id']));

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'no'){
      confirm_message("Delete This product?","index.php?cpages=pages/edit_product&id=".$gid."&confirm=yes","index.php?cpages=pages/edit_product");
    }

    if(isset($_GET['confirm']) and $_GET['confirm'] == 'yes'){
      $delete_product = @mysql_query("DELETE FROM products WHERE id='".$gid."'") or die(mysql_error());
      header("Location: index.php?cpages=pages/edit_product");
    }

    $select_products = @mysql_query("select * from products") or die(mysql_error());
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
            <h3>Edit | Delete Product ( <?php echo @mysql_num_rows($select_products);?> )</h3>

            <table class="table" style="width: 80%;">
            <tr>
                <th>Product Title</th>
                <th>Edit | Delete</th>
            </tr>
            <?php

            while($product = @mysql_fetch_assoc($select_products)){
              echo '
            <tr>
                <td>'.$product['title'].'</td>
                <td>
                <a href="index.php?cpages=pages/edit_product_by_id&id='.$product['id'].'"><input type="image" src="../images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;
                <a href="index.php?cpages=pages/edit_product&id='.$product['id'].'&confirm=no"><input type="image" src="../images/icn_trash.png" title="Delete"></a> &nbsp;&nbsp;
                </td>
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