<?php

require "functions.php";
//require "router.php";

//connect to mysql database
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";

$pdo = new PDO($dsn, 'root');

$statement = $pdo->prepare("select * from posts");
$statement-> execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

//dd($posts);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}





//sample class
//class Person {
//    public $name;
//    public $age;
//
//    public function breath()
//    {
//        echo $this -> name . ' is breathing!';
//    }
//}
//
//$person = new Person();
//
//$person -> name = "Niel";
//$person -> age = 22;
//
//$person -> breath();