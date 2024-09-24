    document.addEventListener('DOMContentLoaded',function() {
    const carousel = document.querySelector('.carousel');
    const images = carousel.querySelectorAll('img');
    const prevBtn = carousel.querySelector('.prev');
    const nextBtn = carousel.querySelector('.next');
    let currentIndex = 0;

    let intervalid;

    function showImage(index) {
        images[currentIndex].classList.remove('active');
        images[index].classList.add('active');
        currentIndex = index;
    }

    function prevImage() {
        let index = currentIndex = -1;
        if (index < 0) index = images.length -1;
        showImage(index);
    }
    
    function nextImage() {
        let index = currentIndex + 1;
        if (index >= images.length) index = 0;
        showImage(index);
    }

    function startautoslide() {
        intervalid = setInterval(nextImage, 5000);
    }
    prevBtn.addEventListener('click',function () {
        prevImage(); 
    });
    nextBtn.addEventListener('click',function () {
        nextImage();
    });

    startautoslide();

});