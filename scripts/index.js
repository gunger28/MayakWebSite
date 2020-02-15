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

function sendForm() {
    document.querySelector('#form').addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = Object.fromEntries(new FormData(event.target).entries());
        const {message, mail, name} = formData;
        const body = `name=${name}&mail=${mail}&message=${message}`;

        url = '/php/mail.php';
        options = {
            method : 'POST',
            body,
            headers: {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
            }
        };

        const response = await fetch(url, options);
        const status = await response.text();

        if (+status === 1) {
            alert('Заявка успешно отправлена!');
            document.querySelectorAll('.inputs__input').forEach(input => input.value = '');
            document.querySelector('textarea').value = '';
        }
        else alert('Произошла ошибка, пожалуйста попробуйте позже');
    });
};

function redirection() {
    const links = document.querySelectorAll('.col');

    links.forEach(link => {
        const id = link.id;
        link.addEventListener('click', () => {
            switch (id) {
                case 'disolver':
                    window.location.href = '/pages/disolvers.php';
                    break;
                case 'reactors':
                    window.location.href = '/pages/reactors.php';
                    break;
                case 'biser':
                    window.location.href = '/pages/bisers.php';
                    break;
                case 'emk':
                    window.location.href = '/pages/emks.html';
                    break;
                case 'sirop':
                    window.location.href = '/pages/sirops.php';
                    break;
                case 'pros':
                    window.location.href = '/pages/proseiv.php';
                    break;
                default:
                    console.error('Произошла ошибка');
                    break;
            }
        })
    })
}

window.addEventListener('scroll', function() {
    if(pageYOffset > 139) {
        this.document.querySelector('.header__nav-wrapper').classList.add('fixed');
    } else {
        this.document.querySelector('.header__nav-wrapper').classList.remove('fixed');
    }
});

function ymapsInit() {
    const map = new ymaps.Map('map', {
        center : [54.766519, 83.094519],
        zoom: [17]
    });

    const placemark = new ymaps.Placemark([54.766519, 83.094519], {
        balloonContent : 'Г. Бердск, Переулок промышленный 2/1',
        hintContent : 'переулок промышленный 2/1'
    });
    map.geoObjects.add(placemark);
};

window.onload = () => {
    initializeSwiper();
    smoothyScroll();
    sendForm();
    redirection();
    ymaps.ready(ymapsInit);
}