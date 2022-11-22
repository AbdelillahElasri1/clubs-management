<?php
session_start();
require_once "./modules/user.php";
if (!isset($_SESSION["userid"]))
    header("Location: ./index.php");
else {
    $user = new User();
    $user->initId($_SESSION["userid"]);
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Modifier Information personnel</title>
    <!-- <link rel="stylesheet" href="./src/styles/index.css" /> -->
    <link rel="stylesheet" href="./src/styles/edit.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    <link rel="icon" type="images/x-icon" href="./assets/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="./index.php">
            <img src="./assets/logo.png" alt="youcode logo" id="logo" />
        </a>
        <?php
        echo '<section class="avatar">
                        <img src="./assets/guest.png" alt="guest logo" id="avatar"/>
                        <i class="bi bi-caret-down-fill toggle-menu"></i>
                        <div class="menu">
                            <form action="" method="POST">
                                <button title="déconnecter">
                                    <i class="bi bi-box-arrow-right"></i>
                                    déconnecter
                                </button>
                            </form>
                        </div>
                    </section>';
        ?>
    </nav>
    <main>

        <section class="jumbotron login">
            <form action="./utils/settings.php" method="POST">
                <div class="label">
                    <label for="email">Email:</label>
                    <input name="email" id="emil" type="text" value="<?php echo $user->getEmail(); ?>" />
                </div>
                <div class="label">
                    <label for="nom">Nom:</label>
                    <input name="nom" id="nom" type="text" value="<?php echo $user->getNom(); ?>" />
                </div>
                <div class="label">
                    <label for="prenom">Prénom:</label>
                    <input id="prenom" name="prenom" type="text" value="<?php echo $user->getPrenom(); ?>" />
                </div>
                <div class="label">
                    <label for="mdp">Mot de passe:</label>
                    <input id="mdp" name="mdp" type="text" />
                </div>
                <input type='hidden' name="id" value="<?php echo $user->getId(); ?>" />
                <div>
                    <button class="btn btn-sm btn-success">modifer</button>
                    <a class="btn btn-sm btn-primary" href="./index.php">revenir</a>

                </div>
            </form>
        </section>
    </main>

</body>
<script type="text/javascript" src="./src/scripts/index.js"></script>



</html>