<?php
ob_start();
session_start();
include "lib/main.php";

if(isset($_GET['search'])){
  $search = safe_input($_GET['search']);
}else{
  header("Location: 404.php");
}

if(isset($_GET['page'])){
$currentpage = safe_input(intval($_GET['page']));
}else{
$currentpage = 1;
}

$privpage = $currentpage-1;
$nextpage = $currentpage+1;
$perpage = 12;

$start = ($currentpage - 1) * $perpage;

$select_search1 = @mysql_query("select * from products where title Like '%".$search."%' or ar_title Like '%".$search."%' or description Like '%".$search."%' or ar_description Like '%".$search."%' or price='".$search."'") or die(mysql_error());

$num_search = @mysql_num_rows($select_search1);

$num = @mysql_num_rows($select_search1);

$lastpage = ceil($num / $perpage);

$select_search = @mysql_query("select * from products where title Like '%".$search."%' or ar_title Like '%".$search."%' or description Like '%".$search."%' or ar_description Like '%".$search."%' or price='".$search."' order by id desc limit ".$start.",".$perpage."") or die(mysql_error());

if(isset($_GET['search'])){
  $link = "search.php?search=".$search;
}
?>
  <!DOCTYPE html>
  <html>
    <head>
      <link rel="shortcut icon" href="imgs/logo.png" type="image/x-icon">
      <meta charset="utf-8">
      <title><?php echo $main_settings['ar_site_name'];?> | البحث </title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/css?family=Exo+2|Lato" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize-rtl.min.css"  media="screen,projection"/>

      <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css"  media="screen,projection"/>
      <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/search.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    <?php
        if(isset($_SESSION['US_id'])){
        nav_bar($_SESSION['US_id'],session_id());
        }else{
        nav_bar('with_out_session',session_id());
        }
      ?>

      <section class="search_result rtl">
        <div class="container">
          <div class="section-title center-align">
          <br />
            <h2>
            <?php
            if($num_search == 0){
              echo "<br /><br />لا يوجد نتائج.<br /><br />";
            } else{
              echo 'نتائج البحث ( '.$num_search.' )';
            }
            ?>
            </h2>
          </div>
          <div class="row">

            <?php

            while($results = @mysql_fetch_assoc($select_search)){
              echo '
              <div class="col l3 m4 s12">
              <div class="card">
                <a href="single.php?id='.$results['id'].'">
                  <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../images/'.$results['pic'].'" alt="'.$results['ar_title'].'" class="img-responsive">
                </div>
                <div class="card-content center-align">
                  <span class="card-title activator grey-text text-darken-4">'.mb_substr($results['ar_title'],0,12,'UTF-8').'..</span>
                  <a href="single.php?id='.$results['id'].'" style="font-size: 9pt;" class="btn btn-float">عرض المنتج</a>
                </div>
                </a>
              </div>
            </div>
              ';
            }
            ?>
          </div>
<?php if ($num_search >= 1){?>
<div class="pagination">
<div class="center-align">
<?php
if($currentpage == 1){
echo '
<span class="btn btn-default.disabled"><i class="material-icons">chevron_left</i></span>
';
} else{
echo '
<a href="'.$link.'&page='.$privpage.'"><span class="btn btn-default"><i class="material-icons">chevron_left</i></span></a>
';
}
?>
<?php
for($i=$currentpage-2; $i<=$currentpage+2; $i++){
if($i > 0 && $i <= $lastpage){
  if($i == $currentpage){
  echo '
<a href="'.$link.'&page='.$i.'"class="btn btn-default"><b>'.$i.'</b></a>
  ';
  }else{
  echo '
<a href="'.$link.'&page='.$i.'"class="btn btn-default">'.$i.'</a>
  ';
}
}
}
?>
<?php
if($currentpage == $lastpage){
echo '
<span class="btn btn-default.disabled"><i class="material-icons">chevron_right</i></span>
';
} else{
echo '
<a href="'.$link.'&page='.$nextpage.'"><span class="btn btn-default"><i class="material-icons">chevron_right</i></span></a>
';
}
?>
</div>
</div>
<?php }?>
        </div>
      </section>

      <?php footer();?>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
    </body>
  </html>
