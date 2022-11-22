<?php
session_start();
require_once "./modules/apprenant.php";
if (!isset($_SESSION["userid"]))
    header("Location: ./index.php");
else {
    $apprenant = new Apprenant();
    $apprenant->initId($_GET["id"]);
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Modifier Apprenant</title>
    <link rel="stylesheet" href="./src/styles/index.css" />
    <link rel="stylesheet" href="./src/styles/edit.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="icon" type="images/x-icon" href="./assets/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>

    <main>
        <section class="jumbotron login">
            <form action="./utils/editApprenant.php" method="POST">
                <img src='./assets/apprenants/<?php echo $apprenant->getImg_profile(); ?>' alt="youcode logo" class="profile" />
                <div class="label">
                    <label for="nom">Nom:</label>
                    <input name="nom" id="nom" type="text" value="<?php echo $apprenant->getNom(); ?>" required />
                </div>
                <div class="label">
                    <label for="prenom">Prénom:</label>
                    <input id="prenom" name="prenom" type="text" value="<?php echo $apprenant->getPrenom(); ?>" required />
                </div>
                <div class="label">
                    <label for="annee">Année:</label>
                    <select id="annee" name="annee" required>
                        <option value="1" <?php if ($apprenant->getAnnee() == "1") echo "selected"; ?>>1</option>
                        <option value="2" <?php if ($apprenant->getAnnee() == "2") echo "selected"; ?>>2</option>
                    </select>
                </div>
                <div class="label">
                    <label for="classe">Classe:</label>
                    <select id="classe" name="classe" required>
                        <option value="ada lovelace" <?php if ($apprenant->getClasse() == "ada lovelace") echo "selected" ?>>Ada lovelace</option>
                        <option value="alan turing" <?php if ($apprenant->getClasse() == "Alan turing") echo "selected" ?>>Alan turing</option>
                        <option value="margarite hamilton" <?php if ($apprenant->getClasse() == "margarite hamilton") echo "selected" ?>>Margaret Hamilton</option>
                        <option value="java1" <?php if ($apprenant->getClasse() == "java1") echo "selected" ?>>Java 1</option>
                        <option value="java2" <?php if ($apprenant->getClasse() == "java2") echo "selected" ?>>Java 2</option>
                        <option value="JS" <?php if ($apprenant->getClasse() == "JS") echo "selected" ?>>JS</option>
                    </select>
                </div>
                <input type='hidden' name="id" value="<?php echo $apprenant->getId(); ?>" />
                <input type='hidden' name="img_profile" value="<?php echo $apprenant->getImg_profile(); ?>" />
                <input type='hidden' name="club_id" value="<?php echo $apprenant->getClub_id(); ?>" />
                <input type="file" name="image" />
                <button class="btn btn-sm btn-success">Authentifier</button>
            </form>
        </section>
    </main>

</body>

</html>