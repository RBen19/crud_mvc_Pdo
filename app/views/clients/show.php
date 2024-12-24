
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
<button type="button" class="btn btn-outline-secondary"><a href="?action=voirRdv" style="color: black">Voir la liste des Rdv</a>
</button>

<div class="container mt-5">


    <table class="table table-striped"">
    <thead>
    <tr>
        <th>#</th>
        <th>Nom du client</th>
        <th>Prenom du client</th>
        <th>Email du client</th>
        <th>Numero  du Client</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $cpt=1;
        foreach($clients as $client):

        ?>
        <tr>
            <td><?=$cpt?></td>
            <td><?= $client["nomClient"] ?></td>
            <td><?= $client["prenomClient"] ?></td>
            <td><?= $client["emailClient"] ?></td>
            <td><?= $client["telephoneClient"] ?></td>
            <td>
                <button type="button" class="btn btn-secondary btn-sm  "><a class="text-white" href="?action=prendreRdv&idCli=<?= $client["idclient"] ?>">Prendre Rdv</a></button>

                <button type="button" class="btn btn-primary btn-sm"><a href="?action=ModifierCli&idCli=<?= $client["idclient"] ?>"
                                                                        style="text-decoration: none;color: #fff">Modifier</a></button>
                <button type="button" class="btn btn-danger btn-sm"><a href="?action=supprimerCli&idCli=<?= $client["idclient"] ?>"
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