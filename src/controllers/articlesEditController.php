<?php

require __DIR__ . "/../models/Article.php";

if (isset($_GET["id"]))
{
    $article = getArticle($_GET["id"]);

    if ($article == null) {
        $_SESSION["message"] .= "<p>The article's ID is not valable</p>";
        header("Location:" . "articles");
        exit;
    }

    $articles = $article;
} 

else 
{
    $_SESSION["message"] .= "<p>Please enter an article's ID</p>";
    header("Location:" . "articles");
    exit;
}

$isValidTitle = v::notEmpty()->validate($_POST["title"]);
$isValidBody = v::notEmpty()->validate($_POST["body"]);

if ($isValidTitle && $isValidBody)
{
    $converter = new HtmlConverter();
    updateArticle($_GET["id"], $converter->convert($_POST["title"]), $converter->convert($_POST["body"]));

    $_SESSION["message"] .= "<p>Your article has successfully been updated</p>";
    header("Location:" . "articles?id=" . $_GET["id"]);
    exit;
}

else 
{    
    $_SESSION["message"] .= "<p>Title and body values are required to edit an article</p>";
}

require __DIR__ . "/../views/articleEdit.php"; 