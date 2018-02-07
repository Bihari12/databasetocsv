<?php
ob_start();
session_start();
error_reporting(0);

include("db_config.php");
$con = mysql_connect($hostname, $username, $password );

// checking connection
if(!$con) {
    header('Location: options.php?error=details');
    exit();
}

// checking database existance
$res = mysql_select_db($dbname , $con);
if(!$res) {
    header('Location: options.php?error=db');
    exit();
}




  if(isset($_SESSION['dbdetails']) && $_SESSION['dbdetails'] =='set')
  {

  }
  else
  {
    header('Location: options.php');
    exit();
  }




if(isset($_GET['error']))
{
$error = $_GET['error'];
}





/* for executing*/

if(isset($_POST['excute']))
{

$csv_export = '';
$query = $_POST['ipquery'] ;

$result = mysql_query($query);
if(!$result)
{
  header('Location: index.php?error='. mysql_error());
  exit();
}

$field = mysql_num_fields($result);
for($i = 0; $i < $field; $i++) {
  $csv_export.= mysql_field_name($result,$i).',';
}
$csv_export.= '
';

while($row = mysql_fetch_assoc($result)) 
{
  for($i = 0; $i < $field; $i++) 
  {
    
    $csv_export.= '"'.$row[mysql_field_name($result,$i)].'",';
  }	
  $csv_export.= '
  ';	
}
mysql_close($con);

$datawrite = $csv_export;;


$fff= __DIR__ . "/results.csv";

$myfile = fopen( $fff , "w") or die("Unable to open file! Please check permissions for the user ");

fwrite($myfile, $datawrite) or die("Unable to Write Data In file! Please check write permissions for the user");
fclose($myfile);

header('Location: index.php?status=success');
exit();
}

/*for executing ends*/


// showing fields for entering query

?>
<!DOCTYPE html>
<html>
<head>



  <title>Get Results from Database</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


</head>
<body>


<div class="container">
  <h2><?php if(isset($_GET['status']) && $_GET['status']=='success' ) {echo "Query successfully executed. Check results.csv for results";} else if(isset($error)){echo "There was an error: ".$error;} ?></h2>
  <h1>Enter Your Query</h1>
  
  <form action="index.php" method="POST" id="join-us">
  <input type="hidden" name="excute" value= "execute" />
    <div class="fields">
       <span>
       <input class ="ipquery" placeholder="Enter query" name ="ipquery" type="text" />
    </span>
    <!-- <br /> -->
<!-- <span>
       <input class ="ipsaveas" placeholder="Save File As" name ="ipsaveas" type="text" />
    </span> -->
    </div>
    <div class="submit">
    <input class="submitbtn" value="Execute Query" type="submit" style=" width: 64%; " />
    </div>
  </form>
</div>

<script>
$(document).ready(function(){
    $('.iphost').tooltip({title: "write your hostname, localhost for default", animation: true, placement : "right"}); 
    $('.ipuser').tooltip({title: "write your database username, \"root\" for default", animation: true, placement : "right"}); 
    $('.ipdb').tooltip({title: "write database name", animation: true, placement : "right"}); 
    $('.ippass').tooltip({title: "write database password, \"\" for default", animation: true, placement : "right"}); 
    $('.ipquery').tooltip({title: "write your query which can get the desired data", animation: true, placement : "right"}); 
    $('.ipsaveas').tooltip({title: "write name of file to be save as ex \"myFile\"", animation: true , placement : "right"}); 

});
</script>


</body>
</html>



<? ob_flush(); ?>