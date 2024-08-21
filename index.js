document.addEventListener('DOMContentLoaded',function() {
    const carousel = document.querySelector('.carousel');
    const images = carousel.querySelectorAll('img');
    const prevBtn = carousel.querySelector('.prev');
    const nextBtn = carousel.querySelector('.next');
    let curretIndex = 0;

    let intervalid;

    function showImage(index) {
        images[curretIndex].classList.remove('active');
        images[index].classList.add('active');
        curretIndex = index;
    }

    function prevImage() {
        let index = curretIndex = -1;
        if (index < 0) index = images.length -1;
        showImage(index);
    }
    
    function nextImage() {
        let index = curretIndex + 1;
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

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('rsvp-form');
    const responseMessage = document.getElementById('response-message');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const nameInput = document.getElementById('name').value;
        
        responseMessage.textContent = `Terima kasih, ${nameInput}! Kehadiran Anda akan kami tunggu.`;

        form.reset();
    });
});