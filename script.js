var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
        videoId: 'HKLnBv3wxUg',
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        showPopup();
    }
}

function showPopup() {
    document.getElementById('feedback-popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('feedback-popup').style.display = 'none';
}

// Close popup when clicking outside or on close button
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.close').addEventListener('click', closePopup);
    window.addEventListener('click', function(event) {
        var popup = document.getElementById('feedback-popup');
        if (event.target == popup) {
            closePopup();
        }
    });
});