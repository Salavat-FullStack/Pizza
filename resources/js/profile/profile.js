document.addEventListener('DOMContentLoaded', () =>{
    fetch('http://127.0.0.1:8000/api/returnUser',{
        method: 'POST',
        headers: {
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

        await fetch('http://127.0.0.1:8001/api/set-cookie', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            credentials: 'include', 
            body: JSON.stringify(data)
        });

        console.log('Ответ сервера:', data);
    })
    .catch(err => console.error('Ошибка:', err));

    const avatarFormBtn = document.getElementById('avatarFormBtn');

    document.getElementById('avatarFormBtn').addEventListener('click', async (e) => {
        e.preventDefault();

        const fileInput = document.getElementById('avatar');

        console.log(fileInput);

        const formData = new FormData();
        formData.append('avatar', fileInput.files[0]);

        fetch('http://127.0.0.1:8000/api/updateAvatar',{
            method: 'POST',
            body: formData,
            credentials: 'include',
        }).then(async response => {
            const data = await response.json();

            if (!response.ok) {
                console.error('Ошибка сервера:', data);
                alert(data.message || 'Ошибка регистрации');
                return;
            }

            await fetch('http://127.0.0.1:8001/api/set-cookie', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                credentials: 'include', // важно для установки cookie
                body: JSON.stringify(data)
            });

            window.location.reload();

            console.log('Ответ сервера:', data);
        })
        .catch(err => console.error('Ошибка:', err));
    })

});