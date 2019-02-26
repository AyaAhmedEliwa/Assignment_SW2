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
		<form class="userform" name="weatherform" action="index.php" method="GET" >
			<h1>Your Weather For Today</h1>
			City: <input type="text" name="city" placeholder="city"/><br />
			<input type="submit" name="submit" value="Submit"/><br />
		</form>
		<br />
		<br />

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=19d6178f3b8425f989e37a57e86a0879",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 93bbe2cd-9840-4645-9fcd-d471e6d2c0e9",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $x =json_decode($response);
  echo "<br />";
			echo "Temperature: " ;
			print_r($x->main->temp);
			echo "<br />";
			echo "Humidity: " ;
			print_r($x->main->humidity);
			echo "<br />";
			
			echo "Wind Speed: " ;
			print_r($x->wind->speed);
			echo "<br />";
			echo "Pressure: ";
			print_r($x->main->pressure);
			echo "<br />";
			
  
}
?>
</body>
</html>