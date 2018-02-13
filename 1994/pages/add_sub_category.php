<?php           // ترميز  &apos;
if(isset($_POST['add'])){
        // Text Box Values :
        $title = $_POST['title'];
        $ar_title = $_POST['ar_title'];
        $category_id = $_POST['category_id'];

                 if(!empty($_POST['title'])){
                 if(!empty($_POST['category_id'])){

                 $add_cat_1 = @mysql_query("insert into sub_category
                 (title,ar_title,category_id)
                 values
                 ('".$title."','".$ar_title."','".$category_id."')") or die(mysql_error());
                 }
                 }

         error_message_with_link("Done.","index.php?cpages=pages/add_sub_category");
}

?><!--1-->
<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/add_sub_category"><i class="fa fa-plus"></i>
    <br />
        Add Sub-Category</a>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 new-link-box">
    <a href="index.php?cpages=pages/edit_sub_category"><i class="fa fa-edit"></i>
    <br />
        Edit | Delete Sub-Category</a>
    </div>
</div>

      <section id="main-content">
          <section class="wrapper site-min-height">

<!--1-->
            <h3>Add Sub-Category</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/add_sub_category" method="post">

            <tr>
                <td>Sub-Category title in English</td>
                <td><input type="text" name="title" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Sub-Category title in Arabic</td>
                <td><input type="text" name="ar_title" required="required" class="form-control" value="" /></td>
            </tr>
            <tr>
                <td>Main Category</td>
                <td><select name="category_id" required="required" class="form-control">
                <?php
                $select_category = @mysql_query("select * from category") or die(mysql_error());
                while($category = @mysql_fetch_assoc($select_category)){
                  echo '
                <option value="'.$category['id'].'">'.$category['category_name'].'</option>
                  ';
                }
                ?>
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