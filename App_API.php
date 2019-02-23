<html>

	<head>
	<title>Weathe App </title>
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
		<form class="userform" name="weatherform" action="index.php" method="GET" >
			<h1>Your Weathe For Today</h1>
			City: <input type="text" name="city" placeholder="city"/><br />
			Country: <input type="text" name="country" placeholder="country"/><br />
			<input type="submit" name="submit" value="Submit"/><br />
		</form>
		<br />
		<br />
	<?php
	
		if(isset($_GET))
		{
			//------------get user input.
			$user_city = $_GET['city'];
			$user_country = $_GET['country'];
			
			
			//------------connect to API
			$api_url = "https://openweathermap.org/data/2.5/weather" . $user_city . "," .$user_country;
			$weather_data = file_get_contents($api_url);
			$json = json_decode($weather_data, TRUE);
			
			//------------get the requested info from api
			$user_temp = $json['main']['temp']; //---temperature
			$user_humidity = $json['main']['humidity'];
			$user_conditions = $json['weather'][0]['main'];
			$user_wind = $json['wind']['speed'];
			$user_wind_direction = $json['wind']['deg'];
			
			
			//------------output users data to the screen
			echo "<strong> City: </strong>" .$user_city."<br />";
			echo "<strong> Country: </strong>" .$user_country."<br />";
			echo "<strong> Temperature: </strong>" .$user_temp."<br />";
			echo "<strong> Humidity: </strong>" .$user_humidity."<br />";
			echo "<strong> Current Condition: </strong>" .$user_conditions."<br />";
			echo "<strong> Wind Speed: </strong>" .$user_wind."<br />";
			echo "<strong> Wind Direction: </strong>" .$user_wind_direction."<br />";		
			
		};	
	?>
	
	<?php
	
		if(isset($_GET['submit']))
		{
			//--------------------saving user input
			$data = "data.json";
			$json_string = json_encode($_GET, JSON_PRETTY_PRINT);
			file_put_contents($data , $json_string, FILE_APPEND);			
		};
	?>
	
	</body>
</html>