function weatherApp() {
  return {
    nextGoodWeather: "",
    countdown: "",
    emoji: "",
    showUmbrella: false,
    intervalId: null,

    init() {
      this.fetchData();
    },

    async fetchData() {
      const goodWeatherTime = this.findGoodWeather(window.mydata);
      const now = new Date();

      if (goodWeatherTime) {
        const nextWeatherDate = new Date(goodWeatherTime);
        if (nextWeatherDate <= now) {
          // Weather is already good
          this.nextGoodWeather = "The weather is currently good!";
          this.countdown = "Enjoy the nice weather now!";
          this.emoji = "😎🌞";
        } else {
          this.nextGoodWeather = `${nextWeatherDate} - ${nextWeatherDate.toLocaleTimeString()}`;
          const readableDate = nextWeatherDate.toLocaleDateString("en-US", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
          });
          this.nextGoodWeather = `${readableDate}`;

          this.updateCountdown(nextWeatherDate);
          const intervalId = setInterval(() => {
            const weatherIsNotGood = this.updateCountdown(nextWeatherDate);
            if (!weatherIsNotGood) {
              clearInterval(intervalId);
            }
          }, 1000);
        }
      } else {
        this.nextGoodWeather = "No ideal weather in the forecast.";
        this.countdown = "";
        this.emoji = "🤷‍♂️";
      }
    },

    updateCountdown(nextWeatherDate) {
      const now = new Date();
      const timeToGoodWeather = nextWeatherDate.getTime() - now.getTime();

      const weatherIsNotGood = timeToGoodWeather >= 0;

      if (weatherIsNotGood) {
        const hours = Math.floor(timeToGoodWeather / (1000 * 60 * 60));
        const minutes = Math.floor(
          (timeToGoodWeather % (1000 * 60 * 60)) / (1000 * 60)
        );
        const seconds = Math.floor((timeToGoodWeather % (1000 * 60)) / 1000);
        this.countdown = `${hours}h ${minutes}m ${seconds}s`;
        const totalHours = Number(
          (timeToGoodWeather / (1000 * 60 * 60)).toFixed(2)
        );

        if (totalHours > 48) {
          this.emoji = "🙄🕰️";
        } else if (totalHours > 24) {
          this.emoji = "😒⏳";
        } else if (totalHours > 12) {
          this.emoji = "🤔⌛";
        } else {
          this.emoji = "😊🌞";
        }
      } else {
        this.countdown = "Good weather is here!";
        this.emoji = "😎";
      }

      return weatherIsNotGood;
    },

    findGoodWeather(weatherData) {
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
    },
    shareToWhatsApp() {
      const websiteUrl = "https://lux.alexandersvozil.com"; // Replace with your actual website URL
      const text = `Next good weather in Luxembourg: ${this.nextGoodWeather}\nCountdown: ${this.countdown} ${this.emoji}\nCheck it out: ${websiteUrl}`;
      const whatsappUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(
        text
      )}`;
      window.open(whatsappUrl, "_blank");
    },
  };
}
