





function validazione(event){
    if(form.nome.value.length== 0 ||
        form.cognome.value.length== 0 ||
        form.email.value.length== 0 ||
        form.password.value.length== 0 ||
        form.confermapassword.value.length== 0 ||
        form.username.value.length== 0 ||
        (form.genere.checked)==false ||
        (form.autorizzo.checked)==false )
    {
        alert("Compilare tutti i campi");

        //specificare qualcosa accanto al campo incriminato,aggiungere una classe che contorni di rosso
        event.preventDefault();
    }
}

//controllo lato client validazione form
const form=document.querySelector("form");

form.addEventListener("submit",validazione)

//------------------------------------------------------------------------------------------------

function checkName(event) {
    const input = event.currentTarget;
    
   
    if (formStatus[input.name] = input.value.length > 0) {
        input.classList.remove('errorj');
        document.querySelector('.error').textContent = "";
    } else {
        input.classList.add('errorj');
        document.querySelector('.error').textContent = "Inserire nome e/o cognome";
    }
    
    checkForm();
}

function jsonCheckUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) {
        document.querySelector('[name="username"]').classList.remove('errorj');
        document.querySelector('.error').textContent = "";
    } else {
        document.querySelector('.error').textContent = "Nome utente già utilizzato";
        document.querySelector('[name="username"]').classList.add('errorj');
    }
    checkForm();
}

function jsonCheckEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('[name="email"]').classList.remove('errorj');
        document.querySelector('.error').textContent = "";
    } else {
        document.querySelector('.error').textContent = "Email già utilizzata";
        document.querySelector('[name="email"]').classList.add('errorj');
    }
    checkForm();
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('[name="username"]');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        //input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.classList.add('errorj');
        formStatus.username = false;
        checkForm();
    } else {
        fetch(REGISTER_ROUTE+"/username/"+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}

function checkEmail(event) {
    const emailInput = document.querySelector('[name="email"]');
    
        if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.error').textContent = "Email non valida";
        document.querySelector('[name="email"]').classList.add('errorj');
        formStatus.email = false;
        checkForm();
    } else {
        fetch(REGISTER_ROUTE+"/email/"+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
        document.querySelector('.error').textContent = "";
    }
}

function checkPassword(event) {
    const passwordInput = document.querySelector('[name="password"]');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('[name="password"]').classList.remove('errorj');
        document.querySelector('.error').textContent = "";
    } else {
        document.querySelector('[name="password"]').classList.add('errorj');
        document.querySelector('.error').textContent = "Password troppo corta";
    }
    checkForm();
}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('[name="confermapassword"]');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('[name="password"]').value) {
        document.querySelector('[name="confermapassword"]').classList.remove('errorj');
        document.querySelector('.error').textContent = "";
    } else {
        document.querySelector('[name="confermapassword"]').classList.add('errorj');
        document.querySelector('.error').textContent = "Password non coincidente";
    }
    checkForm();
}

function checkForm() {
    // Controlla consenso dati personali
    document.getElementById('btn').disabled = !document.querySelector('[name="autorizzo"]').checked || 
    // Controlla che tutti i campi siano pieni
    Object.keys(formStatus).length !== 7 || 
    // Controlla che i campi non siano false
    Object.values(formStatus).includes(false);
}

const formStatus = {'upload': true};
document.querySelector('[name="nome"]').addEventListener('blur', checkName);
document.querySelector('[name="cognome"]').addEventListener('blur', checkName);
document.querySelector('[name="username"]').addEventListener('blur', checkUsername);
document.querySelector('[name="email"]').addEventListener('blur', checkEmail);
document.querySelector('[name="password"]').addEventListener('blur', checkPassword);
document.querySelector('[name="confermapassword"]').addEventListener('blur', checkConfirmPassword);


document.querySelector('[name="autorizzo"]').addEventListener('change', checkForm);

/*
if (document.querySelector('.error') !== null) {
    checkUsername(); checkPassword(); checkConfirmPassword(); checkEmail();
    document.querySelector('[name="nome"]').dispatchEvent(new Event('blur'));
    document.querySelector('[name="cognome"]').dispatchEvent(new Event('blur'));
}
*/