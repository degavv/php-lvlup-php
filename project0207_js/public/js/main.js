const buttons = document.querySelectorAll('div.button');
const uploadForm = document.querySelector('form.form-upload');

function assignActiveImg() {
    let images = document.querySelectorAll('div.img-container img');

    if (images.length > 0) {
        images[0].classList.add('active');
    }
}

function createSlider() {

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            let images = document.querySelectorAll('div.img-container img');
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
    document.querySelector('div.img-container').addEventListener('click', function (e) {
        if (e.target.classList.contains('active')) {
            e.target.classList.toggle('scale');
        }
    });
}

function getImages(callback) {
    let xhr = new XMLHttpRequest();

    xhr.open('POST', '/?controller=api&action=all_photos');
    xhr.send();
    xhr.onload = function () {
        if (xhr.status == 200) {
            callback(JSON.parse(xhr.responseText));
        }
    }
}

function generateAltForImage(imageName) {
    let nameWithoutId = imageName.split('_')[1] || '';
    //видаляємо розширення
    let nameWithoutExt = nameWithoutId.replace(/\.[^/.]+$/, '');
    //замінюємо - та _ на пробіл
    let cleanName = nameWithoutExt.replace(/[-_]/g, ' ');

    return cleanName;
}

function showImages(response) {
    let images = response['photos'];
    let path = response['path'];
    let html = '';
    let imgContainer = document.querySelector('div.img-container');

    for (let image of images) {
        html += `<img class="gallery-image" src="${path}${image}" alt="${generateAltForImage(image)}">`;
    }
    imgContainer.innerHTML = html;
    assignActiveImg();
}

function showNotifications(notificationsList, statusCode) {
    let notification = document.createElement('div');
    notification.className = 'notification';
    let code = String(statusCode);

    if (code[0] == 2) {
        notification.classList.add('success');
    } else {
        notification.classList.add('error');
    }

    notification.innerText = notificationsList[0];
    //close button
    let close = document.createElement('div');
    close.className = 'close-button';

    let page = document.querySelector('div.page');
    page.append(notification);
    notification.append(close);
    closeNotification();
    setTimeout(function () {
        document.querySelector('div.notification').remove();
    }, 4000);
}

function closeNotification() {
    let closeButton = document.querySelector('div.close-button');
    closeButton.addEventListener('click', function () {
        document.querySelector('div.notification').remove();
    });
}

function uploadImage() {
    uploadForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/?controller=api&action=upload_photo');

        xhr.send(formData);
        this.reset();
        xhr.onload = function () {
            let msg = [];
            if (xhr.status == 201) {
                msg[0] = "Upload successful";
                getImages(showImages);
            } else if (xhr.status == 422) {
                let response = this.responseText;
                msg[0] = JSON.parse(response)['errors'];
            }
            showNotifications(msg, xhr.status);
        }
    });
}

function init() {
    assignActiveImg();
    createSlider();
    addScale();
    uploadImage();
}

init();