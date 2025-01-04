<?php

require "functions.php";
require "Database.php";
//require "router.php";

$db = new Database();
$posts = $db->query("select * from posts where id = 3")->fetch(PDO::FETCH_ASSOC);

dd($posts);

