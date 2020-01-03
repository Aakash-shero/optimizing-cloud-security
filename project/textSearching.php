<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Text Indexing</title>
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
                            <li><a href="textFileSearch.php">Search with other Query</a></li>
                            <li><a href="textSearchReport.php" target="_blank">Generate Report</a></li>
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
                        $connect = mysql_connect("localhost","root","") or die(mysql_error());
                        mysql_select_db("be") or die("<br><br>no such database found!!!<br><br>");
                        
                        //count total files to compute IDF
                        $query11 = mysql_query(" SELECT * FROM fileindex ") or die(mysql_error());
                        $total_documents = mysql_num_rows($query11);
                                        
                        $text = $_POST['query'];
                        
                        $startTime = microtime(true);
                        
                        //echo "<b>Entered Query : </b>".$text;
                        $encryptText = encryptData($text);
                        //echo "<b>Encrypted Query : </b>".$encryptText;
                        $query4 = mysql_query("select * from topkresults") or die(mysql_error());
                        if(mysql_num_rows($query4))
                        {
                            //table is not empty, delete data
                            $query44 = mysql_query("truncate table topkresults");	
                        }
                        $query7 = mysql_query("select * from topkencryptresults") or die(mysql_error());
                        if(mysql_num_rows($query7))
                        {
                            //table is not empty, delete data
                            $query77 = mysql_query("truncate table topkencryptresults");	
                        }
                        
                        if(strlen($text) > 3)
                        {
                            $searchTimeTrustedStart = microtime(true);
                            
                            //break the query into keywords
                            $words = extractCommonWords($text);
                            
                            //table is empty, insert data
                            foreach($words as $key => $value)
                            {
                                $query1 = mysql_query(" SELECT * FROM modifiedindex WHERE keyword like '%".$key."%' OR keyword like '".$key."%' OR keyword like '%".$key."' ") or die(mysql_error());
                            
                                //reterive data from normal index if particular keyword is present				
                                if(mysql_num_rows($query1))
                                {
                                    while($rows = mysql_fetch_assoc($query1))
                                    {
                                        $id = $rows['file_id'];
                                        $term = $rows['keyword'];
                                        $freq = $rows['frequency'];
                                        $term_freq = $rows['term_frequency'];
                                            
                                        //if keyword is present, obtain the fileName from fileIndex using id reterived from normal index
                                        if($id)
                                        {
                                            $query2 = mysql_query(" SELECT file_name FROM fileindex WHERE file_id = $id ") or die(mysql_error());
                                            if(mysql_num_rows($query2))
                                            {
                                                $execute2 = mysql_fetch_array($query2);
                                                $name = $execute2['file_name'];
                                                
                                                //count the occurance of a particular keyword in index table for computing IDF
                            $query3 = mysql_query(" SELECT COUNT(keyword) as total FROM modifiedindex WHERE keyword like '%".$key."%' OR keyword like '".$key."%' OR keyword like '%".$key."' ") or die(mysql_error());
                                                $execute3 = mysql_fetch_array($query3);
                                                $occurance = $execute3['total'];
                                                    
                                                //calculating IDF for top k files retrival
                                                $idf = log($total_documents / $occurance) * $term_freq;
                                                        
                $query44 = mysql_query("insert into topkresults(file_id, file_name, idf) values(".$id.", '".$name."', ".$idf.")") or die("<br>Insert Query Failed inserting to topkresults ".mysql_error());
                                            }
                                            else
                                            {
                                                //file id is not present, skip current keyword and move to next
                                            }
                                        }		
                                    }
                                }
                                else
                                {
                                    //keyword is not present, skip current keyword and move to next
                                }
                            }
                            
                            $searchTimeUntrustedStart = microtime(true);
                            //table for encrypted text query
                            echo '<h2><center>Top k encrypted results from Untrusted Cloud</h2></center><br>';
                            //check if table is empty or contains data				
                            $query4 = mysql_query("select * from topkencryptresults") or die(mysql_error());
                        
                            foreach($words as $key => $value)
                            {
                                $query1 = mysql_query(" SELECT * FROM modifiedindex WHERE keyword like '%".$key."%' OR keyword like '".$key."%' OR keyword like '%".$key."' ") or die(mysql_error());
                                    
                                //reterive data from normal index if particular keyword is present				
                                if(mysql_num_rows($query1))
                                {
                                    while($rows = mysql_fetch_assoc($query1))
                                    {
                                        $id = $rows['file_id'];
                                        $term = $rows['keyword'];
                                        $freq = $rows['frequency'];
                                        $term_freq = $rows['term_frequency'];
                                            
                                        //if keyword is present, obtain the fileName from fileIndex using id reterived from normal index
                                        if($id)
                                        {
                                            $query2 = mysql_query(" SELECT file_name FROM fileindex WHERE file_id = $id ") or die(mysql_error());
                                            if(mysql_num_rows($query2))
                                            {
                                                $execute2 = mysql_fetch_array($query2);
                                                $name = $execute2['file_name'];
                                                    
                                                //count the occurance of a particular keyword in index table for computing IDF
                            $query3 = mysql_query(" SELECT COUNT(keyword) as total FROM modifiedindex WHERE keyword like '%".$key."%' OR keyword like '".$key."%' OR keyword like '%".$key."' ") or die(mysql_error());
                                                $execute3 = mysql_fetch_array($query3);
                                                $occurance = $execute3['total'];
                                                    
                                                //calculating IDF for top k files retrival
                                                $idf = log($total_documents / $occurance) * $term_freq;
                                                    
                                                $aesKey = "Mary has one cat";
                    $query44 = "insert into topkencryptresults(file_id, file_name, idf) values (AES_ENCRYPT('".$id."', '".$aesKey."'), AES_ENCRYPT('".$name."', '".$aesKey."'), ".$idf.")";
                                        $result44 = mysql_query($query44) or die("<br>Insert Query Failed inserting to topkencryptresults ".mysql_error());
                                            }
                                            else
                                            {
                                                //file id is not present, skip current keyword and move to next
                                            }
                                        }		
                                    }
                                }
                                else
                                {
                                    //keyword is not present, skip current keyword and move to next
                                }
                            }
                            
                            $query5 = " select * from topkencryptresults order by idf desc ";
                            $result5 = mysql_query($query5) or die("<br>Query Failed selecting from topkencryptresults ".mysql_error());
                            $numrows5 = mysql_num_rows($result5);			
                            if($numrows5 > 0)
                            {
                                echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
                                echo "<tr><th>FILE ID</th><th>FILE Name</th></tr>";
                                while($rows5 = mysql_fetch_assoc($result5))
                                {
                                    $id = $rows5['file_id'];
                                    $name = $rows5['file_name'];
                                    echo "<tr><td>$id</td><td>$name</td></tr>";	
                                }
                                    echo "</table>";	
                            }
                            else
                                echo "No results found!!!!!<br>Please REFRESH the page again or try with diffrent query....<br>";
                                                    
                            echo '<br><br>';
                            
                            $searchTimeUntrustedEnd = microtime(true);
                            $totalTimeUntrustedCloud = $searchTimeUntrustedEnd - $searchTimeUntrustedStart;
                            $_SESSION['untustedCloudTextSearch_time'] = $totalTimeUntrustedCloud;
                            
                            echo '<h2><center>Top k decrypted results from Trusted Cloud</h2></center><br>';
                            $query55 = " select * from topkresults order by file_id";
                            $result55 = mysql_query($query55) or die("<br>Query Failed selecting from topkresults ".mysql_error());
                            $numrows55 = mysql_num_rows($result55);			
                            if($numrows55 > 0)
                            {
                                echo "<table border='1' cellspacing='4' cellpadding='4' align='center'>";
                                echo "<tr><th>FILE ID</th><th>FILE Name</th><th>RANKING</th></tr>";
                                
                                $previous_id = 0;
                                $previous_idf = 0;
                                $filename = array();
                                while($rows55 = mysql_fetch_assoc($result55))
                                {
                                    $id = $rows55['file_id'];
                                    $name = $rows55['file_name'];
                                    $idf = $rows55['idf'];
                                    
                                    if( $previous_id != $id )
                                    {
                                        echo "<tr><td>$id</td><td>$name</td><td>$idf</td></tr>";
                                    }
                                    else
                                    {
                                        //rest of logic
                                    }					
                                    $previous_id = $id;
                                    $previous_idf = $idf;	
                                }
                                echo "</table>";	
                            }
                            else
                                echo "No results found!!!!!<br>Please REFRESH the page again or try with diffrent query....<br>";
                                                        
                            echo '<br><br>';
                            
                            $searchTimeTrustedEnd = microtime(true);
                            $totalTimeTrustedCloud = $searchTimeTrustedEnd - $searchTimeTrustedStart;
                            $_SESSION['tustedCloudTextSearch_time'] = $totalTimeTrustedCloud;
                        }
                            
                        $endTime = microtime(true);
                        $totalTime = $endTime - $startTime;
                        $_SESSION['totalSearchText_time'] = $totalTime;
                    }
                    
                ?>	
                        
                        <h2>Enter File Id to download file</h2>
                            <form name="fileDownload" action="enterTokenText.php" method="post">
                                <table border="0" cellpadding="4" cellspacing="4" align="center">
                                    <tr>
                                        <td><input type="text" name="fileid" required></td>
                                        <td><input type="submit" value="Download File"></td>
                                    </tr>
                                </table>
                        </form>
                    
                <?php    
                    function extractCommonWords($string)
                    {
                          $fp = fopen('stoplist.txt', 'r'); 
                          $stopWords = explode("\n", fread($fp, filesize('stoplist.txt')));
                               
                          $string = preg_replace('/ss+/i', '', $string);
                          $string = trim($string); // trim the string
                          $string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
                          $string = strtolower($string); // make it lowercase
                       
                          preg_match_all('/\b.*?\b/i', $string, $matchWords);
                          $matchWords = $matchWords[0];
                     
                          $totalWords = count($matchWords[0]);
                     
                          foreach ( $matchWords as $key=>$item ) 
                          {
                              if ( $item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 3 ) 
                              {
                                  unset($matchWords[$key]);
                              }
                          }
                          $wordCountArr = array();
                          if ( is_array($matchWords) ) 
                          {
                              foreach ( $matchWords as $key => $val ) 
                              {
                                  $val = strtolower($val);
                                  if ( isset($wordCountArr[$val]) )
                                  {
                                      $wordCountArr[$val]++;
                                  } 
                                  else 
                                  {
                                      $wordCountArr[$val] = 1;
                                  }
                              }
                          }
                        arsort($wordCountArr);
                              
                        $wordCountArr = array_slice($wordCountArr, 0, 10);		
                        return $wordCountArr;
                    }
                    function encryptData($value)
                    {
                        $key = "Mary has one cat";
                        $text = $value;
                        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
                        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $text, MCRYPT_MODE_ECB, $iv);			
                        //fclose($myfile);
                        return $crypttext;
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