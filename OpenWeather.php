<html>

	<head>
	<title>Weather App </title>
	<style>
		
		body{
			width:960px;
		}
		.userform{
			padding-top: 50px;
		}
	</style>
	</head>	
	<body>
		<form class="userform" name="weatherform" action="Weather.php" method="POST" >
			<h1>Your Weather For Today</h1>
			City: <input type="text" name="city" placeholder="city"/><br />
			<input type="submit" name="submit" value="Submit"/><br />
		</form>
		<br />
</body>
</html>
