<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show articles</title>
</head>
<body>
    <?=isset($_SESSION["message"]) ? $_SESSION["message"] : ""; $_SESSION["message"] = ""?>

    <?php 
    if (count($articles) == 0) { ?>
        <p>There is no article yet</p>
    <?php }
        for ($i = 0; $i < count($articles); $i++)
        { ?>
            <div>
                <p>Date: <?= count($articles) === 1 ?
                    Carbon::parse($parsedown->text($article["updated_at"]))->diffForHumans() :
                    Carbon::parse($parsedown->text($article["updated_at"]))->isoFormat('LLLL') ?>
                </p>
                <p>Title : <?=$parsedown->text($articles[$i]["title"])?></p>
                <p>Body : <?=$parsedown->text($articles[$i]["body"])?></p>
            </div>
    <?php }
    ?>
</body>
</html>