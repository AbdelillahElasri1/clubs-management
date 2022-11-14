<?php
    require_once "./modules/user.php";
    $user = new User();
    if(isset($_SESSION['userid']))
        $user->setId($_SESSION['userid']);
    if(isset($_SESSION['nom']))
        $user->setNom($_SESSION['nom']);
    if(isset($_SESSION['userid']))
        $user->setPrenom($_SESSION['prenom']);
    $user->Clubs();
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="./src/styles/index.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
        <link rel="icon" type="images/x-icon" href="./assets/logo.png"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css" >
    </head>
    <body>
            <div class="dialog">
                <form action="./utils/addClub.php" method="POST" enctype="multipart/form-data">
                        <label for="nom">Nom</label>
                        <input id="nom" type="text" name="nom" required/>
                        <label for="titre">Titre</label>
                        <input id="titre" type="text" name="titre" required/>
                        <label for="image">Image</label>
                        <input id="image" type="file" name="img_club" required/>
                        <div class="options">
                            <button class="btn btn-success btn-sm">ajouter</button>
                            <span class="btn btn-danger btn-sm close-add-apprenant">fermer</span>
                        </div>
                </form>
            </div>    
            <main>
            <nav>
                <img src="./assets/logo.png" alt="youcode logo" id="logo"/>
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
                            <button class="add-club">
                                <i class="bi bi-house-add"></i>
                                ajouter club
                            </button>
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
                <h1>Bonjour
                    <?php if(isset($_SESSION["nom"])) echo $_SESSION["nom"];?>
                    !👋</h1>
            </div>
            <section class="cards">
                <div class="card_nbr" id="1">
                    <p class="nombre">
                        <?php
                            echo count($user->getClubs());
                        ?>
                    <p>
                    <p>nombre de clubs créer</p>
                </div>
                <div class="card_nbr" id="2">
                    <p class="nombre">
                        <?php
                            $tmp = new DB();
                            $tmp->init();

                            $query = "SELECT COUNT(*) FROM apprenant;";
                            $result = $tmp->conn->query($query);

                            echo $result->fetch_row()[0];
                        ?>
                    <p>
                    <p>nombre d'apprenants</p>
                </div>
                <div class="card_nbr" id="3">
                    <p class="nombre">
                        <?php
                            $tmp = new DB();
                            $tmp->init();

                            $query = "SELECT COUNT(*) FROM apprenant WHERE annee = 1;";
                            $result = $tmp->conn->query($query);

                            echo $result->fetch_row()[0];
                        ?>
                    <p>
                    <p>nombre d'apprenants du première année</p>
                </div>
                <div class="card_nbr" id="4">
                    <p class="nombre">
                        <?php
                            $tmp = new DB();
                            $tmp->init();

                            $query = "SELECT COUNT(*) FROM apprenant WHERE annee = 2;";
                            $result = $tmp->conn->query($query);

                            echo $result->fetch_row()[0];
                        ?>
                    <p>
                    <p>nombre d'apprenants du deuxième année</p>
                </div>
            </section>
            <section class="clubs">
                <?php
                    foreach($user->getClubs() as $club_){
                        echo '
                        <div class="card">
                    <img src="./assets/clubs/'.$club_->getImage().'" alt="club image" class="card-img-top"/>
                    <div class="card-body">
                        <p class="card-title">'.$club_->getNom().'<p>
                        <p>'.$club_->getTitre().'</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info text-color">voir le club</a>';
                        if(count($club_->getApprenants()) == 1)
                            echo '<div class="avatars float-right">
                                    <img src="./assets/guest.png" class="test"/>
                                  </div>';
                        else if(count($club_->getApprenants()) == 2)
                            echo '<div class="avatars float-right">
                                    <img src="./assets/guest.png" class="test"/>
                                    <img src="./assets/guest.png" class="test"/>
                                  </div>';
                        else if(count($club_->getApprenants()) == 3)
                            echo '<div class="avatars float-right">
                                          <img src="./assets/guest.png" class="test"/>
                                          <img src="./assets/guest.png" class="test"/>
                                          <img src="./assets/guest.png" class="test"/>
                                        </div>';
                        else if(count($club_->getApprenants()) > 3)
                                echo '<div class="avatars float-right">
                                            <img src="./assets/guest.png" class="test"/>
                                            <img src="./assets/guest.png" class="test"/>
                                            <img src="./assets/guest.png" class="test"/>
                                            <sup>+3</sup>
                                        </div>';

                    echo '   
                    </div>
                </div>';
                    }
                ?>
            </section>
        </main>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./src/scripts/index.js"></script>
</html>