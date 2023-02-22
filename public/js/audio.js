var sound = false;
var v = document.querySelector('audio');

document.querySelector('#audio').addEventListener("click", function () {
    if (!sound) {
        v.play();
        this.innerHTML = `<i class="fa-solid fa-pause"></i>`;
    } else {
        v.pause();
        this.innerHTML = `<i class='fa-solid fa-play'></i>`;
    }
    sound = !sound;
});