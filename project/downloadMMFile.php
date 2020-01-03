<?php
	
	session_start();
	
	$acessToken = 'a:2:{s:1:"t";s:16:"hic55718skyllls1";s:1:"s";s:15:"zfz5wtb8giiaq1t";}';
	$userInput = $_POST['token'];
	$downloadMMStartTime = microtime(true);
	
	if(strcmp($acessToken, $userInput) == 0)
	{	
		$connect = mysql_connect("localhost","root","") or die(mysql_error());
		mysql_select_db("be") or die("<br><br>no database found<br><br>");
			
		$id = $_SESSION['id'];
		$query = " select file_name from topkresults where file_id = $id ";
		$result = mysql_query($query) or die("<br>Query Failed ".mysql_error());
		if(mysql_num_rows($result))
		{
			while($rows = mysql_fetch_assoc($result))
			{
				$name = $rows['file_name'];
			}
		}
		
		$filename = 'C:\Users\AAKASH VASWANI\Dropbox\Apps\untrustedserver/'.$name.'.encrypt';		
		$handle = fopen($filename, "r") or die('Cannot open file: '.$filename);
		$filesize = filesize($filename);
		$contents = fread($handle, $filesize);
		
		function decryptData($value, $filename, $name, $downloadMMStartTime)
		{
			//vale : encrypted data and filename : to decrypt file
			   
			//AES 128-bit decryption
			$key = "Mary has one cat";
			$crypttext = $value;
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $crypttext, MCRYPT_MODE_ECB, $iv);
			
			//writing to file filename.txt.decrypt
			$myfile = fopen("C:\\xampp\htdocs\BEPROJECT\Html\Decrypt/".$name.".decrypt", "w") or die("Unable to open file!");
			fwrite($myfile, $decrypttext);
			download($name.'.decrypt', $downloadMMStartTime);
			fclose($myfile);
		}
		
		function download($filename, $downloadMMStartTime)
		{
			$absoluteFileName = "C:\\xampp\htdocs\BEPROJECT\Html\Decrypt/".$filename;
			
			$downloadMMEndTime = microtime(true);
			$totalMMDownloadTime = ($downloadMMEndTime - $downloadMMStartTime);
			$_SESSION['MMDownload_time'] = $totalMMDownloadTime;
			
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
		
		decryptData($contents, $filename, $name, $downloadMMStartTime);
	}
	else
	{
		echo "
			<html>
				<head>
					<link type='text/css' href='style.css' rel='stylesheet' />
				</head>
				<body>
					<center>
						<h1>Wrong Token</h1>
						<br /><br />
						<a href='enterTokenMM.php'>Try Again</a>
						<br /><br />
						<a href='menu.php'>Back to Main Menu</a>
						<br /><br />
						<a href='logout.php'>Logout</a>
					</center>
				</body>
			</html>";
	}
?>