




<?php


session_start();
	
	$acessToken = 'a:2:{s:1:"t";s:16:"hic55718skyllls1";s:1:"s";s:15:"zfz5wtb8giiaq1t";}';
	$userInput = $_POST['token'];
	//$pcolumns = $_SESSION['columns'];
  // $ptable= $_SESSION['table'];
  //  $pwhere = $_SESSION['where'];
	
if(strcmp($acessToken, $userInput) == 0)
	{


$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password)
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db('clone',$dbhandle);

if($selected)
	 {
 //echo "Connected to database. Plz proceed."; 
  }
  
else
{
	echo "huh";
}
 $pcolumns       = htmlentities($_SESSION["columns"]);    // comma seperated columns
   $columns        = explode(",",$pcolumns);                           // array of column names
//print_r($columns);
    $ptable         = htmlentities($_SESSION["table"]);    // table
	//echo $ptable;
	
    $pwhere         = str_replace(array(";",'"'),array('',''),$_SESSION["where"]);    // WHERE clause
	//echo $pwhere;
	
    if (!empty($pwhere)) {$pwhere = "WHERE $pwhere";}                   // if not empty, prepend with "WHERE"

   $dbdefault = "use clone";
   $ans= mysql_query($dbdefault);
   if (!$ans) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $dbdefault;
    die($message);
       }
else 
	{
	//	echo 'dne';	 
	} 
   $query          = "SELECT ".$pcolumns." FROM ".$ptable."  ".$pwhere;
   
   if (!empty($ptable)) 
   {
	   
	  // echo "<h3><b>Query:</b> <i>$query</i></h3><hr/>";
	  
if ($result = mysql_query($query)) {


        echo "<table border='1' style='word-wrap:break-word'>";         // New table
        /* Column Title */
        echo "<tr>";                                                    // New Row for the titles

        foreach($columns as $c) {                                       // For each column, create a column
            echo "<td><b>$c</b></td>\r\n";
        }

        echo "</tr>";                                                   // Close the titles' row


        /* DATA RESULTS */
        while ($row = mysql_fetch_array($result)) {                         // for each set of rows:
            echo "<tr>\r\n\r\n";                                        // create new row

            foreach($columns as $c) {                                   // for each column in the row:
                                                                        // create a cell 
                echo "
                    <td style='max-width:400px;'>
                        <div style='max-height:300px;overflow-y:auto;'>
                            $row[$c]
                        </div>
                    </td>";
            }

            echo "</tr>";                                               // end of that row

        }                                                               // end foreach results
        echo "</table>";                                                // closing of the table

        /* free result set */
        //$result->free(); 
    } else {
        echo "query failed.<hr/>";
    }	 
 }
	   
	   
	}
else {
	
	echo "
			<html>
				<head>
					<link type='text/css' href='style.css' rel='stylesheet' />
				</head>
				<body>
					<center>
						<h1>Wrong Token</h1>
						<br /><br />
						<a href='enterTokendatabase.php'>Try Again</a>
						<br /><br />
						<a href='menu.php'>Back to Main Menu</a>
						<br /><br />
						<a href='logout.php'>Logout</a>
					</center>
				</body>
			</html>";

}	
	   
	   
	   
	   
	   
	   
	   
	  
?>