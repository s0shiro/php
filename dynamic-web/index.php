<?php

require "functions.php";

// Trim `/php/dynamic-web` from the URI
$uri = str_replace('/php/dynamic-web', '', $_SERVER['REQUEST_URI']);

if ($uri === '/') {
    require "controllers/index.php";
} else if ($uri === '/about') {
    require "controllers/about.php";
} else if ($uri === '/contact') {
    require "controllers/contact.php";
}