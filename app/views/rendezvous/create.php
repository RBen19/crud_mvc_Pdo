<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Prise de Rendez-vous</h1>
    <form method="post" action="?action=creerRdv">
        <input type="hidden" name="idCli" value=<?=$client["idclient"] ?>>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nomCli" required value="<?=$client["nomClient"]?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="pnomCli" required  value="<?=$client["prenomClient"]?>" readonly >
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="emailCli" required value="<?=$client["emailClient"]?>" readonly >
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="tel" class="form-control" id="telephone" name="telCli" required value="<?=$client["telephoneClient"]?>" readonly>
        </div>
        <div class="mb-3">
            <label for="dateHeure" class="form-label">Date et heure du rendez-vous :</label>
            <input type="datetime-local" class="form-control" name="DateHeureRdv" id="dateHeure" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description du rendez-vous :</label>
            <textarea class="form-control" id="description" name="descriptionRdv" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Prendre rendez-vous</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>