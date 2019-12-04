// regex safety check
// thanks to stackoverflow for the regex
const regSafe = /[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|]+/i;
const regSafeEmail = /[\^<,\"\/\{\}\(\)\*\$%\?=>:\|]+/i;

// validate first name and toggle red underline based on status
const validateFirstName = () => {
  const firstName = document.querySelector("#firstName");
  const errorText = document.querySelector(".fn-error");
  if (regSafe.test(firstName.value)) {
    firstName.classList.add("invalid");
    errorText.textContent = "Please use valid characters only";
  } else {
    errorText.textContent = "";
    if (firstName.value.length < 20) {
      firstName.classList.remove("invalid");
    }
  }
};

// validate last name and toggle red underline based on status
const validateLastName = () => {
  const lastName = document.querySelector("#lastName");
  const errorText = document.querySelector(".ln-error");
  if (regSafe.test(lastName.value)) {
    lastName.classList.add("invalid");
    errorText.textContent = "Please use valid characters only";
  } else {
    errorText.textContent = "";
    if (lastName.value.length < 20) {
      lastName.classList.remove("invalid");
    }
  }
};

// validate email and toggle red underline based on status
// https://en.wikipedia.org/wiki/Email_address#Local-part
// validating email address is tricky...
// just because things are allowed in the standard doesn't mean that the big email providers allow them....
const validateEmail = () => {
  const email = document.querySelector("#email");
  const errorText = document.querySelector(".email-error");

  if (regSafeEmail.test(email.value)) {
    email.classList.add("invalid");
    errorText.textContent = "Please use valid characters only";
  } else {
    errorText.textContent = "";
    email.classList.remove("invalid");
  }
};

// Form blur event listeners
document
  .getElementById("firstName")
  .addEventListener("blur", validateFirstName);
document.getElementById("lastName").addEventListener("blur", validateLastName);
document.getElementById("email").addEventListener("blur", validateEmail);
