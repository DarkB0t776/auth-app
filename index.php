<?php require_once 'includes/header.php' ?>
<?php

if (isset($_POST['submit'])) {
  $user = new User;
  $data = [
    'f_name' => trim($_POST['f_name']),
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
    'confirm_password' => trim($_POST['confirm_password']),
    'avatar' => $_FILES['avatar']
  ];

  $wasSuccessful = $user->register($data);
  if ($wasSuccessful) {
    header("Location: login.php");
  } else {
    die('ERROR');
  }
}
?>

<section class="jumbotron">
  <div class="container">

    <form action="<?= WEB_ROOT ?>/index.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name"><?= $langData->name ?></label>
        <input type="text" name="f_name" class="form-control" id="name">
        <p class="name-error error"></p>
      </div>
      <div class="form-group">
        <label for="email"><?= $langData->email ?></label>
        <input type="email" name="email" class="form-control" id="email">
        <p class="email-error error"></p>
      </div>
      <div class="form-group">
        <label for="password"><?= $langData->password ?></label>
        <input type="password" name="password" class="form-control" id="password">
        <p class="pass-error error"></p>
      </div>
      <div class="form-group">
        <label for="conf_password"><?= $langData->confirm_password ?></label>
        <input type="password" name="confirm_password" class="form-control" id="conf_password">
        <p class="conf-error error"></p>
      </div>
      <div class="form-group">
        <label for="avatar"><?= $langData->avatar ?></label>
        <input type="file" class="form-control-file" name="avatar" id="avatar">
        <p class="img-error error"></p>
      </div>
      <input type="submit" name='submit' class="btn btn-primary" value="<?= $langData->register ?>">
    </form>
  </div>
</section>

<?php require_once 'includes/footer.php' ?>