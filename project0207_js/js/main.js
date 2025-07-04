const images = document.querySelectorAll('section.gallery img');
const buttons = document.querySelectorAll('div.button');

function slider() {
    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            let activeId = null;
            let step = button.classList.contains('next-button') ? 1 : -1;

            for (let i = 0; i < images.length; i++) {
                if (images[i].classList.contains('active')) {
                    activeId = i;
                    break;
                }
            }

            if (activeId !== null) {
                let next = activeId + step;
                if (next < 0) {
                    next = images.length - 1;
                } else if (next >= images.length) {
                    next = 0;
                }
                images[activeId].classList.remove('active');
                images[next].classList.add('active');
            }
        })
    });
}

function addScale() {
    document.querySelector('section.gallery').addEventListener('click', function (e) {
        console.log(e.target);
        if (e.target.classList.contains('active')) {
            e.target.classList.toggle('scale');
        }
    });
}
slider();
addScale();