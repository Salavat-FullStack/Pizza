document.addEventListener('DOMContentLoaded', () => {
    const btnForm = document.querySelector('.btn_form');
    const inputBox = document.querySelectorAll('.register_input_box');

    const formData = {
        'email' : '',
        'password' : '',
        'token': ''
    }

    btnForm.addEventListener('click',()=>{
        inputBox.forEach((elem)=>{
            const input = elem.querySelector('input');
            
            formData[input.id] = input.value;
            console.log(formData[input.id]);
        });
        console.log(localStorage.getItem('authToken'));
        if(localStorage.getItem('authToken')){
            const token = localStorage.getItem('authToken');

            formData.token = token;
        }
        fetch('http://127.0.0.1:8000/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) { 
                console.error('Ошибка сервера:', data);
                alert(data.message || 'Ошибка регистрации');
                return;
            }

            console.log('Ответ сервера:', data);

            if (data.token) { 
                localStorage.setItem('authToken', data.token);
            }
        })
        .catch(err => console.error('Ошибка:', err));
    });


});