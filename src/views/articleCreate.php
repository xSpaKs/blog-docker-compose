<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an article</title>
</head>
<body>
    <?=isset($_SESSION["message"]) ? $_SESSION["message"] : ""; $_SESSION["message"] = ""?> 
    
    <form action="" method="post">
        <div>
            <label for="title">Title : </label>
            <input type="text" name="title" value=<?=isset($_POST["title"]) ? $_POST["title"] : ""?>>
        </div>

        <div>
            <label for="body">Body : </label>
            <input type="text" name="body" value=<?=isset($_POST["body"]) ? $_POST["body"] : ""?>>
        </div>

        <input type="submit">
    </form>
</body>
</html>