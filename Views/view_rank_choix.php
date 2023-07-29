<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rank |
        <?php echo $choix ?>
    </title>
</head>

<body>
    <h1>Rank
        <?php echo $choix ?>
    </h1>
    <?php foreach ($ranks as $r): ?>

        <img src="" alt="logo rank <?php echo $r->niveaux ?>">
        <p>
            <?php echo $r->niveaux ?>
        </p>
        <p>
            <?php echo $r->point_min ?>
        </p>
        <p>
            <?php echo $r->point_max ?>
        </p>

    <?php endforeach; ?>
</body>

</html>