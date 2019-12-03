// regex safety check
// thanks to stackoverflow for the regex
const regSafe = /[\^<,\"@\/\{\}\(\)\*\$%\?=>:\|]+/i;
const regSafeEmail = /[\^<,\"\/\{\}\(\)\*\$%\?=>:\|]+/i;

const validateFirstName = () => {
  const firstName = document.getElementById("firstName");
  if (regSafe.test(firstName.value)) {
    firstName.classList.add("invalid");
  } else {
    if (firstName.value.length < 20) {
      firstName.classList.remove("invalid");
    }
  }
};

const validateLastName = () => {
  const lastName = document.getElementById("lastName");
  if (regSafe.test(lastName.value)) {
    lastName.classList.add("invalid");
  } else {
    if (lastName.value.length < 20) {
      lastName.classList.remove("invalid");
    }
  }
};

const validateEmail = () => {
  const email = document.getElementById("email");
  if (regSafeEmail.test(email.value)) {
    email.classList.add("invalid");
  } else {
    email.classList.remove("invalid");
  }
};

// Form blur event listeners
document
  .getElementById("firstName")
  .addEventListener("blur", validateFirstName);
document.getElementById("lastName").addEventListener("blur", validateLastName);
document.getElementById("email").addEventListener("blur", validateEmail);
