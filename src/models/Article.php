<?php

function getArticle($id) {
    $articleFromBdd = null;

    $db = new PDO("mysql:dbname=blog;host=127.0.0.1", "root", "root");
    $query = "SELECT article.id, article.title, article.body, article.updated_at FROM posts WHERE article.id = ?";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $id
    ]);

    if ($queryP->rowCount() == 1)
    {
        $articleFromBdd = $queryP->fetch(PDO::FETCH_ASSOC);
    }

    return $articleFromBdd;
}

function getAllArticles() {
    $articlesFromBdd = null;

    $db = new PDO("mysql:dbname=blog;host=127.0.0.1", "root", "root");
    $query = "SELECT article.id, article.title, article.body, article.updated_at FROM posts";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([]);

    if ($queryP->rowCount() == 1)
    {
        $articlesFromBdd = $queryP->fetch(PDO::FETCH_ASSOC);
    }

    return $articlesFromBdd;
}

function updateArticle($id, $title, $body) {
    $db = new PDO("mysql:dbname=blog;host=127.0.0.1", "root", "root");
    $query = "UPDATE `posts` SET `title`= ?, `body`= ?, updated_at = current_timestamp WHERE id = ?";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $label,
        $amount,
        $id
    ]);
}

function deleteArticle($id) {
    $db = new PDO("mysql:dbname=blog;host=127.0.0.1", "root", "root");
    $query = "DELETE FROM posts WHERE article.id = ?";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $id
    ]);
}

function createArticle($title, $body) {
    $db = new PDO("mysql:dbname=blog;host=127.0.0.1", "root", "root");
    $query = "INSERT INTO `posts` (`title`, `body`) VALUES (?, ?)";
    $queryP = $db->prepare($query);
    $answer = $queryP->execute([
        $title,
        $body
    ]);
}