
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

function redirection() {
    const links = document.querySelectorAll('.block');

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

addSendFormListener();

window.onload = () => {
    
    redirection();
   
}