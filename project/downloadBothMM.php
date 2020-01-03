<?php
	
	session_start();
	
	$acessToken = 'a:2:{s:1:"t";s:16:"hic55718skyllls1";s:1:"s";s:15:"zfz5wtb8giiaq1t";}';
	$userInput = $_POST['token'];
	$downloadBothMMStartTime = microtime(true);
	
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
		
		function decryptData($value, $filename, $name, $downloadBothMMStartTime)
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
			$decrypt_file = $name.'.decrypt';
	
			$storage = array();
			$partialName = array();			
			$storage = explode("_",$name);//abc_mp3.txt
			$actualName = $storage[0];//abc
			$tailName = $storage[1];//mp3.txt
			$partialName = explode(".",$storage[1]);
			$extensionName =$partialName[0];//mp3
			$fullName = $actualName.".".$extensionName;//abc.mp3
			
			$fileNames=array('\Multimedia/'.$fullName,'\Decrypt/'.$decrypt_file);
			$zip_file_name = $actualName.'.zip';
			$file_path=dirname(__FILE__);
			//echo "<br>".$file_path;
			zipFilesDownload($fileNames,$zip_file_name,$file_path, $downloadBothMMStartTime);
			
			fclose($myfile);
		}
		
		function zipFilesDownload($file_names,$archive_file_name,$file_path, $downloadBothMMStartTime)
		{
			$zip = new ZipArchive;
		
			if ($zip->open($archive_file_name, ZipArchive::CREATE )!==TRUE) 
			{
				exit("cannot open <$archive_file_name>\n");
			}
		
			foreach($file_names as $files)
			{
				$zip->addFile($file_path.$files,$files);
				echo "<br>".$file_path.$files;
				echo "<br>".$files;
			}
			if ($zip->close() === false) 
			{
			   exit("Error creating ZIP file : ".$archive_file_name);
			}
			
			$downloadBothMMEndTime = microtime(true);
			$totalBothMMDownloadTime = ($downloadBothMMEndTime - $downloadBothMMStartTime);
			$_SESSION['BothMMDownload_time'] = $totalBothMMDownloadTime;
			
			if (file_exists($archive_file_name)) 
			{
				header("Content-Description: File Transfer");
				header("Content-type: application/zip"); 
				header("Content-Disposition: attachment; filename=$archive_file_name");
				header("Pragma: no-cache");
				header("Expires: 0");
				readfile($archive_file_name);
				ob_clean();
				flush();
				exit;
			}
			else 
			{
				exit("Could not find Zip file to download");
			}
		}
	
		decryptData($contents, $filename, $name, $downloadBothMMStartTime);
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
						<a href='enterTokenBothMM.php'>Try Again</a>
						<br /><br />
						<a href='menu.php'>Back to Main Menu</a>
						<br /><br />
						<a href='logout.php'>Logout</a>
					</center>
				</body>
			</html>";
	}
?>