<?php require_once 'includes/header.php' ?>
<?php

$user = new User;
// Check if user is logged in
if ($user->isLoggedIn()) header('Location: profile.php');

// Check if pressed submit button
if (isset($_POST['submit'])) {
  $data = [
    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
    'password' => trim($_POST['password']),
  ];

  $wasSuccessful = $user->login($data);
  // Check if login was successful
  if ($wasSuccessful) {
    header("Location: profile.php");
  } else {
    $error = $user->getErrors()[0];
  }
}
?>

<p class="email-error error"><?= $error ?? '' ?></p>
<form action="<?= WEB_ROOT ?>/login.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1"><?= $langData->email ?></label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" value=<?= $_POST['email'] ?? '' ?>>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><?= $langData->password ?></label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <p class="pass-error"></p>
  </div>
  <input type="submit" name='submit' class="btn btn-primary" value="<?= $langData->login ?>">
</form>

<?php require_once 'includes/footer.php' ?>