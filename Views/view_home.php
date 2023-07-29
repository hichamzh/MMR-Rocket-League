<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil | Rocket_rank</title>
</head>
<body>
    <h1>Rocket league Rank</h1>
    

    <section>
        <div class='mode_jeu'>
            <h2>Voici les differents mode de jeu</h2>
        <?php foreach($data['mode_jeu'] as $m) :?>
        <a href="?controller=home&action=display_rank&id_mode=<?= $m->id_mode ?>">
            <?php echo $m->nom_mode; ?>
            <?php echo $m->id_mode; ?>
        </a> <br> <br>

        <?php endforeach; ?>
        </div>
    </section>

</body>
</html>