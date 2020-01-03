<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Candidate tables</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        
        <style>
			h1
			{
				color:#F00;
				padding-top:40;
				padding-bottom:40;
				text-align:center;	
			}
			body
			{color:#000;}
			h2
			{
				color:#F00;
				font-size:24px;
				text-align:center;	
			}
			h3
			{
				color:#000;
				font-size:24px;
				text-align:left;	
			}
			name
			{
				color:#F00;
				font-size:24px;
				text-align:left;
			}
			a
			{
				text-decoration:none;	
			}
			a:link /* unvisited link */
			{
				color: #00F;
			}			
			a:visited /* visited link */
			{
				color: #00F;
			}
			a:hover /* mouse over link */
			{
				color: #F00;
				text-decoration:underline;
			}			
			a:active /* selected link */
			{
				color: #0F0;
			}
			th
			{
				text-align:left;
				font-size:22px;
				color:#F00;
			}
			name
			{
				color:#FFF;
				font-size:20px;
				text-align:left;
			}		
		</style>
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
					<mainHeading style="color:#F00; font-size:40px; font-weight:bold;">
                    	<br />
                    	<center>Searching and Indexing over Encrypted Data on Cloud</center>
                        <br />
                    </mainHeading>
                    <?php
                    	session_start();
						echo '<name><br><br>Welcome,  '.$_SESSION["username"].'</name>';
					?>
                                        
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                        	<li class="active"><a href="menu.php">Menu</a></li>
                            <li><a href="databaseFileSearch.php">Search with other Query</a></li>
                            
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="logout">
            <!-- Start cSlider -->
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="portfolio">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1>Trusted Cloud</h1>
                </div>
                







<?php


//session_start();
	
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


        echo "<table border='5' style='word-wrap:break-word' >";         // New table
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




				
                       
                       		
            </div>
        </div>
        <!-- Portfolio section end -->
        <!-- About us section start -->
        <div class="section primary-section" id="about">
            <div class="triangle">
            </div>
            <div class="container">
            </div>
        </div>
        
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2014-2015 All Rights Reserved</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script type="text/javascript" src="ajax.js"></script>
		
		<script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>