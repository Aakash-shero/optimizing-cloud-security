<html>
	<head>
		<style>
			name
			{
				color:#F00;
				font-size:24px;
				text-align:left;
			}
			a
			{
				text-decoration:none;	
			}
			a:link /* unvisited link */
			{
				color: #00F;
			}			
			a:visited /* visited link */
			{
				color: #00F;
			}
			a:hover /* mouse over link */
			{
				color: #F00;
				text-decoration:underline;
			}			
			a:active /* selected link */
			{
				color: #0F0;
			}
		</style>
	</head>
</html>
<?php
	session_start();
	//Database Connectivity
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("be") or die("no database found");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$username = $_POST['username'];
		$password = $_POST['password2'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		
		$check = mysql_query("select * from user where name = '".$username."' or email = '".$email."' or contact = $contact");
		mysql_fetch_row($check);
		if ($check < 1)
		{
			echo "<br><br><center>Username <name>$username</name> is already taken!<br><br>";
			echo '<a href="/BEPROJECT/Html/index.html#register">Try Again!</a></center>';
		}
		else
		{
			//Inserting into database
			$query = "INSERT INTO user VALUES ('','".$username."','".$password."','".$email."','.$contact.')";
			$result = mysql_query($query) or die("<br>Query Failed  ".mysql_error()."<br><a href='/BEPROJECT/Html/index.html#register'>RETRY</a>");
			
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			
			if (isset($_SESSION['username']))
				header('Location: /BEPROJECT/Html/menu.php');
		}
	}		
?>