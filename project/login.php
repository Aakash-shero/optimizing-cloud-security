<html>
	<head>
    	<title>Login Page</title>
        <link type="text/css" href="style.css" rel="stylesheet"></link>
    </head>
</html>
<?php
	
	session_start();

	// Check, if user is already login, then jump to secured page
	if (isset($_SESSION['username']))
		header('Location: /BEPROJECT/Html/menu.php');
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username && $password)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("be") or die("<br><br>no database found<br><br>");
		}
		else
			die("<br><br>Please provide username/password!<br><br>");
		
		$query = mysql_query("SELECT * FROM user WHERE name = '$username'");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			while ($rows = mysql_fetch_assoc($query))
			{
				$dbusername = $rows['name'];
				$dbpassword = $rows['password'];
			}
			
			if($username == $dbusername && $password == $dbpassword)
			{			
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				if (isset($_SESSION['username']))
					header('Location: /BEPROJECT/Html/menu.php');
			}
			else
			{
				echo "<br><br>Incorrect Password!<br><br>";
				echo "<p><a href='/BEPROJECT/Html/index.html#login'>RETRY!</a></p>";
			}
		}
		else
		{
			echo "<br><br>Username does not exist!<br><br>";
			echo "<p><a href='/BEPROJECT/Html/index.html#login'>RETRY!</a></p>";
		}
	}
?>