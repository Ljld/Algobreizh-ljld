const initForm = () => {
  let nameInput = document.getElementById('name');
  let surnameInput = document.getElementById('surname');
  let mailInput = document.getElementById('email');
  let passwordInput = document.getElementById('password');
  let passwordConfirmInput = document.getElementById('password-confirm');
  let signUpSubmitBtn = document.getElementById('sign-up-submit');
  let formElt = document.getElementById('sign-up-form');

  const checkName = () => {
    nameInput.classList.remove('input-blank');
    console.log(nameInput.value);
    if (nameInput.value.length < 1 || surnameInput.value.length > 200) {
      nameInput.classList.add('invalid-input');
      nameInput.classList.remove('valid-input');
      return false;
    }
    else {
      nameInput.classList.remove('invalid-input');
      nameInput.classList.add('valid-input');
      return true;
    }
  }

  const checkSurname = () => {
    surnameInput.classList.remove('input-blank');
    if (surnameInput.value.length < 1 || surnameInput.value.length > 200) {
      surnameInput.classList.add('invalid-input');
      surnameInput.classList.remove('valid-input');
      return false;
    }

    else {
      surnameInput.classList.remove('invalid-input');
      surnameInput.classList.add('valid-input');
      return true;
    }
  }

  const validateEmail = (email) => {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  const checkMail = () => {
    mailInput.classList.remove('input-blank');
    if (!(validateEmail(mailInput.value)) || mailInput.value.length < 3 || mailInput.value.length > 50) {
      mailInput.classList.add('invalid-input');
      mailInput.classList.remove('valid-input');
      return false;
    }

    else {
      mailInput.classList.remove('invalid-input');
      mailInput.classList.add('valid-input');
      return true;
    }
  }

  const checkPassword = () => {
    passwordInput.classList.remove('input-blank');
    if (passwordInput.value.length < 6 || passwordInput.value.length > 50) {
      passwordInput.classList.add('invalid-input');
      passwordInput.classList.remove('valid-input');
      return false;
    }

    else {
      passwordInput.classList.remove('invalid-input');
      passwordInput.classList.add('valid-input');
      return true;
    }
  }

  const checkPasswordConfirm = () => {
    passwordConfirmInput.classList.remove('input-blank');
    if (passwordConfirmInput.value != passwordInput.value) {
      passwordConfirmInput.classList.add('invalid-input');
      passwordConfirmInput.classList.remove('valid-input');
      return false;
    }

    else {
      passwordConfirmInput.classList.remove('invalid-input');
      passwordConfirmInput.classList.add('valid-input');
      return true;
    }
  }

  const checkForm = () => {
    if (checkName() && checkSurname() && checkMail() && checkPassword() && checkPasswordConfirm()) {
      signUpSubmitBtn.disabled = false;
      return false;
    }
    else {
      signUpSubmitBtn.disabled = true;
      return true;
    }
  }

  nameInput.addEventListener("keyup", checkName);
  surnameInput.addEventListener("keyup", checkSurname);
  mailInput.addEventListener("keyup", checkMail);
  passwordInput.addEventListener("keyup", checkPassword);
  passwordConfirmInput.addEventListener("keyup", checkPasswordConfirm);
  formElt.addEventListener("keyup", checkForm);
}
