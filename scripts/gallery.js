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


function smoothyScroll() {
    const anchors = [...document.querySelectorAll('a[href^="#"]')];

    anchors.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const id = link.getAttribute('href');
            document.querySelector(id).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });
};

function addModalListener() {
    document.querySelectorAll('.row__img_small img').forEach(item => item.addEventListener('click', getData));
};

async function getData(event) {
    const  src = this.getAttribute('src');
    
    openModalWindow(src);
}

function openModalWindow(src) {
    const modal = document.querySelector('.modal');
    const modalWindow = document.querySelector('.modal__window');

    modal.classList.remove('modal-hide', 'fadeOut'); // Чистим имеющиеся анимации
    modalWindow.classList.remove('zoomOut');

    modal.classList.add('modal-visible', 'fadeIn'); // Добавляем анимации открытия
    modalWindow.classList.add('zoomIn');

    document.querySelector('.window__img-img').setAttribute('src', src);

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

window.addEventListener('scroll', function() {
    if(pageYOffset > 139) {
        this.document.querySelector('.header__nav-wrapper').classList.add('fixed');
    } else {
        this.document.querySelector('.header__nav-wrapper').classList.remove('fixed');
    }
});

window.onload = () => {
    smoothyScroll();
    initializeSwiper();
    addModalListener();
}