<?php require_once 'includes/header.php' ?>
<?php
if (isset($_SESSION['user_id'])) {
  $userObj = new User;
  $user = $userObj->getUserById($_SESSION['user_id']);
}
?>

<section class="jumbotron">
  <div class="container">
    <img src="assets/img/<?= $user->avatar ?>" alt="avatar">
  </div>
</section>

<?php require_once 'includes/footer.php' ?>