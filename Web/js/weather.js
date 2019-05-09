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
			let wind = "Wind of " + windSpeed + 'mps at ' + windDirection + '°';

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

			let degreeMin = document.getElementById('degreeMin');
			degreeMin.textContent = "Minimum " + tempMinC;

			let degreeMax = document.getElementById('degreeMax');
			degreeMax.textContent = "Maximum " + tempMaxC;

			let humidityBox = document.getElementById('humidity');
			humidityBox.textContent = 'Humidity: ' + humidity;

			let visibilityBox = document.getElementById('visibility');
			visibilityBox.textContent = 'Visibility: ' + visibility;

			let windBox = document.getElementById('wind');
			windBox.textContent = wind;

			let sunsetBox = document.getElementById('sunset');
			sunsetBox.textContent = 'Sunset at ' + sunSet;

			let sunriseBox = document.getElementById('sunrise');
			sunriseBox.textContent = 'Sunrise at ' + sunRise;

			


		});

		function Unix_timestamp(t) {

			let dt = new Date(t*1000);
			let hr = dt.getHours();
			let m = "0" + dt.getMinutes();
			let s = "0" + dt.getSeconds();
			return hr+ ':' + m.substr(-2) + ':' + s.substr(-2);  
		}

		function startTime() {
			let today = new Date();
			let h = today.getHours();
			let m = today.getMinutes();
			let s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);

			let timeBox = document.getElementById('time');
			timeBox.textContent = h + ":" + m + ":" + s + '';
			
			let t = setTimeout(startTime, 1000);
		}

		function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
		}

		startTime();
	};											
};

weatherBuenosAires = new weather("Buenos%20Aires");

weatherBuenosAires.initWeather();