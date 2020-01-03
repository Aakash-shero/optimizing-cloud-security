<html>
	<head>
    	<title>Comparitive Report</title>
        <style>
        	h1
			{
				color:#F00;
				padding-top:40;
				padding-bottom:40;
				text-align:center;	
			}
        </style>
    </head>
</html>
<?php

	session_start();
	
	include "D:\\xampp\htdocs\BEPROJECT\Html\libchart\libchart\classes/libchart.php";
	
	if ( isset($_SESSION['uploadFile_time']) && isset($_SESSION['uploadFileMM_time']) )
	{
		//text indexing parameters
		$totalDisplayTimeText = $_SESSION['displayText_time'];
		$totalDatabaseTimeText = $_SESSION['databaseEntryText_time'] + $_SESSION['getIdDatabaseText_time'];
		$totalTimeForKeywordGenerationText = $_SESSION['kewordGeneration_time'];
		$totalTimeForEncryptionText = $_SESSION['encryptText_time'];
		$totalTimeForCloudStorageText = $_SESSION['cloudUploadText_time'];
		$totalTimetoReadFilesText = $_SESSION['readTextFile_time'];
		$totalTimetoUploadFilesText = $_SESSION['uploadFile_time'];
		$totalTimeIndexingText = $totalDisplayTimeText + $totalDatabaseTimeText + $totalTimeForKeywordGenerationText + $totalTimeForEncryptionText + $totalTimeForCloudStorageText + $totalTimetoReadFilesText + $totalTimetoUploadFilesText;
		
		//text searching parameters
		$totalTimeText = $_SESSION['totalSearchText_time'];
		$totalTimeTrustedCloudText = $_SESSION['tustedCloudTextSearch_time'];
		$totalTimeUntrustedCloudText = $_SESSION['untustedCloudTextSearch_time'];
		
		//MM indexing parameters
		$totalDisplayTimeMM = $_SESSION['displayMM_time'];
		$totalDatabaseTimeMM = $_SESSION['databaseEntryMM_time'] + $_SESSION['getIdDatabaseMM_time'];
		$totalTimeForKeywordGenerationMM = $_SESSION['kewordGenerationMM_time'];
		$totalTimeForEncryptionMM = $_SESSION['encryptMM_time'];
		$totalTimeForCloudStorageMM = $_SESSION['cloudUploadMM_time'];
		$totalTimetoReadFilesMM = $_SESSION['readMMFile_time'];
		$totalTimetoUploadFilesMM = $_SESSION['uploadFileMM_time'];
		$totalTimeIndexingMM = $totalDisplayTimeMM + $totalDatabaseTimeMM + $totalTimeForKeywordGenerationMM + $totalTimeForEncryptionMM + $totalTimeForCloudStorageMM + $totalTimetoReadFilesMM + $totalTimetoUploadFilesMM;
		
		//MM search parameters
		$totalTimeMM = $_SESSION['totalSearchMM_time'];
		$totalTimeTrustedCloudMM = $_SESSION['tustedCloudMMSearch_time'];
		$totalTimeUntrustedCloudMM = $_SESSION['untustedCloudMMSearch_time'];
		
		echo'
			<h1>Time Analysis : Encrypted Text vs. Encrypted Multimedia Indexing</h1>
			<table align="center" cellpadding="10" cellspacing="10" border="1">
				<tr>
					<th>Modules</th>
					<th>Text Time (in seconds)</th>
					<th>Multimedia Time (in seconds)</th>
				</tr>
				<tr>
					<td>File Upload Time</td>
					<td>'.$totalTimetoUploadFilesText.'</td>
					<td>'.$totalTimetoUploadFilesMM.'</td>
				</tr>
				<tr>
					<td>Reading Contents of File</td>
					<td>'.$totalTimetoReadFilesText.'</td>
					<td>'.$totalTimetoReadFilesMM.'</td>
				</tr>
				<tr>
					<td>Encryption Time</td>
					<td>'.$totalTimeForEncryptionText.'</td>
					<td>'.$totalTimeForEncryptionMM.'</td>
				</tr>
				<tr>
					<td>Keyword Extraction Time</td>
					<td>'.$totalTimeForKeywordGenerationText.'</td>
					<td>'.$totalTimeForKeywordGenerationMM.'</td>
				</tr>
				
				<tr>
					<td>Database Computations</td>
					<td>'.$totalDatabaseTimeText.'</td>
					<td>'.$totalDatabaseTimeMM.'</td>
				</tr>
				<tr>
					<td>Cloud Storage</td>
					<td>'.$totalTimeForCloudStorageText.'</td>
					<td>'.$totalTimeForCloudStorageMM.'</td>
				</tr>
				<tr>
					<td>Display Contents</td>
					<td>'.$totalDisplayTimeText.'</td>
					<td>'.$totalDisplayTimeMM.'</td>
				</tr>
				<tr>
					<th>Total Time</th>
					<th>'.$totalTimeIndexingText.'</th>
					<th>'.$totalTimeIndexingMM.'</th>
				</tr>
			</table>
		';
		
		$chart = new HorizontalBarChart(650, 650);

		$dataSet1 = new XYDataSet();
		$dataSet1->addPoint(new Point("FileUpload", $totalTimetoUploadFilesMM));
		$dataSet1->addPoint(new Point("ReadFile", $totalTimetoReadFilesMM));
		$dataSet1->addPoint(new Point("Encryption", $totalTimeForEncryptionMM));
		$dataSet1->addPoint(new Point("Keyword", $totalTimeForKeywordGenerationMM));
		$dataSet1->addPoint(new Point("Database", $totalDatabaseTimeMM));
		$dataSet1->addPoint(new Point("Cloud", $totalTimeForCloudStorageMM));
		$dataSet1->addPoint(new Point("Display", $totalDisplayTimeMM));
		
		$dataSet2 = new XYDataSet();
		$dataSet2->addPoint(new Point("FileUpload", $totalTimetoUploadFilesText));
		$dataSet2->addPoint(new Point("ReadingFile", $totalTimetoReadFilesText));
		$dataSet2->addPoint(new Point("Encryption", $totalTimeForEncryptionText));
		$dataSet2->addPoint(new Point("Keyword", $totalTimeForKeywordGenerationText));
		$dataSet2->addPoint(new Point("Database", $totalDatabaseTimeText));
		$dataSet2->addPoint(new Point("Cloud", $totalTimeForCloudStorageText));
		$dataSet2->addPoint(new Point("Display", $totalDisplayTimeText));
		
		$dataSet = new XYSeriesDataSet();
		$dataSet->addSerie("Multimedia Index", $dataSet1);
		$dataSet->addSerie("Text Index", $dataSet2);
		$chart->setDataSet($dataSet);
		
		$chart->setTitle("Graphical Analysis : Indexing");
		$chart->render("generated/compareIndex.png");
		
		echo '
			<br /><br />
			<center><img src="generated/compareIndex.png" /></center>
			';	
		
		echo'
			<h1>Time Analysis : Encrypted Text vs. Encrypted Multimedia Searching</h1>
			<table align="center" cellpadding="10" cellspacing="10" border="1">
				<tr>
					<th>Modules</th>
					<th>Text Time (in seconds)</th>
					<th>Multimedia Time (in seconds)</th>
				</tr>
				<tr>
					<td>Untrusted Cloud Search</td>
					<td>'.$totalTimeUntrustedCloudText.'</td>
					<td>'.$totalTimeUntrustedCloudMM.'</td>
				</tr>
				<tr>
					<td>Trusted Cloud Search</td>
					<td>'.$totalTimeTrustedCloudText.'</td>
					<td>'.$totalTimeTrustedCloudMM.'</td>
				</tr>
				<tr>
					<th>Total Time</th>
					<th>'.$totalTimeText.'</th>
					<th>'.$totalTimeMM.'</th>
				</tr>
			</table>
		';
		
		$chart = new VerticalBarChart(850, 450);

		$dataSet1 = new XYDataSet();
		$dataSet1->addPoint(new Point("Trusted Cloud", $totalTimeTrustedCloudMM));
		$dataSet1->addPoint(new Point("Untrusted Cloud", $totalTimeUntrustedCloudMM));
		
		$dataSet2 = new XYDataSet();
		$dataSet2->addPoint(new Point("Trusted Cloud", $totalTimeTrustedCloudText));
		$dataSet2->addPoint(new Point("Untrusted Cloud", $totalTimeUntrustedCloudText));
		
		$dataSet = new XYSeriesDataSet();
		$dataSet->addSerie("Multimedia Search", $dataSet1);
		$dataSet->addSerie("Text Search", $dataSet2);
		$chart->setDataSet($dataSet);
		
		$chart->setTitle("Graphical Analysis : Searching");
		$chart->render("generated/compareSearch.png");
		
		echo '
			<br /><br />
			<center><img src="generated/compareSearch.png" height="442" width="542" /></center>
			';		
				
		if( isset($_SESSION['textDownload_time']) && isset($_SESSION['MMDownload_time']) )
		{
			//text download parameter
			$totalTextDownloadTime = $_SESSION['textDownload_time'];
			
			//multimedia download parameter
			$totalActualMMDownloadTime = $_SESSION['ActualMMDownload_time'];
			$totalBothMMDownloadTime = $_SESSION['BothMMDownload_time'];
			$totalMMDownloadTime = $_SESSION['MMDownload_time'];
			$total = ( $totalActualMMDownloadTime + $totalBothMMDownloadTime + $totalMMDownloadTime )/3;
			
			echo'
				<h1>Time Analysis : Decrypted Text vs. Encrypted Multimedia Downloading</h1>
				<table align="center" cellpadding="10" cellspacing="10" border="1">
					<tr>
						<th>Modules</th>
						<th>Text Time (in seconds)</th>
						<th>Multimedia Time (in seconds)</th>
					</tr>
					<tr>
						<td>Download Time</td>
						<td>'.$totalTextDownloadTime.'</td>
						<td>'.$total.'</td>
					</tr>
				</table>
			';
		}
	}
	else
		echo '<h1>Upload both the Files ie Text and Multimedia and then Refresh the Page</h1>';
		
	$chart = new VerticalBarChart(850, 450);

	$dataSet1 = new XYDataSet();
	$dataSet1->addPoint(new Point("DownloadTime", $total));
		
	$dataSet2 = new XYDataSet();
	$dataSet2->addPoint(new Point("DownloadTime", $totalTextDownloadTime));
		
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("Multimedia Download", $dataSet1);
	$dataSet->addSerie("Text Download", $dataSet2);
	$chart->setDataSet($dataSet);
		
	$chart->setTitle("Graphical Analysis : Downloading");
	$chart->render("generated/compareDownload.png");
		
	echo '
		<br /><br />
		<center><img src="generated/compareDownload.png" height="442" width="542" /></center>
		';		
?>