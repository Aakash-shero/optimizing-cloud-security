<?php	
	session_start();
	
	$acessToken = 'a:2:{s:1:"t";s:16:"hic55718skyllls1";s:1:"s";s:15:"zfz5wtb8giiaq1t";}';
	$userInput = $_POST['token'];
	$downloadActualMMStartTime = microtime(true);
	
	if(strcmp($acessToken, $userInput) == 0)
	{
		$id = $_SESSION['id'];		
		$connect = mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("be") or die("<br><br>no database found<br><br>");
		
		$query_m = "select * from multimedia where id = $id ";
		$result_m = mysql_query($query_m) or die("<br>Query Failed ".mysql_error());
		if(mysql_num_rows($result_m))
		{
			while($rows_m = mysql_fetch_assoc($result_m))
			{
				$originalName = $rows_m['name'];
			}
		}
		
		function download($filename, $downloadActualMMStartTime)
		{
			$absoluteFileName = "C:\\xampp\htdocs\BEPROJECT\Html\Multimedia/".$filename;
			
			//echo 'absolute file name = '.$absoluteFileName;
			//echo '<br />filename = '.basename($absoluteFileName);
			
			$downloadActualMMEndTime = microtime(true);
			$totalActualMMDownloadTime = $downloadActualMMEndTime - $downloadActualMMStartTime;
			$_SESSION['ActualMMDownload_time'] = $totalActualMMDownloadTime;
			
			if (file_exists($absoluteFileName)) 
			{
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($absoluteFileName));
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($absoluteFileName));
				readfile($absoluteFileName);
				exit;
				
			}
		}		
		
		download($originalName, $downloadActualMMStartTime);
	}
	else
	{
		echo "
			<html>
				<head>
					<link type='text/css' href='mystyle.css' rel='stylesheet' />
				</head>
				<body>
					<center>
						<h1>Wrong Token</h1>
						<br /><br />
						<a href='enterTokenActualMedia.php'>Try Again</a>
						<br /><br />
						<a href='menu.php'>Back to Main Menu</a>
						<br /><br />
						<a href='logout.php'>Logout</a>
					</center>
				</body>
			</html>";
	}
?>