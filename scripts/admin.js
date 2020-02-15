function addListeners() {
    document
        .querySelector('.add__post')
        .addEventListener('click', openModalWindow);

    document
        .querySelectorAll('.delete__post')
        .forEach(button => button.addEventListener('click', deletePost));    

    document
        .querySelector('.window__content')
        .addEventListener('submit', sendForm);
};

function openModalWindow() {
    const modal = document.querySelector('.modal');
    const modalWindow = document.querySelector('.modal__window');

    modal.classList.remove('modal-hide', 'fadeOut'); // Чистим имеющиеся анимации
    modalWindow.classList.remove('zoomOut');

    modal.classList.add('modal-visible', 'fadeIn'); // Добавляем анимации открытия
    modalWindow.classList.add('zoomIn');

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

async function sendForm(event) {
    event.preventDefault();

    const formData = new FormData(event.target); // event.target - та самая форма

    const url = '/php/addPost.php';
    const options = {
        method : 'POST',
        body : formData
    };

    const response = await fetch(url, options);
    const data = await response.text();

    if (data === '1') window.location.reload();
    else {
        console.log(data);
        alert('Произошла ошибка!')
    }
}

async function deletePost() {
    const id = this.id;
    const img = this.nextElementSibling.nextElementSibling.children[0].getAttribute('src');
    const url = '/php/deletePost.php';
    const body = `id=${id}&img=${img}`;
    const options = {
        method : 'POST',
        body,
        headers: {
            "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
    };

    const response = await fetch(url, options);
    const data = await response.text();

    console.log(data);

    if (+data === 1) {
        this.parentNode.remove();
    } else {
        alert('Произошла ошибка!');
    };
}

window.onload = () => {
    addListeners();
}