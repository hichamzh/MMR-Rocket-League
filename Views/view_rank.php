<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rank</title>
</head>

<body>
    <h1>Choisi le mode equipe</h1>
    <?php foreach ($equipe as $e): ?>

        <a href="?controller=home&action=display_rank_choix&id_choix=<?= $e->id_choix ?>&choix=<?= $e->nom_choix ?>">
            <?php echo $e->nom_choix; ?>
        </a> <br> <br>

    <?php endforeach; ?>
</body>

</html>