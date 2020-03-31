<?php require_once 'includes/header.php' ?>
<?php
if (isset($_POST['submit'])) {
  $user = new User;
  $data = [
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
  ];

  $wasSuccessful = $user->login($data);
  if ($wasSuccessful) {
    header("Location: profile.php");
  } else {
    die('ERROR');
  }
}
?>

<section class="jumbotron">
  <div class="container">
    <form action="login.php" method="POST" enctype="multipart/form-data">
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
      <input type="submit" name='submit' class="btn btn-primary" value="<?= $langData->login ?>">
    </form>
  </div>
</section>

<?php require_once 'includes/footer.php' ?>