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

    deleteArticle($_GET["id"]);
} 

else 
{
    $_SESSION["message"] .= "<p>The article's ID is not valable</p>";
    header("Location:" . "articles");
    exit;
}

require __DIR__ . "/../views/articles.php";

