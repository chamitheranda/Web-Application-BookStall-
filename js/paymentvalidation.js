
function validateName() {
  var name = document.getElementById("name").value;
  var nameError = document.getElementById("nameError");

  if (name == "") {
    nameError.textContent = "Name is required.";
    document.getElementById("nameError").style.color = "red";
  } else {
    nameError.textContent = "";
    document.getElementById("nameError").style.color = "green";
    return true;
  }
  return false;
}


function validateEmail() {
  var email = document.getElementById("email").value;
  var emailError = document.getElementById("emailError");
 var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (email == "") {
    emailError.textContent = "Email is required.";
    document.getElementById("emailError").style.color = "red";
  } else if (!emailRegex.test(email)) {
    emailError.textContent = "Invalid email format.";
    document.getElementById("emailError").style.color = "red";
  } else {
    emailError.textContent = "";
    document.getElementById("emailError").style.color = "green";
    return true;
  }
  return false;
}

function validateCardNumber() {
  var cardnumber = document.getElementById("ccnum").value;
  var cardNumberError = document.getElementById("cardNumberError");
  var cardRegex = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;

  if (cardnumber == "") {
      cardNumberError.textContent = "card Number is required.";
    document.getElementById("cardNumberError").style.color = "red";
  } else if (!cardRegex.test(cardnumber)) {
      cardNumberError.textContent = "Invalid card number format.";
    document.getElementById("cardNumberError").style.color = "red";
  } else {
      cardNumberError.textContent = "";
    document.getElementById("cardNumberError").style.color = "green";
    return true;
  }
  return false;
}

function validateCvvNumber() {
  var cvvnumber = document.getElementById("cvv").value;
  var cvvNumberError = document.getElementById("cvvNumberError");
  var cvvregex = /^[0-9]{3, 4}$/;

  if (cvvnumber == "") {
      cvvNumberError.textContent = "cvv Number is required.";
    document.getElementById("cvvNumberError").style.color = "red";
  } else if (!cvvregex.test(cvvnumber)) {
      cvvNumberError.textContent = "Invalid cvv number format.";
    document.getElementById("cvvNumberError").style.color = "red";
  } else {
      cvvNumberError.textContent = "";
    document.getElementById("cvvNumberError").style.color = "green";
    return true;
  }
  return false;
}

function validateAddress() {
  var address = document.getElementById("adr").value;
  var addressError = document.getElementById("addressError");

  if (address == "") {
    addressError.textContent = "Address is required.";
    document.getElementById("addressError").style.color = "red";
  } else {
    nameError.textContent = "";
    document.getElementById("addressError").style.color = "green";
    return true;
  }
  return false;
}


function validate_all(){
  if(validateName()){
      if (validateEmail()){
          if(validateAddress()){
              if(validateCardNumber()){
                  if(validateCvvNumber()){
                      alert('payment success');
                  }
              }
          }
      }
  }
  return false;
}
