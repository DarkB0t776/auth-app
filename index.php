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
    <a href="<?= WEB_ROOT ?>index.php?lang=en"><img src="assets/img/flags/eng.png" alt="<?= LANG_ENG ?>"></a>
    <a href="<?= WEB_ROOT ?>index.php?lang=ua"><img src="assets/img/flags/ua.png" alt="<?= LANG_UA ?>"></a>
    <form action="index.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="name"><?= $langData->name ?></label>
        <input type="text" name="f_name" class="form-control" id="name">
        <p class="name-error"></p>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1"><?= $langData->email ?></label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
        <p class="email-error"></p>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1"><?= $langData->password ?></label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <p class="pass-error"></p>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword2"><?= $langData->confirm_password ?></label>
        <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword2">
        <p class="conf-error"></p>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1"><?= $langData->avatar ?></label>
        <input type="file" class="form-control-file" name="avatar" id="exampleFormControlFile1">
        <p class="img-error"></p>
      </div>
      <input type="submit" name='submit' class="btn btn-primary" value="<?= $langData->register ?>">
    </form>
  </div>
</section>

<?php require_once 'includes/footer.php' ?>