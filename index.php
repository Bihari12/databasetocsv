<?php

error_reporting(0);
include("options.php");

$con = mysql_connect($hostname, $username, $password);
$db_selected = mysql_select_db($dbname, $con);

$csv_export = '';

$result = 	mysql_query($query);
$field = mysql_num_fields($result);
for($i = 0; $i < $field; $i++) {
  $csv_export.= mysql_field_name($result,$i).',';
}
$csv_export.= '
';


while($row = mysql_fetch_array($result)) 
{
  for($i = 0; $i < $field; $i++) 
  {
    
    $csv_export.= '"'.$row[mysql_field_name($result,$i)].'",';
  }	
  $csv_export.= '
  ';	
}


$filename = $saveas .".csv";
$datawrite = $csv_export;;
file_put_contents($filename, $datawrite, FILE_APPEND | LOCK_EX);


