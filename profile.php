<?php require_once 'includes/header.php' ?>
<?php

$userObj = new User;
// Check if user is logged in
if (!$userObj->isLoggedIn()) {
  header('Location: login.php');
}
// Check if session 'user_id' exists
if (isset($_SESSION['user_id'])) {
  // Get user data by id
  $user = $userObj->getUserById($_SESSION['user_id']);
}
?>

<div class="card" style="width:400px">
  <img src="assets/img/<?= $user->avatar ?? 'default.png' ?>" alt="avatar" class="card-img-top">
  <div class="card-body">
    <h4 class="card-title"><?= $user->full_name ?></h4>
    <p class="lead"><?= $langData->email ?>: <?= $user->email ?></p>
  </div>

</div>



<?php require_once 'includes/footer.php' ?>