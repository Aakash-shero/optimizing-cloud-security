<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Database file uploaded</title>
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
                            <li><a href="textFileUpload.php">Upload another File</a></li>
                            <li><a href="textIndexReport.php" target="_blank">Generate Report</a></li>
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
						
				if($_SERVER["REQUEST_METHOD"] == "POST")
					{		




$username = "root";
$password = "";
$hostname = "localhost"; 

$db = "mydatabase";

$fieldseparator = ",";
$lineseparator = "\n";
$csvfile = $_POST['file'];

$tablename = array();

$tablename= explode ('.', $csvfile);
 //print_r($tablename);


$table=$tablename[0];

/********************************/
/* Would you like to add an ampty field at the beginning of these records?
/* This is useful if you have a table with the first field being an auto_increment integer
/* and the csv file does not have such as empty field before the records.
/* Set 1 for yes and 0 for no. ATTENTION: don't set to 1 if you are not sure.
/* This can dump data in the wrong fields if this extra field does not exist in the table
/********************************/
$addauto = 0;



if(!file_exists($csvfile)) {
	echo "File not found. Make sure you specified the correct path.\n";
	exit;
}

$file = fopen($csvfile,"r");

if(!$file) {
	echo "Error opening data file.\n";
	exit;
}

$size = filesize($csvfile);

if(!$size) {
	echo "File is empty.\n";
	exit;
}

$csvcontent = fread($file,$size);

fclose($file);

$con = @mysql_connect($hostname,$username,$password) or die(mysql_error());
@mysql_select_db($db) or die(mysql_error());

$lines = 0;
$queries = "";
$linearray = array();
$fields = array();
//$clonefields=array();




	
	$csvencrypttable = $table;
	
	// query for clone table
	
	$dbclone= "use clone";
      mysql_query($dbclone);
	
	$clone="create table ".$csvencrypttable." like ".$db.".".$table;

	$cloneresult= mysql_query($clone);
	
	if (!$cloneresult) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $clone;
    die($message);
}
	else echo 'clone ready';
	
	
	$clonesql = "SHOW COLUMNS FROM ".$csvencrypttable;
	
$cloresult = mysql_query($clonesql);
//echo $cloresult;


while($row = mysql_fetch_array($cloresult))
{
 
 $col=$row['Field'];
//echo $col."<br>";
 
 
	$datatype="alter table ".$db.".".$table."
	             modify column ".$col." varchar(200)";
	
	$datatyperesult = mysql_query($datatype);
	
	if (!$datatyperesult) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $datatype;
    die($message);
}
	// else echo 'clone column changed';
	
}
	

	
	
$filetable = $table.".txt" ;
$myfile = fopen($filetable,"w") or die("Unable to open file!");	
 
	
foreach(split($lineseparator,$csvcontent) as $line) 
{

	$lines++;

	$line = trim($line," \t");
	
	$line = str_replace("\r","",$line);
	
	/************************************
	This line escapes the special character. remove it if entries are already escaped in the csv file
	************************************/
	$line = str_replace("'","\'",$line);
	/*************************************/
	
	$linearray = explode($fieldseparator,$line);
	
//print_r ($linearray);
	
	$encrypted = array_map("encrypt", $linearray);
//echo '<pre>';
//print_r($encrypted);



$string_data = serialize($encrypted);
//file_put_contents("your-file.txt", $string_data);
fwrite($myfile, $string_data);


	
	$linemysql = implode(',',$linearray);
	$encryptinsert=implode('","',$encrypted);
	$colnames = implode(",",$fields);
	
	
	
	
	
	
	if($addauto)
	{
		$query = "insert into " .$table.  "(".$colnames. ") values(',' ".$linemysql." )";
    // echo 'this ok';
	 
	 $clonequery = "insert into " .$table.  "(".$colnames. ") values(',' ".$encryptinsert." )";
    // echo 'this clone ok';
	 
	}
	else
	{$query = "insert into ".$table. " (".$colnames. ") values( ".$linemysql." )";
	//echo 'ok';
	
	$clonequery = 'insert into '.$db.'.'.$table. ' ('.$colnames. ') values(" '.$encryptinsert.' " ) ';
	//echo 'clone ok';
	
	
	}
	
	$queries .= $query . "\n";

	$result=@mysql_query($query);
	if (!$result) 
	{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
    }
	
	$cloneinresult=@mysql_query($clonequery);
	if (!$cloneinresult) 
	{
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $clonequery;
    die($message);
    }
	
}

fclose($myfile);

@mysql_close($con);


echo "Found a total of $lines records in this csv file.\n";

					}
function encrypt($text)
{
   return base64_encode($text);
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