const uaErrors = {
  name_type: "Ім'я повинно містити тільки букви",
  name_length: "Ім'я повинно бути не менше 2 символів",
  email_empty: 'Електронна адреса не повинна бути пустою',
  email_type: 'Невірний формат електронної адреси',
  email_exists: 'Електронна адреса вже існує',
  password_length: 'Пароль повинен містити мінімум 6 символів',
  password_match: 'Паролі не співпадають',
  image_type: 'Картинка повинна мати розширення gif, jpg або png'
};

const engErrors = {
  name_type: 'Name should consist of letters only',
  name_length: 'Name should not be less than 2 characters',
  email_empty: 'Email should not be empty',
  email_type: 'Email is invalid',
  email_exists: 'Email already exists',
  password_length: 'Password length should be at least 6 characters',
  password_match: 'Passwords do not match',
  image_type: 'Only gif, jpg or png extension is allowed'
};

export { uaErrors, engErrors };
