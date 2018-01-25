# Simple Script to Save Data from Mysql to a csv file


## Prerequisites : 
PHP Version : 5.5 or less.
Requires : WAMP /XAMP or any server

## Steps To Use :

* Download the zipped file.

* Uncompress and save the folder "databasetocsv-master" in the root directory of your local server.

* open the file options.php in the editor and fill the info required for connectivity.

* Now save the file and run "index.php" in the browser.


 This works if you already know the query to fetch the desired data.
 This script only helps you to convert the query results in a csv file format.



Example "Options.php"

```
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "My_Database"; 


$query = "SELECT * from repository where repository_name = 'databasetocsv'"; 

$saveas = "repo_info"; 
```



