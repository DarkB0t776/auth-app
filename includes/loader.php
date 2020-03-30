<?php
session_start();
require_once 'config.php';

spl_autoload_register(function ($class) {
  require(__DIR__ . "/classes/" . $class . '.php');
});
