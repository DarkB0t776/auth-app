<?php
require_once __DIR__ . '/loader.php';
// Check for GET parameter
if (isset($_GET['lang'])) {
  // Get value of GET parameter
  $lang = filter_var(trim($_GET['lang']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  // Create cookie
  setcookie('lang', $lang, time() + 3600 * 24 * 30);
  // Redirection
  header("Location: " . $_SERVER['PHP_SELF']);
}
$language = new Language;
$langData = $language->getLangData();
?>
<!DOCTYPE html>
<html lang="<?= $_COOKIE['lang'] ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Auth</title>
</head>

<body>
  <?php require_once __DIR__ . '/navbar.php' ?>
  <div class="container d-flex flex-column align-items-center mt-5">