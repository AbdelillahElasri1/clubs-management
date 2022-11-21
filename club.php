<?php
    require_once "./modules/user.php";
    require_once "./modules/user.php";
    //require_once "./DB/config.php";
    $user = new User();
    $club = new Club();
    $club->setId($_GET["id"]);
    try{
        $club->initClubId($_GET["id"]);
    }catch(Exception $e){
        echo $e;
        header("Location: ./index.php");
        exit();
    }
    $club->listeApprenants();
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8"/>
        <title>club <?php
            echo $club->getNom().'#'.$club->getId();
        ?></title>
        <link rel="stylesheet" href="./src/styles/club.css"/>
        <link rel="stylesheet" href="./src/styles/index.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
        <link rel="icon" type="images/x-icon" href="./assets/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css" >
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="dialog-info">
            <div class="info">
                <p>
                    <span class="key">Nom:</span>
                    <span class="value">
                        <?php echo $club->getNom();?>
                    <span>
                <p>
                <p>
                    <span class="key">Titre:</span>
                    <span class="value">
                        <?php echo $club->getTitre();?>
                    <span>
                <p>
                <p>
                    <span class="key">Date de création:</span>
                    <span class="value">
                        <?php echo $club->getDate_creation();?>
                    <span>
                <p>
                <p>
                    <span class="key">Nombre d'apprenants participer:</span>
                    <span class="value">
                        <?php echo count($club->getApprenants());?>
                    <span>
                <p>
                <button class=" btn btn-sm btn-danger close-info">fermer</button>
            </div>
        </div>
        <div class="dialog dialog-a">
            <form action="./utils/addApprenant.php" method="POST" enctype="multipart/form-data">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" required/>
                <label for="prenom">Prénom</label>
                <input id="prenom" name="prenom" type="text" required id="prenom"/>
                <label for="annee">Année</label>
                <select name="annee" required id="annee">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                </select>
                <label for="classe">Classe</label>
                <select name="classe" id="classe" required>
                    <option value="ada lovelace" selected>Ada lovelace</option>
                    <option value="alan turing">Alan turing</option>
                    <option value="margarite hamilton">Margaret Hamilton</option>
                    <option value="java1">Java 1</option>
                    <option value="java2">Java 2</option>
                    <option value="JS">JS</option>
                </select>
                <label for="image">Image de l'apprenant<label>
                <input type="file" name="image" id="image"/>
                <label>Représentant</label>
                <input type="checkbox" name="represenant" id="representant"/>
                <input type="hidden" name="club_id" value="<?php echo $_GET["id"];?>" />
                <div class="options">
                    <button class="btn btn-success btn-sm">ajouter</button>
                    <span class="btn btn-danger btn-sm close-add-apprenant">fermer</span>
                </div>
            </form>
        </div>
        <main>
        <nav>
                <a href="./index.php">
                    <img src="./assets/logo.png" alt="youcode logo" id="logo"/>
                </a>
                <?php
                    if(!isset($_SESSION['userid'])){
                        echo '<section class="avatar">
                        <img src="./assets/guest.png" alt="guest logo" id="avatar"/>
                        <i class="bi bi-caret-down-fill toggle-menu"></i>
                        <div class="menu">
                            <a>
                                <i class="bi bi-gear-fill"></i>
                                modifier
                            </a>
                            <form action="" method="POST">
                                <button title="déconnecter">
                                    <i class="bi bi-box-arrow-right"></i>
                                    déconnecter
                                </button>
                            </form>
                        </div>
                    </section>';
                    }
                ?>
            </nav>
            <div class="text">
                <h1>Liste des apprenants du club "<?php 
                    echo $club->getNom();
                    //echo gettype((int)$_GET["id"]);
                    $x = $_GET["id"];
                    if($x%4 == 1)
                        echo " 🔥";
                    else if($x%4 == 2)
                        echo " 🌊";
                    else if($x%4 == 3)
                        echo " 🃏";
                    else
                        echo " 🎯";
                ?>"</h1>
            </div>
            <div class="section">
                <button class="btn btn-success add-apprenant">ajouter un nouveau apprenant</button>
                <button class="btn btn-info show-details">club détails</button>
                <button class="btn btn-warning text-white change-respo">changer le représentant</button>
                <form action="./utils/deleteClub.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $club->getId();?>"/>
                    <button class="btn btn-danger delete-club">supprimer le club"<?php echo $club->getNom();?>"</button>
                </form>
            </div>
            <div class="apprenant-container">
                <table class="table">
                    <thead>
                    <tr>
                            <th scope="col">Id</th>
                            <th scope="col">image de profile</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">classe</th>
                            <th scope="col">annee</th>
                            <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($club->getApprenants() as $apprenant){
                                echo "<tr>
                                    <td>
                                        {$apprenant->getId()}
                                        <form method='POST'action='./utils/changeResponsable.php' class='responsable_form'>
                                            <input type='checkbox'  id='respo_{$apprenant->getId()}' name='represenant'";
                                            if($apprenant->getResponsable())
                                                echo "checked disabled";
                                            echo "/>
                                            <input type='hidden' name='apprenant' value='{$apprenant->getId()}'/>
                                            <input type='hidden' name='club_id' value='{$_GET['id']}'/>
                                        </form>
                                    </td>
                                    <td class='apprenant-img'>
                                        <img src='./assets/apprenants/{$apprenant->getImg_profile()}' alt='{$apprenant->getId()}' />
                                    </td>
                                    <td>{$apprenant->getNom()}</td>
                                    <td>{$apprenant->getPrenom()}</td>
                                    <td>{$apprenant->getClasse()}</td>
                                    <td>{$apprenant->getAnnee()}</td>
                                    <td>
                                        <form method='POST' action='./utils/deleteApprenant.php'>
                                            <input type='hidden' name='id' value='{$apprenant->getId()}'/>
                                            <input type='hidden' name='image' value='{$apprenant->getImg_profile()}'/>
                                            <button class='btn btn-sm btn-danger'>
                                                <i class='bi bi-trash3'></i>
                                            </button>
                                        </form>
                                        <a href='./edit.php?id={$apprenant->getId()}' class='btn btn-sm btn-warning'>
                                            <i class='bi bi-pen'></i>
                                        </a>
                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
    <script type="text/javascript" src="./src/scripts/index.js"></script>
    <script type="text/javascript">
        <?php
            if(isset($_GET['error']))
                echo "alert('impossible d\'ajouter un utilisateur existant dans le système!');";
        ?>
    </script>
</html>