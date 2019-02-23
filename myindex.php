<html>

	<head>
	<title>Weather App API</title>
	
	</head>	
	<body>
		<input id="city"></input>
		<button id="getWeatherForcast">Get Weather</button>
		<div id="showWeatherForcast"></div>
		
		<script type="text/javascript">
		
			$(document).ready(function(){
				$("#getWeatherForcast").Click(function(){
					var city = $("#city").val();
					var key = 'f41c265ab1add06e625451e701a3b6c0';
				});
				
			});
			
			$.ajax({
				url:'http://api.openweathermap.org/data/2.5/weather',
				datatype:'json',
				type:'GET',
				data:{q:city ,appid: 'key' ,units:'metric'},
				
				success:function(data){
					var wf ='';
					$.echo(data.weather , function(myindex, val)
					{
						wf +='<p><b>' + data.name +"</b> <img src ="+ val.icon +".png></p>"+
						data.main.temp +'&deg;C'+'|'+val.main+","+ val.description
					});
					$("#showWeatherForcast").html(wf);
				}
			});
		</script>
	</body>
	
</html>