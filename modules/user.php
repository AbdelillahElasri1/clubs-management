<?php
    require_once dirname(__FILE__)."/../DB/config.php";
    require_once dirname(__FILE__)."/club.php";
    class User{
        private $id;
        private $email;
        private $nom;
        private $prenom;
        private $mdp;
        private $clubs = [];

        /*création des getters & setters*/
        //getters

        function getId(){
            return $this->id;
        }

        function getEmail(){
            return $this->email;
        }

        function getNom(){
            return $this->nom;
        }

        function getPrenom(){
            return $this->prenom;
        }

        function getMdp(){
            return $this->mdp;
        }

        /*
        *get clubs
        *@return array $clubs
        */

        function getClubs(){
            return $this->clubs;
        }

        //setters

        /*
        *modifier le nom de l'utilisateur
        *@param string $nom 
        */

        function setNom($nom){
            $this->nom = $nom;
        }

        /*
        *modifier le prenom de l'utilisateur
        *@param string $prenom 
        */

        function setPrenom($prenom){
            $this->prenom = $prenom;
        }

        /*
        *modifier le email de l'utilisateur
        *@param string $email 
        */

        function setEmail($email){
            $this->email = $email;
        }

        /*
        *modifier le mdp de l'utilisateur
        *@param string $mdp 
        */

        function setMdp($mdp){
            $option = [
                'cost' => 12,
            ];
            $this->mdp = password_hash($mdp, PASSWORD_BCRYPT, $option);
        }
        /*
        *set clubs
        *@param array clubs
        */

        function setClubs($clubs){
            $this->clubs = $clubs;
        }

        //autre methodes

        /*
        *créer un club
        *@param array $data
        */

        function ajouterclub($data){
            $tmp = new DB();
            $tmp->init();
            $newClub = new Club();

            $newClub->setNom($data['nom']);
            $newClub->setTitre($data['titre']);
            $newClub->setImg_club($data['image']);

            $query = "INSERT INTO club(nom, titre, image) VALUES ('{$newClub->getNom()}', '{$newClub->getTitre()}', '{$newClub->getImg_club()}');";
            $tmp->conn->query($query);
            $newClub->setId($tmp->conn->insert_id);

            array_push($this->clubs, $newClub);

            echo "club ajouter";

            //affecter la liste des apprenants du club

            // $query = "SELECT * FROM apprenant WHERE club_id = {$newClub->getId()};";
            // $result = $tmp->conn->query($query);
            // while($row = $result->fetch_array(MYSQLI_ASSOC)){
            //     $newApprenant = new Apprenant();
            //     $newApprenant->setId($row['id']);
            //     $newApprenant->setNom($row['nom']);
            //     $newApprenant->setPrenom($row['prenom']);
            //     $newApprenant->setClasse($row['classe']);
            //     $newApprenant->setAnnee($row['annee']);
            //     $newApprenant->setId($row['id']);
            //     $newApprenant->setImg_profile($row['img_profile']);


            // }
        }

        /*
        *afficher la liste des clubs
        @return array
        */

        function Clubs(){
            //echo count($this->getClubs());
            $tmp = new DB();
            $tmp->init();

            $query = "SELECT * FROM club;";
            $result = $tmp->conn->query($query);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){

                $newClub = new Club();
                $newClub->setId($row["id"]);
                $newClub->setNom($row["nom"]);
                $newClub->settitre($row["titre"]);
                $newClub->setDate_creation($row["date_creation"]);
                $newClub->setImg_Club($row["img_club"]);

                //liste des apprenants qui appartient a ce club

                $newClub->listeApprenants();
                array_push($this->clubs, $newClub);
            }
            //echo count(his->clubs)

            $tmp->close();

        }

        function initUser(){
            $tmp = new DB();
            $tmp->init();
            $this->setEmail("admin@test.com");
            $this->setNom("admin");
            $this->setPrenom("admin");
            $this->setMdp("admin");
            $result = $tmp->conn->query("INSERT INTO user(email, nom, prenom, mdp) VALUES ('{$this->email}', '{$this->nom}', '{$this->prenom}', '{$this->mdp}');");
            if(!$result)
                echo "error\n";
            else
                echo "user was created!\n";
            $tmp->close();
        }
    }

    //$tmp = new User();
    //$tmp->Clubs();
    //$tmp->initUser();
?>