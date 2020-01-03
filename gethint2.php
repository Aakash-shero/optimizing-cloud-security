<?php
	
	$connect = mysqli_connect("localhost","root","") or die(mysql_error());
	mysqli_select_db($connect,"be") or die("<br><br>no database found<br><br>");
	
	$query = mysqli_query($connect," select * from user ");
	$a = array();
	$x = 0;
	
	while ($rows = mysqli_fetch_assoc($query))
	{
		$a[$x++] = $rows['name'];
		$a[$x++] = $rows['password'];
	}
	
	// get the q parameter from URL
	$q = $_REQUEST["q"];
	
	$hint = "";
	
	// lookup all hints from array if $q is different from "" 
	if ($q !== "") 
	{
		$q = strtolower($q);
		$len=strlen($q);
		foreach($a as $name) 
		{
			if (stristr($q, substr($name, 0, $len))) 
			{
				if ($hint === "") 
				{
					$hint = $name;
				} 
				else 
				{
					$hint .= ", $name";
				}
			}
		}
	}
	
	// Output "no suggestion" if no hint was found or output correct values 
	echo $hint === "" ? " incorrect " : " correct ";
?>