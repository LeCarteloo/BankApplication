function CustomValidation(input) {
    this.invalidities = [];
    this.validityChecks = [];

    //add reference to the input node
    this.inputNode = input;

    //trigger method to attach the listener
    this.registerListener();
}

CustomValidation.prototype = {
    addInvalidity: function(message) {
        this.invalidities.push(message);
    },
    getInvalidities: function() {
        return this.invalidities.join('. \n');
    },
    checkValidity: function(input) {
        for ( var i = 0; i < this.validityChecks.length; i++ ) {

            var isInvalid = this.validityChecks[i].isInvalid(input);
            if (isInvalid) {
                this.addInvalidity(this.validityChecks[i].invalidityMessage);
            }

            var requirementElement = this.validityChecks[i].element;

            if (requirementElement) {
                if (isInvalid) {
                    requirementElement.classList.add('invalid');
                    requirementElement.classList.remove('valid');
                } else {
                    requirementElement.classList.remove('invalid');
                    requirementElement.classList.add('valid');
                }

            } // end if requirementElement
        } // end for
    },
    checkInput: function() { // checkInput now encapsulated

        this.inputNode.CustomValidation.invalidities = [];
        this.checkValidity(this.inputNode);

        if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
            this.inputNode.setCustomValidity('');
        } else {
            var message = this.inputNode.CustomValidation.getInvalidities();
            this.inputNode.setCustomValidity(message);
        }
    },
    registerListener: function() { //register the listener here

        var CustomValidation = this;

        this.inputNode.addEventListener('keyup', function() {
            CustomValidation.checkInput();
        });


    }

};

var usernameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 6;
        },
        invalidityMessage: 'To pole musi mieć przynajmniej sześć znaków',
        element: document.querySelector('label[for="login"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function(input) {
            var illegalCharacters = input.value.match(/[^a-zA-Z0-9]/g);
            return illegalCharacters ? true : false;
        },
        invalidityMessage: 'Tylko cyfry i litery są dozwolone',
        element: document.querySelector('label[for="login"] .input-requirements li:nth-child(2)')
    }
];

var passwordValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.length < 8;
        },
        invalidityMessage: 'To pole musi mieć przynajmniej osiem znaków',
        element: document.querySelector('label[for="password"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function(input) {
            return !input.value.match(/[\!\@\#\$\%\^\&\*]/g);
        },
        invalidityMessage: 'To pole musi mieć przynajmniej jeden symbol specjalny',
        element: document.querySelector('label[for="password"] .input-requirements li:nth-child(2)')
    }
];

var passwordRepeatValidityChecks = [
    {
        isInvalid: function() {
            return passwordRepeatInput.value != passwordInput.value;
        },
        invalidityMessage: 'Hasła muszą być takie same',
        element: document.querySelector('label[for="password_repeat"] .input-requirements li:nth-child(1)')
    }
];

var nameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^a-zA-Z]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko litery',
        element: document.querySelector('label[for="name"] .input-requirements li:nth-child(1)')
    }
];

var surnameValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^a-zA-Z]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko litery',
        element: document.querySelector('label[for="surname"] .input-requirements li:nth-child(1)')
    }
];

var peselValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^0-9]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko cyfry',
        element: document.querySelector('label[for="pesel"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function(input) {
            return input.value.length != 11;
        },
        invalidityMessage: 'To pole musi mieć długość jedenastu cyfr',
        element: document.querySelector('label[for="pesel"] .input-requirements li:nth-child(2)')
    }
];

var emailValidityChecks = [
    {
        isInvalid: function(input) {
            return !input.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g)
        },
        invalidityMessage: 'To pole powinno mieć format e-mailu',
        element: document.querySelector('label[for="email"] .input-requirements li:nth-child(1)')
    }
];

var telephoneValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^0-9]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko cyfry',
        element: document.querySelector('label[for="telephone"] .input-requirements li:nth-child(1)')
    },
    {
        isInvalid: function(input) {
            return input.value.length != 9;
        },
        invalidityMessage: 'To pole musi mieć długość dziewięciu cyfr',
        element: document.querySelector('label[for="telephone"] .input-requirements li:nth-child(2)')
    }
];

var cityValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^a-zA-Z]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko litery',
        element: document.querySelector('label[for="city"] .input-requirements li:nth-child(1)')
    }
];

var streetValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^a-zA-Z]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko litery',
        element: document.querySelector('label[for="street"] .input-requirements li:nth-child(1)')
    }
];

var numberValidityChecks = [
    {
        isInvalid: function(input) {
            return input.value.match(/[^0-9]/g)
        },
        invalidityMessage: 'To pole powinno zawierać tylko cyfry',
        element: document.querySelector('label[for="number"] .input-requirements li:nth-child(1)')
    }
];

var codeValidityChecks = [
    {
        isInvalid: function(input) {
            return !input.value.match(/^([0-9]{2})(-[0-9]{3})?$/i)
        },
        invalidityMessage: 'To pole powinno mieć format kodu',
        element: document.querySelector('label[for="code"] .input-requirements li:nth-child(1)')
    }
];

/* ----------------------------
	Setup CustomValidation
	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input
---------------------------- */

var loginInput = document.getElementById('login');
var passwordInput = document.getElementById('haslo');
var passwordRepeatInput = document.getElementById('powtorzHaslo');
var nameRepeatInput = document.getElementById('imie');
var surnameRepeatInput = document.getElementById('nazwisko');
var peselRepeatInput = document.getElementById('pesel');
var emailRepeatInput = document.getElementById('email');
var telephoneRepeatInput = document.getElementById('telefon');
var cityRepeatInput = document.getElementById('miejscowosc');
var streetRepeatInput = document.getElementById('ulica');
var numberRepeatInput = document.getElementById('numer_domu');
var codeRepeatInput = document.getElementById('kod');


loginInput.CustomValidation = new CustomValidation(loginInput);
loginInput.CustomValidation.validityChecks = usernameValidityChecks;

passwordInput.CustomValidation = new CustomValidation(passwordInput);
passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

passwordRepeatInput.CustomValidation = new CustomValidation(passwordRepeatInput);
passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChecks;

nameRepeatInput.CustomValidation = new CustomValidation(nameRepeatInput);
nameRepeatInput.CustomValidation.validityChecks = nameValidityChecks;

surnameRepeatInput.CustomValidation = new CustomValidation(surnameRepeatInput);
surnameRepeatInput.CustomValidation.validityChecks = surnameValidityChecks;

peselRepeatInput.CustomValidation = new CustomValidation(peselRepeatInput);
peselRepeatInput.CustomValidation.validityChecks = peselValidityChecks;

emailRepeatInput.CustomValidation = new CustomValidation(emailRepeatInput);
emailRepeatInput.CustomValidation.validityChecks = emailValidityChecks;

telephoneRepeatInput.CustomValidation = new CustomValidation(telephoneRepeatInput);
telephoneRepeatInput.CustomValidation.validityChecks = telephoneValidityChecks;

cityRepeatInput.CustomValidation = new CustomValidation(cityRepeatInput);
cityRepeatInput.CustomValidation.validityChecks = cityValidityChecks;

streetRepeatInput.CustomValidation = new CustomValidation(streetRepeatInput);
streetRepeatInput.CustomValidation.validityChecks = streetValidityChecks;

numberRepeatInput.CustomValidation = new CustomValidation(numberRepeatInput);
numberRepeatInput.CustomValidation.validityChecks = numberValidityChecks;

codeRepeatInput.CustomValidation = new CustomValidation(codeRepeatInput);
codeRepeatInput.CustomValidation.validityChecks = codeValidityChecks;




/* ----------------------------
	Event Listeners
---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');


//var submit = document.querySelector('input[type="submit"]');
//var form = document.getElementById('registration');

function validate() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].CustomValidation.checkInput();
    }
}

//submit.addEventListener('click', validate);
//form.addEventListener('submit', validate);
