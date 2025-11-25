document.addEventListener('DOMContentLoaded', () =>{
    fetch('http://127.0.0.1:8000/api/returnUser',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        credentials: 'include',
    }).then(async response => {
        const data = await response.json();

        if (!response.ok) { // если статус не 200-299
            console.error('Ошибка сервера:', data);
            alert(data.message || 'Ошибка регистрации');
            return;
        }

        console.log('Ответ сервера:', data);

        // document.cookie = "authToken=123456; path=/; max-age=2592000";
    })
    .catch(err => console.error('Ошибка:', err));
});