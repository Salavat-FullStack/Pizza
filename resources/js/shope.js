document.addEventListener('DOMContentLoaded', () => {

    const addShope = document.querySelector('.btn_add_shope');
    console.log(addShope);

    addShope.addEventListener('click',()=>{
        const pizzaData = returnData();
        console.log(pizzaData);

        const token = localStorage.getItem('authToken');

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

            addShope();

            // if (data.token) { 
            //     localStorage.setItem('authToken', data.token);
            // }
        })
        .catch(err => console.error('Ошибка:', err));

        function addShope(){
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
                allShope();
            })
            .catch(err => console.error('Ошибка:', err));
        }

        function allShope(){
            fetch('http://127.0.0.1:8000/api/all-shope', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(async response => {
                const data = await response.json();

                if (!response.ok) { // если статус не 200-299
                    console.error('Ошибка сервера:', data);
                    alert(data.message || 'Ошибка регистрации');
                    return;
                }
                console.log('Ответ сервера на добовление корзины:', data);
            })
            .catch(err => console.error('Ошибка:', err));
        }
    });

});
