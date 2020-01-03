<?php
function zipFilesDownload($file_names,$archive_file_name,$file_path)
{
	$zip = new ZipArchive();

	if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
    	exit("cannot open <$archive_file_name>\n");
	}

	foreach($file_names as $files)
	{
  		$zip->addFile($file_path.$files,$files);
	}
	$zip->close();

	header("Content-type: application/zip"); 
	header("Content-Disposition: attachment; filename=$archive_file_name"); 
	header("Pragma: no-cache"); 
	header("Expires: 0"); 
	readfile("$archive_file_name"); 
	exit;
}

$fileNames=array('files/Tulips.jpg','files/file1.pdf');
$zip_file_name='mFile.zip';
$file_path=dirname(__FILE__).'/';
zipFilesDownload($fileNames,$zip_file_name,$file_path);
?> 