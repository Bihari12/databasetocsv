<?php
// do not touch
// writes the db credentials in db_config file 
session_start();
$fff = __DIR__ . "/db_config.php";

$myfile = fopen( $fff , "w") or die("Unable to open file!");

$txtString = "<?php\n" . "$" . "hostname = " . '"' . $_POST['hostname']. '"' . ";\n";
$txtString .= "$" . "username = " . '"' . $_POST['username']. '"' .";\n";
$txtString .= "$" . "password = " . '"' . $_POST['password']. '"' . ";\n";
$txtString .= "$" . "dbname = " . '"' . $_POST['dbname']. '"' . ";\n";

fwrite($myfile, $txtString) ;
fclose($myfile);


$_SESSION['dbdetails'] = 'set';

header('Location: index.php');
exit();