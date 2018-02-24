<?php
ob_start();
session_start();


include "../lib/main.php";
if(!isset($_SESSION['I_id']) or !isset($_SESSION['I_name'])){
  header("Location: login.php");
}
$username = safe_input($_SESSION['I_name']);
$id = safe_input($_SESSION['I_id']);


// check id is it to this username --session--
$select_admin_id = @mysql_query("select id,username,full_name from admin where id='".$id."'");
$admin_id = @mysql_fetch_assoc($select_admin_id);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Control Panel</title>
    <link rel="shortcut icon" href="../imgs/logo.png" type="image/x-icon"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-green.min.css">
  <link rel="stylesheet" href="../cpanel_css/style.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
        <style>
			html {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 13px;
			}
			form div {
				padding: .5em;
			}
			code:before {
				position: absolute;
				content: 'Code:';
				top: -1.35em;
				left: 0;
			}
			code {
				margin-top: 1.5em;
				position: relative;
				background: #eee;
				border: 1px solid #aaa;
				white-space: pre;
				padding: .25em;
				min-height: 1.25em;
			}
			code:before, code {
				display: block;
				text-align: left;
			}
            textarea{
              height:300px;
              width:600px;
            }
            .mce-notification{
              display: none;
            }
		</style>



</head>
<body class="hold-transition skin-green sidebar-mini">

	<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $main_settings['site_name'];?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $main_settings['site_name'];?></b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="hidden-lg hidden-md hidden-sm sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="logout.php">
              <i>Logout</i>
            </a>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->

        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="fa fa-user" style="color: #fff;" alt="<?php echo $username;?>"></i>
        </div>
        <div class="pull-left info">
          <p><?php echo $username;?></p>
          <!-- Status -->
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
      <li <?php if($_GET['cpages'] == 'pages/main_settings') echo 'class="active"';?>><a href="index.php?cpages=pages/main_settings">
            <i class="fa fa-cogs"></i> Main Settings
      </a></li>
      <li <?php if($_GET['cpages'] == 'pages/add_index_slid' or $_GET['cpages'] == 'pages/edit_index_slid' or $_GET['cpages'] == 'pages/edit_index_slid_by_id' or $_GET['cpages'] == 'pages/delete_index_slid') echo 'class="active"';?>><a href="index.php?cpages=pages/edit_index_slid">
            <i class="fa fa-home" aria-hidden="true"></i> Index slider</a></li>
      <li <?php if($_GET['cpages'] == 'pages/index_deals') echo 'class="active"';?>><a href="index.php?cpages=pages/index_deals">
            <i class="fa fa-cogs"></i> Index Deals
      </a></li>
      <li <?php if($_GET['cpages'] == 'pages/add_category' or $_GET['cpages'] == 'pages/edit_category' or $_GET['cpages'] == 'pages/edit_category_by_id') echo 'class="active"';?>><a href="index.php?cpages=pages/edit_category">
            <i class="fa fa-link" aria-hidden="true"></i> Categories</a></li>
      <li <?php if($_GET['cpages'] == 'pages/add_sub_category' or $_GET['cpages'] == 'pages/edit_sub_category' or $_GET['cpages'] == 'pages/edit_sub_category_by_id') echo 'class="active"';?>><a href="index.php?cpages=pages/edit_sub_category">
            <i class="fa fa-tag" aria-hidden="true"></i> Sub-Categories</a></li>
      <li <?php if($_GET['cpages'] == 'pages/add_product' or $_GET['cpages'] == 'pages/edit_product' or $_GET['cpages'] == 'pages/edit_product_by_id') echo 'class="active"';?>><a href="index.php?cpages=pages/edit_product">
            <i class="fa fa-link" aria-hidden="true"></i> Products</a></li>
      <li <?php if($_GET['cpages'] == 'pages/request_product' or $_GET['cpages'] == 'pages/view_request_product') echo 'class="active"';?>><a href="index.php?cpages=pages/request_product">
            <i class="fa fa-tags" aria-hidden="true"></i> Products Requests</a></li>
      <li <?php if($_GET['cpages'] == 'pages/users' or $_GET['cpages'] == 'pages/view_user' or $_GET['cpages'] == 'pages/edit_user') echo 'class="active"';?>><a href="index.php?cpages=pages/users">
            <i class="fa fa-user" aria-hidden="true"></i> Users</a></li>
      <li <?php if($_GET['cpages'] == 'pages/about') echo 'class="active"';?>><a href="index.php?cpages=pages/about">
            <i class="fa fa-info"></i> About</a></li>
      <li <?php if($_GET['cpages'] == 'pages/services') echo 'class="active"';?>><a href="index.php?cpages=pages/services">
            <i class="fa fa-cog"></i> Services</a></li>
      <li <?php if($_GET['cpages'] == 'pages/add_new_admin' or $_GET['cpages'] == 'pages/edit_admin_password' or $_GET['cpages'] == 'pages/view_admins' or $_GET['cpages'] == 'pages/edit_admin_by_id') echo 'class="active"';?>><a href="index.php?cpages=pages/add_new_admin">
            <i class="fa fa-user" aria-hidden="true"></i> Admin</a></li>

      </ul>
      </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header)
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
                      -->
    <!-- Main content -->
    <section class="content container-fluid">

    <?php
    if(isset($_GET['cpages']))
        $page = mysql_real_escape_string($_GET['cpages']);
    if(isset($page)){
        $url = $page.".php";
        if(file_exists($url)){
            include $url;
        }else{
            echo "<h4 class='cp_error'>Error 404: Not found page</h4>";
        }
    }else{
        header("Location: index.php?cpages=pages/main_settings");
    }
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="http://www.syweb.co">SYweb</a>.</strong> All rights reserved.
  </footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

    <script>
