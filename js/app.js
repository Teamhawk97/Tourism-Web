
// Section header with login Form 

let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");
let formBtn = document.querySelector("#login-btn");
let menuBtn = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");



window.onscroll = function () { 
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menuBtn.classList.remove("fa-times"); 
    navbar.classList.remove("active");
    loginForm.classList.remove("active");
};



// Section home
  // Array of video sources from the buttons
  const videoSources = Array.from(document.querySelectorAll('.vid-btn')).map(btn => btn.getAttribute('data-src'));

  // Initial video index
  let currentVideoIndex = 0;

  // Select the video player
  const videoPlayer = document.querySelector("#video-slider");

  // Add click event to each video button
  document.querySelectorAll(".vid-btn").forEach((btn, index) => { 
    btn.addEventListener("click", () => {
      // Remove active class from the currently active button
      document.querySelector(".controls .active").classList.remove("active");

      // Add active class to the clicked button
      btn.classList.add("active");

      // Set the new video index
      currentVideoIndex = index;

      // Update the video source and play
      updateAndPlayVideo(videoSources[currentVideoIndex]);
    });
  });

  // Function to update video source and play
  function updateAndPlayVideo(src) {
    videoPlayer.src = src;
    videoPlayer.load();
    videoPlayer.play();
  }

  // Event listener for when the video ends
  videoPlayer.addEventListener("ended", () => {
    currentVideoIndex++;

    // If all videos have been played, loop back to the first video
    if (currentVideoIndex >= videoSources.length) {
      currentVideoIndex = 0;
    }

    // Automatically switch the active button
    document.querySelector(".controls .active").classList.remove("active");
    document.querySelectorAll(".vid-btn")[currentVideoIndex].classList.add("active");

    // Play the next video
    updateAndPlayVideo(videoSources[currentVideoIndex]);
  });

