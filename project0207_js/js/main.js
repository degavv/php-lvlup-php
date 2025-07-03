const images = document.querySelectorAll('section.gallery img');
const buttons = document.querySelectorAll('div.button');

function slider() {

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            let active = null;

            for (let i = 0; i < images.length; i++) {
                if (images[i].classList.contains('active')) {
                    active = i;
                    break;
                }
            }
            let step = button.classList.contains('next-button') ? 1 : -1;
            if (active !== null) {
                images[active].classList.remove('active');
                let next = active + step;
                if (next >= images.length){
                    next = 0;
                }
                images[active + next].classList.add('active');
                console.log(active);
            }
        })
    });
}
slider();