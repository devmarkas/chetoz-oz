jQuery(function ($) {    
    
    // Add your animation code here
    const animationDiv = `
<div class="idle-animation">
  <div class='box-outer'>
    <div class='main_box'>
      <div class='bar top'></div>
      <div class='bar right delay'></div>
      <div class='bar bottom delay'></div>
      <div class='bar left'></div>
    </div>
  </div>
</div>
`;

    $("body").append(animationDiv);

    // Hide the animation by default
    $(".idle-animation").hide();

    // Function to show the animation when idle
    function showAnimation() {
        $(".idle-animation").show();
    }

    // Function to hide the animation when active again
    function hideAnimation() {
        $(".idle-animation").hide();
    }

    // Set the time (in milliseconds) for idle timeout
    const idleTimeout = 300000; // 5 minutes in milliseconds

    // Initialize the idle timer
    let idleTimer;

    function resetIdleTimer() {
        clearTimeout(idleTimer);
        idleTimer = setTimeout(showAnimation, idleTimeout);
    }

    // Reset the idle timer on user activity
    $(document).on("mousemove keydown scroll", function () {
        hideAnimation();
        resetIdleTimer();
    });

    // Initialize the idle timer
    resetIdleTimer();
});
