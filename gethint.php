<?php
	
	$con = new mysqli("127.0.0.1","root","","be");
	mysqli_select_db($con,"be") or die("<br><br>no database found<br><br>");
	
	$query = mysqli_query($con , " select * from user ");
	$a = array();
	$x = 0;
	
	while ($rows = mysqli_fetch_assoc($query))
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