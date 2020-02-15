function initializeSwiper() {
    const mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
    
        // If we need pagination
        pagination: {
          el: '.swiper-pagination',
        },
    
        // Navigation arrows
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      })
}


function addModalListener() {
    document.querySelectorAll('.col').forEach(item => item.addEventListener('click', getData));
};

async function getData(event) {
    const  id = this.id;

    const url = '/php/getInfo.php';
    const body = `id=${id}`;
    const options = {
        method : 'POST',
        body,
        headers: {
            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
    };

    const response = await fetch(url, options);
    const data = await response.json();
    
    const {name, bigDescr, img} = data;
    
    openModalWindow(name, bigDescr, img);
}

function openModalWindow(name, bigDescr, img) {
    const modal = document.querySelector('.modal');
    const modalWindow = document.querySelector('.modal__window');

    modal.classList.remove('modal-hide', 'fadeOut'); // Чистим имеющиеся анимации
    modalWindow.classList.remove('zoomOut');

    modal.classList.add('modal-visible', 'fadeIn'); // Добавляем анимации открытия
    modalWindow.classList.add('zoomIn');

    document.querySelector('.window__title').textContent = name;
    document.querySelector('.window__img').src = img;
    document.querySelector('.window__descr').textContent = bigDescr;

    modal.addEventListener('click', event => {
        if(event.target.classList.contains('modal') // Проверка нажатие по фону или кнопке
        || event.target.classList.contains('window__close'))
            closeWindow(modal, modalWindow);
    });
}

function closeWindow(modal, modalWindow) {
    modal.classList.remove('fadeIn'); // Чистим имеющиеся анимации
    modalWindow.classList.remove('zoomIn');

    modal.classList.add ('modal-hide', 'fadeOut'); // Добавляем анимации закрытия
    modalWindow.classList.add('zoomOut');

    setTimeout(function() {
        modal.classList.remove('modal-visible'); // После того как анимация сыграла убираем модалку
    }, 500)
};

function addSendFormListener() {
    document.querySelector('#form').addEventListener('submit', sendForm);
};

async function sendForm(event) {
    event.preventDefault();

    const formData = Object.fromEntries(new FormData(event.target).entries());
    const url = '/php/sendOrder.php';
    const options = {
        method : 'POST',
        body: new FormData(event.target)
    };

    const response = await fetch(url, options);
    const data = await response.text();

    if (+data === 1) {
        alert('Заявка успешно отправлена!');
        window.location.reload();
    } else {
        alert('Произошла ошибка!');
    };
};

window.onload = () => {
    initializeSwiper();
    addModalListener();
    addSendFormListener();
}