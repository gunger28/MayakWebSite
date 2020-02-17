
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

addSendFormListener();
