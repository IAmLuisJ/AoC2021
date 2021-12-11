<?php
$dir = scandir("./");
var_dump($dir);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="lang" content="en">
    <link rel="icon" type="image/x-icon" href="https://www.justsaysky.com/assets/favicon.ico">
    <title>Advent of Code 2022</title>
</head>
<body>
<h1>Advent of Code</h1>
<p>Challenges</p>
<ul>
    <?php foreach ($dir as $item): ?>
    <li>
        <a href="<?php echo($item) ?>">
        <?php echo($item) ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
