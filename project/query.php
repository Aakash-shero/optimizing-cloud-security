
<html>
<body>


<?php

$username = "root";
$password = "";
$hostname = "localhost"; 




//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db('clone',$dbhandle);



if($selected)
	
  
  {
 echo "Connected to database. Plz proceed."; 
  }
  
else
{
	echo "<p>RETRY!.</a></p>";
}	//close the connection
//mysql_close($dbhandle);



$pcolumns       = htmlentities($_POST['columns']);    // comma seperated columns
                         // array of column names
 
$pcolumns = str_replace(",", "' ,'",$pcolumns);
	
	$query          = " SELECT DISTINCT TABLE_NAME 
                       FROM INFORMATION_SCHEMA.COLUMNS
                       WHERE COLUMN_NAME IN ( ' " .$pcolumns."  ')
                        AND TABLE_SCHEMA='clone';";
	
	 if (!empty($_POST['columns'])) 
   {
	   
	  // echo "<h3><b>Query:</b> <i>$query</i></h3><hr/>";
	   $result = mysql_query($query);
	  // echo $result;
	   
	   
	   // This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
           }
	else 
	{
		while($row = mysql_fetch_array($result))
           {
	          
			     print_r ($row);

           }		
	   
	} 
   }
	
	echo "<p><a href='searchparameters.php'>Enter parameters to be searched.</a></p>";
  
?>

					
</body>
</html>					
