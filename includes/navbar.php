<nav class="navbar-dark bg-dark d-flex justify-content-end">
  <ul class="navbar-nav d-flex flex-row">
    <?php if (isset($_SESSION['user_id'])) : ?>
      <li class="nav-item ">
        <a class="nav-link mr-3" href="<?= WEB_ROOT ?>/logout.php"><?= $langData->logout ?></a>
      </li>
    <?php else : ?>
      <li class="nav-item mr-3 <?= $_SERVER['PHP_SELF'] === '/index.php' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= WEB_ROOT ?>/index.php"><?= $langData->register ?></a>
      </li>
      <li class="nav-item mr-3 <?= $_SERVER['PHP_SELF'] === '/login.php' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= WEB_ROOT ?>/login.php"><?= $langData->login ?></a>
      </li>
    <?php endif; ?>
    <li class="mr-3">
      <a href="<?= WEB_ROOT . $_SERVER['PHP_SELF'] ?>?lang=en"><img src="assets/img/flags/eng.png" alt="<?= LANG_ENG ?>"></a>
    </li>
    <li class="mr-3">
      <a href="<?= WEB_ROOT . $_SERVER['PHP_SELF'] ?>?lang=uk"><img src="assets/img/flags/ua.png" alt="<?= LANG_UA ?>"></a>
    </li>
  </ul>
</nav>