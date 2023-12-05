<?php

require __DIR__ . "/../vendor/autoload.php";

session_start();


/*use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dsn = 'mysql:dbname=blog;host=localhost';
$user = 'root';
$password = 'root';

try {
    $pdo = new PDO($dsn, $user, $password);
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}*/

$url = $_SERVER['REQUEST_URI'];
$url = explode("blog", $url)[1];
$url = explode("?", $url)[0];
$url = str_replace("/public", "", $url);

switch($url)
{
    case '/articles' :
        include '../src/controllers/articlesController.php';
        break;

    case '/articles/create' : 
        include '../src/controllers/articlesCreateController.php';
        break;

    case '/articles/edit' : 
        include '../src/controllers/articlesEdit.php';
        break;

    case '/articles/delete' : 
        include '../src/controllers/articlesDelete.php';
        break;

    default : 
        include '../src/controllers/articlesController.php';
        break;

    }


