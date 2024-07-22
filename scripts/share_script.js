function shareData() {
  return {
    shareDetails: {
      title: "Your Website Title",
      text: "Check out this awesome website!",
      url: "https://yourwebsite.com",
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
