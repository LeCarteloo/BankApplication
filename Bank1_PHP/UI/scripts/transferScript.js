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

var numberValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length != 26;
		},
		invalidityMessage: 'To pole musi zawierać dwadzieścia sześć cyfr',
		element: document.querySelector('label[for="number"] .input-requirements li:nth-child(2)')
	},
	{
		isInvalid: function(input) {
			return input.value.match(/[^0-9]/g);
		},
		invalidityMessage: 'Tylko cyfry są dozwolone',
		element: document.querySelector('label[for="number"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return numberInput.value == numBank.value;
		},
		invalidityMessage: 'Nie możesz wysłać sobie przelewu',
		element: document.querySelector('label[for="number"] .input-requirements li:nth-child(3)')
	}
];

var amountValidityChecks = [
	{
		isInvalid: function(input) {
			return !input.value.match(/^\-?([1-9]\d*|0)(\.\d?[1-9])?$/g);
		},
		invalidityMessage: 'Tylko cyfry są dozwolone',
		element: document.querySelector('label[for="amount"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return parseFloat(amountInput.value) > parseFloat(balance.value);
		},
		invalidityMessage: 'Nie masz tyle pieniędzy na koncie',
		element: document.querySelector('label[for="amount"] .input-requirements li:nth-child(2)')
	},
	{
		isInvalid: function(input) {
			return amountInput.value < 1;
		},
		invalidityMessage: 'Nie masz tyle pieniędzy na koncie',
		element: document.querySelector('label[for="amount"] .input-requirements li:nth-child(3)')
	}
];

/* ----------------------------
	Setup CustomValidation
	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input
---------------------------- */

var numberInput = document.getElementById('numer');
var amountInput = document.getElementById('kwota');
var balanceUser = document.getElementById('balance');
var numBank = document.getElementById('numBank');

numberInput.CustomValidation = new CustomValidation(numberInput);
numberInput.CustomValidation.validityChecks = numberValidityChecks;

amountInput.CustomValidation = new CustomValidation(amountInput);
amountInput.CustomValidation.validityChecks = amountValidityChecks;

/* ----------------------------
	Event Listeners
---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"]):not([type="date"]):not([type="reset"])');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}
