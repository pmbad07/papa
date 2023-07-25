<!-- view/patient/list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des patients</title>
</head>
<body>
    <h1>Liste des patients</h1>
    <ul>
        <?php foreach ($patients as $patient) : ?>
            <li>
                <?php echo $patient['nomComplet']; ?> (<?php echo $patient['adresse']; ?>, <?php echo $patient['numeroTelephone']; ?>)
                <a href="index.php?action=editPatient&id=<?php echo $patient['id']; ?>">Modifier</a>
                <a href="index.php?action=deletePatient&id=<?php echo $patient['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=addPatient">Ajouter un patient</a>
</body>
</html>
