<?php
require '../vendor/autoload.php';

init_php_cas();

if (isset($_GET['logout'])) {
    phpCAS::logout();
}

phpCAS::forceAuthentication();

check_user();

readfile('index.html');
