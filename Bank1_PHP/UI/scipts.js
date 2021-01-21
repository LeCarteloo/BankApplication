function InputValidation(){
  this.invalidities = [];
}

InputValidation.prototype = {
  addInvalidity: function(message){
    this.invalidities.push(message);
  },
  getInvalidities: function(){
    return this.invalidities.join('. \n');
  },
  checkValidity: function(input){

    if(input.value.length < 6){
      this.addInvalidity('To pole musi mieć przynajmniej sześć znaków');
      var element = document.querySelector('.input-requirements li:nth-child(1)');
      element.classList.add('invalid');
      element.classList.remove('valid');
    }
    else{
      var element = document.querySelector('.input-requirements li:nth-child(1)');
      element.classList.add('valid');
      element.classList.remove('invalid');
    }

    if(input.value.match(/[^a-zA-Z-0-9]/g)){
      this.addInvalidity('To pole musi zawierać tylko cyfry lub litery');
      var element = document.querySelector('.input-requirements li:nth-child(2)');
      element.classList.add('invalid');
      element.classList.remove('valid');
      console.log(element);
    }
    else{
      var element = document.querySelector('.input-requirements li:nth-child(2)');
      element.classList.add('valid');
      element.classList.remove('invalid');
    }
  }
};


var loginInput = document.getElementById('login');
loginInput.InputValidation = new InputValidation();

loginInput.addEventListener('keyup',function(){
  loginInput.InputValidation.checkValidity(loginInput);

});
