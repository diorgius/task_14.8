const formlogin = document.querySelector('#formlogin');
const divwrap = document.querySelector('#divwrap');
const loginButton = document.querySelector('#loginButton');
const regButton = document.querySelector('#regButton');

regButton.addEventListener('click', (e) => {
    e.preventDefault();
    const nameField = document.createElement('input');
    const labelNameField = document.createElement('label');
    const birthdayField = document.createElement('input');
    const labelBirthdayField = document.createElement('label');
    const regButtonEntry= document.createElement('button');

    labelNameField.setAttribute('for', 'name');
    labelNameField.textContent = 'Ваше имя';
    nameField.classList.add('input-login');
    nameField.type = 'text';
    nameField.setAttribute('id', 'name');
    nameField.setAttribute('name', 'name');
    nameField.setAttribute('placeholder', 'имя');
    nameField.setAttribute('required', 'true');

    labelBirthdayField.setAttribute('for', 'birthday');
    labelBirthdayField.textContent = 'Ваша дата рождения';
    birthdayField.classList.add('input-login');
    birthdayField.setAttribute('id', 'birthday');
    birthdayField.setAttribute('name', 'birthday');
    birthdayField.setAttribute('required', 'true');
    birthdayField.type = 'date';
    
    regButtonEntry.classList.add('button-login');
    regButtonEntry.setAttribute('id', 'regButtonEntry');
    regButtonEntry.setAttribute('value', 'registration');
    regButtonEntry.setAttribute('name', 'submit');
    regButtonEntry.type = 'submit';
    regButtonEntry.textContent = 'Зарегистрироваться';
    
    formlogin.removeChild(regButton);
    formlogin.removeChild(loginButton);
    divwrap.append(labelNameField, nameField, labelBirthdayField, birthdayField, regButtonEntry);
});