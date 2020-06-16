<?php

session_start();

define("URL", "http://localhost:8000/");
define("APP_ID", "1064278030632659");
define("APP_SECRET", "889550de2dd53ab085d91fc205f4905b");

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/services/helpers.php';
require_once __DIR__ . '/services/facebook.php';
require_once __DIR__ . '/components/Header.php';
