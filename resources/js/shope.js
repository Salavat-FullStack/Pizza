import { allShope, addShope } from './shope_function.js';

document.addEventListener('DOMContentLoaded', async () => {

    const addShopeBtn = document.querySelector('.btn_add_shope');

    let token = localStorage.getItem('authToken');

    const pizzaData = await allShope(token);

    console.log('shope allShope result', pizzaData);

    if(addShopeBtn){
        addShopeBtn.addEventListener('click',()=>{
            const pizzaData = returnData();
            console.log(pizzaData);

            token = localStorage.getItem('authToken');

            fetch('http://127.0.0.1:8000/me', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                })
            .then(async response => {
                const data = await response.json();

                if (!response.ok) { // если статус не 200-299
                    console.error('Ошибка сервера:', data);
                    alert(data.message || 'Ошибка регистрации');
                    return;
                }

                console.log('Ответ сервера:', data);

                addShope(token);
            })
            .catch(err => console.error('Ошибка:', err));
        });
    }



});
