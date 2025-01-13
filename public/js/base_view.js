const toggle = document.getElementById('toggleVideo');
const video = document.getElementById('videoPlayer');

toggle.addEventListener('change', () => {
    if (toggle.checked) {
        video.pause();
    } else {
        video.play(); 
    }
});
