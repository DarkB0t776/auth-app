<?php

// Start session
session_start();

// Load config
require_once 'config.php';

// Autoload classes
spl_autoload_register(function ($class) {
  require(__DIR__ . "/classes/" . $class . '.php');
});
