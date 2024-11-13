const API_KEY = "58480e518670640321afa57a7a1257fe";
const BASE_URL = "https://api.openweathermap.org/data/2.5/weather";

// Fetch current weather data for Tokyo, Japan
fetch(`${BASE_URL}?q=Tokyo,jp&appid=${API_KEY}&units=metric`)
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        const weatherInfo = document.getElementById('weather-info');
        
        // Display current weather data
        weatherInfo.innerHTML = `
            <p>Location: ${data.name}</p>
            <p>Temperature: ${data.main.temp} °C</p>
            <p>Weather: ${data.weather[0].description}</p>
            <p>Humidity: ${data.main.humidity}%</p>
        `;
    })
    .catch(error => {
        console.error('Error fetching weather data:', error);
        document.getElementById('weather-info').innerHTML = `<p>Unable to load weather data. Error: ${error.message}</p>`;
    });