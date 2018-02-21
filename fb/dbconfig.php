<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'sham_pro_user');    // DB username
define('DB_PASSWORD', 'P@ssword');    // DB password
define('DB_DATABASE', 'sham_pro_db');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
?>