<!-- view/consultation/list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des consultations</title>
</head>
<body>
    <h1>Liste des consultations</h1>
    <ul>
        <?php foreach ($consultations as $consultation) : ?>
            <li>
                Médecin: <?php echo $consultation['medecin']; ?><br>
                Médicaments: <?php echo $consultation['medicament']; ?><br>
                <a href="index.php?action=editConsultation&id=<?php echo $consultation['id']; ?>">Modifier</a>
                <a href="index.php?action=deleteConsultation&id=<?php echo $consultation['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=addConsultation">Ajouter une consultation</a>
</body>
</html>
