function shareData() {
  return {
    shareDetails: {
      title: "Laughembourg Weather App",
      text: "The app that finds fun activities even when it rains",
      url: "https://lux.alexandersvozil.com",
      image: "https://lux.alexandersvozil.com/meme.jpg",
    },
    share() {
      if (navigator.share) {
        navigator
          .share(this.shareDetails)
          .then(() => console.log("Successful share"))
          .catch((error) => console.log("Error sharing:", error));
      } else {
        alert(
          "Web Share API is not supported in your browser. You can manually copy the URL to share."
        );
      }
    },
  };
}
