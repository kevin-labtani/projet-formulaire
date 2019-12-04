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
    if (firstName.value.length < 20) {
      firstName.classList.remove("invalid");
      errorText.textContent = "";
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
    if (lastName.value.length < 20) {
      lastName.classList.remove("invalid");
      errorText.textContent = "";
    }
  }
};

// validate email and toggle red underline based on status
const validateEmail = () => {
  const email = document.querySelector("#email");
  const errorText = document.querySelector(".email-error");

  if (regSafeEmail.test(email.value)) {
    email.classList.add("invalid");
    errorText.textContent = "Please use valid characters only";
  } else {
    email.classList.remove("invalid");
    errorText.textContent = "";
  }
};

// Form blur event listeners
document
  .getElementById("firstName")
  .addEventListener("blur", validateFirstName);
document.getElementById("lastName").addEventListener("blur", validateLastName);
document.getElementById("email").addEventListener("blur", validateEmail);
