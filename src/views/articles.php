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
    if (len($articles) == 0) { ?>
        <p>There is no article yet</p>
    <?php }
        for ($i = 0; $i < len($articles); $i++)
        { ?>
            <div>
                <?php
                if (len($articles) == 1)
                { ?>
                    <p>Date : <?=Carbon::parse($parsedown->text($articles[$i]["updated_at"]))->diffForHumans()?></p>
                <?php }
                else
                { ?>
                    <p>Date : <?=Carbon::parse($parsedown->text($articles[$i]["updated_at"]))->isoFormat('LLLL')?></p>
                <?php }
                ?>
                <p>Title : <?=$parsedown->text($articles[$i]["title"])?></p>
                <p>Body : <?=$parsedown->text($articles[$i]["body"])?></p>
            </div>
        <?php }
    ?>
</body>
</html>