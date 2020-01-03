<html>
	<head>
    	<title>Report : EncryptedTextIndexing</title>
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
	
	date_default_timezone_set("Asia/Kolkata");
	
	include "D:\\xampp\htdocs\BEPROJECT\Html\libchart\libchart\classes/libchart.php";
	
	$totalDisplayTime = $_SESSION['displayText_time'];
	$totalDatabaseTime = $_SESSION['databaseEntryText_time'] + $_SESSION['getIdDatabaseText_time'];
	$totalTimeForKeywordGeneration = $_SESSION['kewordGeneration_time'];
	$totalTimeForEncryption = $_SESSION['encryptText_time'];
	$totalTimeForCloudStorage = $_SESSION['cloudUploadText_time'];
	$totalTimetoReadFiles = $_SESSION['readTextFile_time'];
	$totalTimetoUploadFiles = $_SESSION['uploadFile_time'];
	$totalTimeIndexing = $totalDisplayTime + $totalDatabaseTime + $totalTimeForKeywordGeneration + $totalTimeForEncryption + $totalTimeForCloudStorage + $totalTimetoReadFiles + $totalTimetoUploadFiles;
	
	echo'
		<h1>Time Analysis : Encrypted Text Indexing</h1>
		<table align="center" cellpadding="10" cellspacing="10" border="1">
			<tr>
				<th>Modules</th>
				<th>Time (in seconds)</th>
			</tr>
			<tr>
				<td>File Upload Time</td>
				<td>'.$totalTimetoUploadFiles.'</td>
			</tr>
			<tr>
				<td>Reading Contents of File</td>
				<td>'.$totalTimetoReadFiles.'</td>
			</tr>
			<tr>
				<td>Encryption Time</td>
				<td>'.$totalTimeForEncryption.'</td>
			</tr>
			<tr>
				<td>Keyword Extraction Time</td>
				<td>'.$totalTimeForKeywordGeneration.'</td>
			</tr>
			
			<tr>
				<td>Database Computations</td>
				<td>'.$totalDatabaseTime.'</td>
			</tr>
			<tr>
				<td>Cloud Storage</td>
				<td>'.$totalTimeForCloudStorage.'</td>
			</tr>
			<tr>
				<td>Display Contents</td>
				<td>'.$totalDisplayTime.'</td>
			</tr>
			<tr>
				<th>Total Time</th>
				<th>'.$totalTimeIndexing.'</th>
			</tr>
		</table>
	';
	
	$chart = new VerticalBarChart(1200, 500);

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("File Upload", $totalTimetoUploadFiles));
	$dataSet->addPoint(new Point("Reading File", $totalTimetoReadFiles));
	$dataSet->addPoint(new Point("Encryption", $totalTimeForEncryption));
	$dataSet->addPoint(new Point("Keyword Extraction", $totalTimeForKeywordGeneration));
	$dataSet->addPoint(new Point("Database <br>Computations", $totalDatabaseTime));
	$dataSet->addPoint(new Point("Cloud Storage", $totalTimeForCloudStorage));
	$dataSet->addPoint(new Point("Display Contents", $totalDisplayTime));
	$chart->setDataSet($dataSet);

	$chart->setTitle("Graphical Analysis");
	$chart->render("generated/textIndex.png");
	
	echo '
		<br /><br />
		<center><img src="generated/textIndex.png" /></center>
		';	
?>