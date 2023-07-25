<!-- view/rendezvous/list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des rendez-vous</title>
</head>
<body>
    <h1>Liste des rendez-vous</h1>
    <ul>
        <?php foreach ($rendezVous as $rdv) : ?>
            <li>
                Date: <?php echo $rdv['date']; ?><br>
                État: <?php echo $rdv['etat']; ?><br>
                <a href="index.php?action=editRendezVous&id=<?php echo $rdv['id']; ?>">Modifier</a>
                <a href="index.php?action=deleteRendezVous&id=<?php echo $rdv['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=addRendezVous">Ajouter un rendez-vous</a>
</body>
</html>
