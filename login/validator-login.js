// show/hidden password
function show_pass() {
    let x = document.getElementById('password');

    if (x.type === 'password') {
        x.type = 'text';
    } 
    else {
        x.type = 'password';
    }
}

function validate(inputElement, rule) {
    var errorMessage = rule.test(inputElement.value);
    var errorElement = inputElement.parentElement.querySelector('.form-message');

    if (errorMessage) {
        errorElement.innerText = errorMessage;
        inputElement.style.borderColor = 'rgb(190, 42, 42)';
    }
    else {
        errorElement.innerText = '';
        inputElement.style.borderColor = 'springgreen';
    }
}

// Object Validator
function Validator(options) {
    var formElement = document.querySelector(options.form);
    
    if (formElement) { // if exists
        options.rules.forEach((rule) => {
            var inputElement = formElement.querySelector(rule.selector);
            
            if (inputElement) {
                inputElement.onkeyup = function() {
                    validate(inputElement, rule);
                }
            }
        });
    }
}

// 
Validator.isRequired = function(selector) {
    return {
        selector: selector,
        test: (value) => {
            return value.trim() ? undefined : 'Please enter this field';
        }
    };
}

Validator.isPassword = function(selector) {
    return {
        selector: selector,
        test: (value) => {
            return value ? undefined : 'Please enter this field';
        }
    };
}