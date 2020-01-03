<?php
	
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("be") or die("<br><br>no database found<br><br>");
	
	$query = mysql_query(" select * from user ");
	$a = array();
	$x = 0;
	
	while ($rows = mysql_fetch_assoc($query))
	{
		$a[$x++] = $rows['name'];
		$a[$x++] = $rows['email'];
		$a[$x++] = $rows['contact'];
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
	echo $hint === "" ? " $q is available" : " $q is already taken";
?>