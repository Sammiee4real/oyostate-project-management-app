<?php
$db_host='localhost';
$db_user='root';
$db_password='';
$database='oyostate_project_mgt_v1';


$dbc = mysqli_connect("$db_host","$db_user","$db_password","$database")
or die ('Error connecting to Database');

// $db_host='localhost';
// $db_user='konnecti_jesusaiduser';
// $db_password='Pass4jesusaid%%';
// $database='konnecti_jesusaid';
// $dbc = mysqli_connect("$db_host","$db_user","$db_password","$database")
// or die ('Error connecting to Database');

?>