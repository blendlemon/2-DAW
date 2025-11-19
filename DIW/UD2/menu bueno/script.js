let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";

    document.body.style.backgroundImage = "url(images/rotating-earth.gif)";
}

window.addEventListener('wheel', function (event) {
    if (event.deltaY > 0) {
        plusSlides(1);
        playAudio('images/sonido.mp3');
    } else {
        plusSlides(-1);
        playAudio('images/sonido.mp3');
    }
});

var audio_;

function playAudio(src) {
    if (audio_) audio_.pause();
    const audio = audio_ = new Audio(src);
    audio.play();
    audio.currentTime = 0;
}