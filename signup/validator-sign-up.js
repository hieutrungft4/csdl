function show_pass() {
    let x = document.getElementById('password');
    let y = document.getElementById('confirm-password');

    if (x.type === 'password' && y.type === 'password') {
        x.type = 'text';
        y.type = 'text'
    } 
    else {
        x.type = 'password';
        y.type = 'password';
    }
}

function validate(inputElement, rule) {
    let errorMessage = rule.test(inputElement.value); 
    let errorElement = inputElement.parentElement.querySelector('.form-message');

    if (errorMessage) {
        errorElement.innerText = errorMessage;
        inputElement.style.borderColor = 'rgb(190, 42, 42)';
    }
    else {
        errorElement.innerText = '';
        inputElement.style.borderColor = 'springgreen';
    }

    let password = document.querySelector('#password');
    let cf_password = document.querySelector('#confirm-password');

    if (password.value === cf_password.value) {
        password.style.borderColor = 'springgreen';
        cf_password.style.borderColor = 'springgreen';
    }
    else {
        password.style.borderColor = 'rgb(190, 42, 42)';
        cf_password.style.borderColor = 'rgb(190, 42, 42)';
    }
}

function Validator(options) {
    let formEle = document.querySelector(options.form);

    if (formEle) {
        options.rules.forEach((rule) => {
            let inputEle = formEle.querySelector(rule.selector);

            if (inputEle) {
                inputEle.onkeyup = function() {
                    validate(inputEle, rule);
                }
            }
        });
    }
}

Validator.isRequired = (selector) => {
    return {
        selector: selector,
        test: (value) => {
            return value.trim() ? undefined : 'Please enter this field';
        }
    };
}

Validator.isPassword = (selector) => {
    return {
        selector: selector,
        test: (value) => {
            return value ? undefined : 'Please enter this field';
        }
    };
}

Validator.isCfPassword = (selector) => {
    return {
        selector: selector,
        test: (value) => {
            return value ? undefined : 'Please enter this field';
        }
    }
}

function checkPassword(password, cfPassword) {
    let x = document.querySelector(password).value;
    let y = document.querySelector(cfPassword).value;

    let inputElement1 = document.querySelector(password);
    let inputElement2 = document.querySelector(cfPassword);

    if (x !== y) {
        inputElement1.style.borderColor = 'rgb(190, 42, 42)';
        inputElement2.style.borderColor = 'rgb(190, 42, 42)';
    }
    else {
        inputElement1.style.borderColor = 'springgreen';
        inputElement2.style.borderColor = 'springgreen';
    }
}
