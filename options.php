<?php
session_start();


	if(isset($_SESSION['dbdetails']) && $_SESSION['dbdetails'] =='set')
	{
		// db details arre set
	}
	else
	{
	         // redirecting to options.php if db details are not set
		 header('Location : options.php');
		 exit();
	}


?>

<!DOCTYPE html>
<html>
<head>



  <title>Set Options</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<style type="text/css">

</style>
</head>
<body>

<div class="options_page">
<div class="container">
  <?php if(isset($_GET['error']) && $_GET['error'] == 'details'){ ?>
  <h2>Error Occurerd :Could not connect to database, Please enter correct host,user and password again</h2>
  <?php } else if(isset($_GET['error']) && $_GET['error'] == 'db') { ?>
  <h2>Error Occurerd :Please Verify Database name</h2>
<?php } ?>


  <h1>Fill Database Related Information</h1>
  
  <form action="set_config.php" method="POST" id="join-us">
    <div class="fields">
      <span>
       <input class ="iphost" placeholder="Hostname"  name = "hostname" type="text" />
    </span>
    <br />
     <span>
       <input class ="ipuser" placeholder="Database username" name = "username" type="text" />
    </span>
    <br />
     <span>
       <input class ="ippass" placeholder="Database password" name ="password" type="password" />
    </span>
    <br />
     <span>
       <input class ="ipdb" placeholder="Database Name" name ="dbname" type="text" />
    </span>
    
  <!--    <span>
       <input class ="ipsaveas" placeholder="Save file Name as " name ="saveas" type="text" />
    </span>
    <br />

    <span>
       <input class ="ipquery" placeholder="Query" name ="query" type="textarea" />
    </span> -->
    </div>
    <div class="submit">

    <input class="submitbtn" value="Submit" type="submit" />
    </div>
  </form>
</div>
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



