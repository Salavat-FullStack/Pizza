export function addShope(token, pizzaData){
        fetch('http://127.0.0.1:8000/api/add-shope', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({ pizzaData: pizzaData })
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) { // если статус не 200-299
                console.error('Ошибка сервера:', data);
                alert(data.message || 'Ошибка регистрации');
                return;
            }
            console.log('Ответ сервера на добовление корзины:', data);
            allShope(token);
        })
        .catch(err => console.error('Ошибка:', err));
}

export async function allShope(token = localStorage.getItem('authToken')) {
    console.log('function allShope token = ', token);
    try {
        const response = await fetch('http://127.0.0.1:8000/api/all-shope', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            credentials: 'include'
        });

        const data = await response.json();

        if (!response.ok) {
            console.error('Ошибка сервера:', data);
            alert(data.message || 'Ошибка регистрации');
            return;
        }

        console.log('Ответ сервера просмотр корзины:', data);

        returnDataLength(data);

        return data;

    } catch (err) {
        console.error('Ошибка:', err);
    }
}

export async function returnDataLength(data){
    console.log(data.length);
    const basket = document.querySelector('.basket');

    const basketLength = document.createElement('p');
    basketLength.classList.add('basket_length');
    basketLength.textContent = data.length;

    basket.appendChild(basketLength);
}