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
			
			h4
			{
				color:#000;
				font-size:20px;
				text-align:center;	
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
	
	
	
	/*   for nly 1 column:
	SELECT * FROM information_schema.columns WHERE column_name = 'column_name';
	
	*/
	
	
	 if (!empty($_POST['columns'])) 
   {
	   
	  // echo "<h3><b>Query:</b> <i>$query</i></h3><hr/>";
	   $result = mysql_query($query);
	   //echo $result;
	   
	   
	   // This shows the actual query sent to MySQL, and the error. Useful for debugging.
if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
           }
	else 
	{
		define('TABLE_NAME', false);
		echo "<h4> Table names </h4>";
		echo "<table border='1' style='word-wrap:break-word' align='center' >";         // New table
        /* Column Title */
		
		
		while($row = mysql_fetch_array($result))
           {
	          
			  
			   echo "<tr>\r\n\r\n";                                       
                echo "
                    <td style='max-width:1000px;'>
                        <div style='max-height:3000px;overflow-y:auto;'>
                            $row[TABLE_NAME]
                        </div>
                    </td>";
            

            echo "</tr>";                                               // end of that row  
			 //echo $row[TABLE_NAME]."</br>";   
         //print_r($row);

           }		
	   echo "</table>";  
	} 
   }
	
	// echo "<p><a href='searchparameters.php'>Enter parameters to be searched.</a></p>";
  
?>


                
                        
                        <h2>Select table and Enter value of required parameter: </h2>
                            <form name="searchparameters" action="enterTokendatabase.php" method="post">
                                <table border="0" cellpadding="4" cellspacing="4" align="center">
								
                                    <tr>
									
									<td>Details(Fields): </td>
                                        <td><input type = "text" name = "columns" placeholder="Enter field names " required></td></br>
		                            </tr>
		                            <tr>
                                    <td> Table:</td>
                                        <td><input type = "text" name = "table" placeholder="Select table from above list " required></td></br>
										</tr>
										<tr>
                                       <td> parameter and its value:</td>
                                          <td><input type = "text" name = "where" placeholder="Enter searching condition " required></td></br>
		                                 </tr>
										 <tr>
                                        <td> <input type="submit"   value="submit" /> </td>

                                       </tr>
									   
                                </table>
                        </form>
                    
                       		
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