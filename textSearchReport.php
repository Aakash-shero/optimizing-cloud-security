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
	
	include "C:\\xampp\htdocs\project\libchart\libchart\classes/libchart.php";
	
	$totalTime = $_SESSION['totalSearchText_time'];
	$totalTimeTrustedCloud = $_SESSION['tustedCloudTextSearch_time'];
	$totalTimeUntrustedCloud = $_SESSION['untustedCloudTextSearch_time'];
	
	echo'
		<h1>Time Analysis : Encrypted Text Searching</h1>
		<table align="center" cellpadding="10" cellspacing="10" border="1">
			<tr>
				<th>Modules</th>
				<th>Time (in seconds)</th>
			</tr>
			<tr>
				<td>Untrusted Cloud Search</td>
				<td>'.$totalTimeUntrustedCloud.'</td>
			</tr>
			<tr>
				<td>Trusted Cloud Search</td>
				<td>'.$totalTimeTrustedCloud.'</td>
			</tr>
			<tr>
				<th>Total Time</th>
				<th>'.$totalTime.'</th>
			</tr>
		</table>
	';
	
	$chart = new PieChart(500, 250);

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Trusted Cloud", $totalTimeTrustedCloud));
	$dataSet->addPoint(new Point("Untrusted Cloud", $totalTimeUntrustedCloud));
	$chart->setDataSet($dataSet);

	$chart->setTitle("Graphical Analysis");
	$chart->render("generated/textSearch.png");
	
	echo '
		<br /><br />
		<center><img src="generated/textSearch.png" height="442" width="542" /></center>
		';
?>