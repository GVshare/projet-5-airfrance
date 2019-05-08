class weather {
	constructor(location) {
		this.location = location;
	};

	initWeather() {

		ajaxGet("http://api.openweathermap.org/data/2.5/weather?q="+this.location+"&appid=7d7337502aeb200d555a39c715262211" , function(response) {
			let weather = JSON.parse(response);

			let city = weather.name;
			let longitude = weather.coord['lon'];
			let latitude = weather.coord['lat'];
			let coords = "lon: " + longitude + " | lat: " + latitude;

			let weatherShort = weather.weather[0]['main'];
			let weatherLong = weather.weather[0]['description'];
			let icon = "http://openweathermap.org/img/w/" + weather.weather[0]['icon'] + ".png";

			let tempK = weather.main['temp'] + ' K';
			let tempMinK = weather.main['temp_min' + ' K'];
			let tempMaxK = weather.main['temp_max' + ' K'];
			let tempC = (weather.main['temp'] - 273.15).toFixed(2) + ' °C';
			let tempMinC = (weather.main['temp_min'] - 273.15).toFixed(2) + ' °C';
			let tempMaxC = (weather.main['temp_max'] - 273.15).toFixed(2) + ' °C';

			let humidity = weather.main['humidity'] + '%';

			let visibility = weather.visibility + 'm';

			let windSpeed = weather.wind['speed'];
			let windDirection = weather.wind['deg'];
			let wind = "Wind speed of " + windSpeed + 'mps with a direction of ' + windDirection + '°';

			let sunRise = Unix_timestamp(weather.sys['sunrise']) + ' UTC';
			let sunSet = Unix_timestamp(weather.sys['sunset']) + ' UTC';

			// =============================================================================================

			let cityNameBox = document.getElementById('cityName');
			cityNameBox.textContent = city;
			let cityCoordsBox = document.getElementById('cityCoords');
			cityCoordsBox.textContent = coords;

			let logoBox = document.getElementById('logo');
			logoBox.setAttribute("src", icon);
			logoBox.setAttribute("width", "100");
			logoBox.setAttribute("height", "100");
			logoBox.setAttribute("alt", weatherShort);

			let degreeBox = document.getElementById('degree');
			degreeBox.textContent = tempC;



		});

		function Unix_timestamp(t) {

			var dt = new Date(t*1000);
			var hr = dt.getHours();
			var m = "0" + dt.getMinutes();
			var s = "0" + dt.getSeconds();
			return hr+ ':' + m.substr(-2) + ':' + s.substr(-2);  
		}
	};											
};

weatherBuenosAires = new weather("Buenos%20Aires");

weatherBuenosAires.initWeather();