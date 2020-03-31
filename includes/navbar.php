<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <ul class="navbar-nav mr-auto">
    <?php if (isset($_SESSION['user_id'])) : ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?= WEB_ROOT ?>/logout.php"><?= $langData->logout ?></a>
      </li>
    <?php else : ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?= WEB_ROOT ?>/index.php"><?= $langData->register ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= WEB_ROOT ?>/login.php"><?= $langData->login ?></a>
      </li>
    <?php endif; ?>
    <li>
      <a href="<?= WEB_ROOT . $_SERVER['PHP_SELF'] ?>?lang=en"><img src="assets/img/flags/eng.png" alt="<?= LANG_ENG ?>"></a>
    </li>
    <li>
      <a href="<?= WEB_ROOT . $_SERVER['PHP_SELF'] ?>?lang=ua"><img src="assets/img/flags/ua.png" alt="<?= LANG_UA ?>"></a>
    </li>
  </ul>
</nav>