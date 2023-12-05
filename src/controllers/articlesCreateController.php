<?php

require __DIR__ . "/../models/Article.php";

$isValidTitle = v::notEmpty()->validate($_POST["title"]);
$isValidBody = v::notEmpty()->validate($_POST["body"]);

if ($isValidTitle && $isValidBody)
{
    $converter = new HtmlConverter();
    createArticle($converter->convert($_POST["title"]), $converter->convert($_POST["body"]));
    
    $_SESSION["message"] .= "<p>Your article has successfully been created</p>";
    header("Location:" . "articles");
    exit;
}

else 
{    
    $_SESSION["message"] .= "<p>Title and body values are required to create an article</p>";
}

require __DIR__ . "/../views/articleEdit.php"; 