import { uaErrors, engErrors } from './errors.js';

const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confPasswordInput = document.getElementById('conf_password');
const avatarInput = document.getElementById('avatar');
const nameError = document.querySelector('.name-error');
const emailError = document.querySelector('.email-error');
const passwordError = document.querySelector('.pass-error');
const confPassError = document.querySelector('.conf-error');
const imgError = document.querySelector('.img-error');

// Get Cookie value by name
const getCookie = name => {
  const value = '; ' + document.cookie;
  const parts = value.split('; ' + name + '=');
  if (parts.length == 2)
    return parts
      .pop()
      .split(';')
      .shift();
};

const lang = getCookie('lang');
let error = engErrors;

if (lang === 'uk') {
  error = uaErrors;
}

//Listeners
nameInput.addEventListener('change', () => {
  validateName(nameInput.value);
});

emailInput.addEventListener('change', () => {
  validateEmail(emailInput.value.toLowerCase());
});

passwordInput.addEventListener('change', () => {
  validatePassword(passwordInput.value);
});

confPasswordInput.addEventListener('change', () => {
  validatePassMatch(passwordInput.value, confPasswordInput.value);
});

avatarInput.addEventListener('change', () => {
  validateImage(avatarInput.value);
  console.log(avatarInput.value);
});

// Data Validation
const validateName = name => {
  const pattern = /^[A-Za-z ]+$/;
  if (name.length < 2) {
    nameError.textContent = error.name_length;
    return false;
  } else if (!name.match(pattern)) {
    nameError.textContent = error.name_type;
    return false;
  } else {
    nameError.textContent = '';
    return true;
  }
};

const validateEmail = email => {
  const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (email.length === 0) {
    emailError.textContent = error.email_empty;
    return false;
  } else if (!email.match(pattern)) {
    emailError.textContent = error.email_type;
    return false;
  } else {
    emailError.textContent = '';
    return true;
  }
};

const validatePassword = pass => {
  if (pass.length < 6) {
    passwordError.textContent = error.password_length;
    return false;
  } else {
    passwordError.textContent = '';
    return true;
  }
};

const validatePassMatch = (pass, confPass) => {
  if (pass !== confPass) {
    confPassError.textContent = error.password_match;
    return false;
  } else {
    confPassError.textContent = '';
    return true;
  }
};

const validateImage = image => {
  const allowedExt = ['jpeg', 'jpg', 'png', 'gif'];
  const imgExt = image
    .split('.')
    .pop()
    .toLowerCase();

  if (!allowedExt.includes(imgExt) && image.length > 0) {
    imgError.textContent = error.image_type;
    return false;
  } else {
    imgError.textContent = '';
    return true;
  }
};
