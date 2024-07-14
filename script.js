const nextGoodWeather = document.getElementById('nextGoodWeather');
const countdown = document.getElementById('countdown');
const emoji = document.getElementById('emoji');
const shareButton = document.getElementById('shareButton');

const fetchData = async () => {
  const goodWeatherTime = findGoodWeather(window.mydata);

  if (goodWeatherTime) {
    const nextWeatherDate = new Date(goodWeatherTime);
    setNextGoodWeather(
      `${nextWeatherDate} - ${nextWeatherDate.toLocaleTimeString()}`
    );
    const readableDate = nextWeatherDate.toLocaleDateString('en-US', {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
    });
    setNextGoodWeather(`${readableDate}`);

    updateCountdown(nextWeatherDate);
    const intervalId = setInterval(() => {
      const weatherIsNotGood = updateCountdown(nextWeatherDate);
      if (!weatherIsNotGood) {
        clearInterval(intervalId);
      }
    }, 1000);
  } else {
    setNextGoodWeather('No ideal weather in the forecast.');
    setCountdown('');
    setEmoji('🤷‍♂️');
  }
};

function updateCountdown(nextWeatherDate) {
  const now = new Date();
  const timeToGoodWeather = nextWeatherDate.getTime() - now.getTime();

  const weatherIsNotGood = timeToGoodWeather >= 0;

  if (weatherIsNotGood) {
    const hours = Math.floor(timeToGoodWeather / (1000 * 60 * 60));
    const minutes = Math.floor(
      (timeToGoodWeather % (1000 * 60 * 60)) / (1000 * 60)
    );
    const seconds = Math.floor((timeToGoodWeather % (1000 * 60)) / 1000);
    setCountdown(`${hours}h ${minutes}m ${seconds}s`);
    const totalHours = Number(
      (timeToGoodWeather / (1000 * 60 * 60)).toFixed(2)
    );

    if (totalHours > 48) {
      setEmoji('🙄🕰️');
    } else if (totalHours > 24) {
      setEmoji('😒⏳');
    } else if (totalHours > 12) {
      setEmoji('🤔⌛');
    } else {
      setEmoji('😊🌞');
    }
  } else {
    setCountdown('Good weather is here!');
  }

  return weatherIsNotGood;
}

function findGoodWeather(weatherData) {
  for (const day of weatherData.forecast.forecastday) {
    for (const hour of day.hour) {
      if (
        hour.will_it_rain === 0 &&
        hour.will_it_snow === 0 &&
        hour.cloud < 20 &&
        hour.temp_c >= 15
      ) {
        return hour.time;
      }
    }
  }
  return null;
}

function generateShareText() {
  const websiteUrl = 'https://lux.alexandersvozil.com'; // Replace with your actual website URL
  return `Next good weather in Luxembourg: ${nextGoodWeather}\nCountdown: ${countdown} ${emoji}\nCheck it out: ${websiteUrl}`;
}

function shareToWhatsApp() {
  const text = generateShareText();
  const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(
    text
  )}`;
  window.open(whatsappUrl, '_blank');
}

function setNextGoodWeather(text) {
  nextGoodWeather.innerHTML = text;
}

function setCountdown(text) {
  countdown.innerHTML = text;
}

function setEmoji(text) {
  emoji.innerHTML = text;
}

shareButton.addEventListener('click', function () {
  shareToWhatsApp();
});

fetchData();
