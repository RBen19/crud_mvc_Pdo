
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<button type="button" class="btn btn-outline-warning"><a href="?action=voirClients">Voir les Clients</a></button>

<div class="container mt-5">


    <table class="table table-striped"">
    <thead>
    <tr>
        <th>#</th>
        <th>Date et Heure</th>
        <th>Description</th>
        <th>client </th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cpt=1;
    foreach($rdv as $row):

        ?>
        <tr>
            <td><?=$cpt?></td>
            <td><?= $row['rdvDateHeure'] ?></td>
            <td><?= $row["rdvDescription"] ?></td>
            <td><?=$row['rdvIdCli']?></td>
            <td>
                <button type="button" class="btn btn-primary btn-sm"><a href="?action=ModifierRdv&idCli=<?= $row['rdvIdCli'] ?>&idRdv=<?=$row['idrdv']?>"
                                                                        style="text-decoration: none;color: #fff">Modifier</a></button>
                <button type="button" class="btn btn-danger btn-sm"><a href="?action=supprimerRdv&idRdv=<?= $row["idrdv"] ?>"
                                                                       style="text-decoration: none;color: #fff">Supprimer</a></button>
            </td>
        </tr>
        <?php
        $cpt++;
    endforeach;
    ?>

    </tbody>

    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
