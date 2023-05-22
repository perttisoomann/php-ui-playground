<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP UI v0.1</title>
    <?= $resourceLoader->render(\Application\Resources\ResourceLocation::HEAD->value) ?>
</head>
<body>
<div class="container">
    <h1>PHP UI v0.1</h1>
    <table border="1">
        <tr>
            <td><?= $mainmenu ?></td>
            <td><?= $content ?></td>
        </tr>
    </table>
    <?= $footermenu ?>
    <?= $debug ?>
</div>
<?= $resourceLoader->render(\Application\Resources\ResourceLocation::BODY->value) ?>
</body>
</html>