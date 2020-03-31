const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confPasswordInput = document.getElementById('conf_password');
const avatarInput = document.getElementById('avatar');
const nameError = document.querySelector('.name-error');
const emailError = document.querySelector('.email-error');
const passwordError = document.querySelector('.pass-error');
const confPassError = document.querySelector('.conf-error');

nameInput.addEventListener('change', () => {
  validateNameInput(nameInput.value);
});

emailInput.addEventListener('change', () => {
  validateEmail(emailInput.value.toLowerCase());
});

passwordInput.addEventListener('change', () => {
  validatePasswordInput(passwordInput.value);
});

confPasswordInput.addEventListener('change', () => {
  validatePassMatch(passwordInput.value, confPasswordInput.value);
});

const validateNameInput = name => {
  if (name.length < 2) {
    nameError.textContent = 'Name should not be less then 2 characters';
  } else if (!name.match(/^[A-Za-z ]+$/)) {
    nameError.textContent = 'Name should only consist of letters';
  } else {
    nameError.textContent = '';
  }
};

const validateEmail = email => {
  const pattern = /\S+@\S+\.\S+/;
  if (email.length === 0) {
    emailError.textContent = 'Email should not be empty';
  } else if (!email.match(pattern)) {
    emailError.textContent = 'Email is invalid';
  } else {
    emailError.textContent = '';
  }
};

const validatePasswordInput = pass => {
  if (pass.length < 6) {
    passwordError.textContent = 'Password should not be less than 6 characters';
  } else {
    passwordError.textContent = '';
  }
};

const validatePassMatch = (pass, confPass) => {
  if (pass !== confPass) {
    confPassError.textContent = 'Passwords do not match';
  } else {
    confPassError.textContent = '';
  }
};
