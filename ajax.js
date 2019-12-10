function showHintName(str) 
			{
				if (str.length == 0) 
				{ 
					document.getElementById("nameHint").innerHTML = "";
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() 
					{
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
							document.getElementById("nameHint").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "gethint.php?q=" + str, true);
					xmlhttp.send();
				}
			}
			function showHintMail(str) 
			{
				if (str.length == 0) 
				{ 
					document.getElementById("emailHint").innerHTML = "";
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() 
					{
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
							document.getElementById("emailHint").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "gethint.php?q=" + str, true);
					xmlhttp.send();
				}
			}
			function showHintContact(str) 
			{
				if (str.length == 0) 
				{ 
					document.getElementById("contactHint").innerHTML = "";
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() 
					{
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
							document.getElementById("contactHint").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "gethint.php?q=" + str, true);
					xmlhttp.send();
				}
			}
			function showHintUsername(str) 
			{
				if (str.length == 0) 
				{ 
					document.getElementById("usernameHint").innerHTML = "";
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() 
					{
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
							document.getElementById("usernameHint").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "gethint2.php?q=" + str, true);
					xmlhttp.send();
				}
			}
			function showHintPassword(str) 
			{
				if (str.length == 0) 
				{ 
					document.getElementById("passwordHint").innerHTML = "";
					return;
				} 
				else 
				{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() 
					{
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
							document.getElementById("passwordHint").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET", "gethint2.php?q=" + str, true);
					xmlhttp.send();
				}
			}