function searchBook() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchBook");
  filter = input.value.toUpperCase();
  table = document.getElementById("books-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function searchUser() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchUser");
  filter = input.value.toUpperCase();
  table = document.getElementById("users-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function searchCategory() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchCategory");
  filter = input.value.toUpperCase();
  table = document.getElementById("categories-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function searchMembership() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchMembership");
  filter = input.value.toUpperCase();
  table = document.getElementById("membership-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function searchBundels() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchBundels");
  filter = input.value.toUpperCase();
  table = document.getElementById("bundels-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function searchTeam() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchTeam");
  filter = input.value.toUpperCase();
  table = document.getElementById("team-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

    </script>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script
		  src="https://code.jquery.com/jquery-3.1.0.min.js"
		  integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
		  crossorigin="anonymous"></script>

		<script src="./minified/jquery.sceditor.bbcode.min.js"></script>
    <script src="../js/jquery.tablesorter.pager.js"></script>
   <script type="text/javascript" src="js/sort.js"></script>
    <script src="js/croppie.js"></script>
    <script type="text/javascript">
      $(".table th").on("click", function(){
        $(".fa-caret-down").removeClass("active-caret");
        $(".fa-caret-down", this).toggleClass("active-caret");

      });
    </script>

        <script type="text/javascript">

$uploadCrop = $('#upload-demo').croppie({

    enableExif: true,

    viewport: {

        width: 400,

        height: 400,

        type: 'rectangle'

    },

    boundary: {

        width: 300,

        height: 300

    }

});


$('#upload').on('change', function () {

	var reader = new FileReader();

    reader.onload = function (e) {

    	$uploadCrop.croppie('bind', {

    		url: e.target.result

    	}).then(function(){

    		console.log('jQuery bind complete');

    	});



    }

    reader.readAsDataURL(this.files[0]);

});


$('.upload-result').on('click', function (ev) {

	$uploadCrop.croppie('result', {

		type: 'canvas',

		size: 'viewport'

	}).then(function (resp) {


		$.ajax({

			url: "ajaxpro.php",

			type: "POST",

			data: {"image":resp},

			success: function (data) {

				html = '<img src="' + resp + '" />';

				$("#upload-demo-i").html(html);

			}

		});

	});

});


</script>

</body>
</html>