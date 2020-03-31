<?php require_once 'includes/header.php' ?>
<?php

$user = new User;
// Check if user is logged in
if ($user->isLoggedIn()) header('Location: profile.php');
// Check if submit button was pressed
if (isset($_POST['submit'])) {
  $data = [
    'f_name' => filter_var(trim($_POST['f_name']), FILTER_SANITIZE_STRING),
    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
    'password' => trim($_POST['password']),
    'confirm_password' => trim($_POST['confirm_password']),
    'avatar' => $_FILES['avatar']
  ];

  $wasSuccessful = $user->register($data);
  // Check if registration was successful
  if ($wasSuccessful) {
    header("Location: login.php");
  } else {
    $errors = $user->getErrors();
  }
}
?>


<?php if (isset($errors)) : ?>
  <ul class="list-group text-center">
    <?php foreach ($errors as $error) : ?>
      <li class="list-group-item text-danger"><?= $error ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
<form action="<?= WEB_ROOT ?>/index.php" method="POST" enctype="multipart/form-data" id="reg-form">
  <div class="form-group">
    <label for="name"><?= $langData->name ?>*</label>
    <input type="text" name="f_name" class="form-control" id="name" value=<?= $_POST['f_name'] ?? '' ?>>
    <p class="name-error error"></p>
  </div>
  <div class="form-group">
    <label for="email"><?= $langData->email ?>*</label>
    <input type="email" name="email" class="form-control" id="email" value=<?= $_POST['email'] ?? '' ?>>
    <p class="email-error error"></p>
  </div>
  <div class="form-group">
    <label for="password"><?= $langData->password ?>*</label>
    <input type="password" name="password" class="form-control" id="password">
    <p class="pass-error error"></p>
  </div>
  <div class="form-group">
    <label for="conf_password"><?= $langData->confirm_password ?>*</label>
    <input type="password" name="confirm_password" class="form-control" id="conf_password">
    <p class="conf-error error"></p>
  </div>
  <div class="form-group">
    <label for="avatar"><?= $langData->avatar ?></label>
    <input type="file" class="form-control-file" name="avatar" id="avatar">
    <p class="img-error error"></p>
  </div>
  <input type="submit" id="submit" name='submit' class="btn btn-primary" value="<?= $langData->register ?>">
</form>

<script type="module" src="assets/js/validation.js"></script>
<?php require_once 'includes/footer.php' ?>