<?php
if(isset($_GET['id'])){
  $gid = safe_input($_GET['id']);
}


$select_category = @mysql_query("select * from sub_category where id='".$gid."'") or die(mysql_error());
$category = @mysql_fetch_assoc($select_category);


        if(isset($_POST['edit'])){
              $title = $_POST['title'];
              $ar_title = $_POST['ar_title'];
              $category_id = $_POST['category_id'];

              $update_category = @mysql_query("update sub_category set
        title='$title',
        ar_title='$ar_title',
        category_id='$category_id'
        where id='".$gid."'") or die(mysql_error());
        }

        if(isset($update_category)){
    header("Location: index.php?cpages=pages/edit_sub_category_by_id&id=".$gid."");
  }
?>
<!--1-->
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
            <h3>Edit Sub-Category</h3>

            <table class="table" style="width: 80%;">
            <form action="index.php?cpages=pages/edit_sub_category_by_id&id=<?php echo $gid;?>" method="post">
            <tr>
                <th>Sub-Category title in English</th>
                <td><input type="text" name="title" required="required" value="<?php echo $category['title'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <th>Sub-Category title in Arabic</th>
                <td><input type="text" name="ar_title" required="required" value="<?php echo $category['ar_title'];?>" class="form-control" /></td>
            </tr>
            <tr>
                <td>Main Category</td>
                <td><select name="category_id" required="required" class="form-control">
                <?php
                $select_main_category = @mysql_query("select * from category") or die(mysql_error());
                while($main_category = @mysql_fetch_assoc($select_main_category)){
                if($main_category['id'] == $category['category_id']){
                  echo '
                <option value="'.$main_category['id'].'" selected="selected">'.$main_category['category_name'].'</option>
                  ';
                }else{
                echo '
                <option value="'.$main_category['id'].'">'.$main_category['category_name'].'</option>
                  ';
                  }
                }
                ?>
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