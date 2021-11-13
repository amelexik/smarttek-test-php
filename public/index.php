<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../sf/Sf.php';

$config = CONFIG_PATH . DS . 'web.php';
if (!file_exists($config))
    die("Config '$config' file is not found.");

Sf::createWebApp($config)->run();