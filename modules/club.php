<?php
    require "./../DB/config.php";
    require "./apprenant.php";

    class Club{
        private $id;
        private $nom;
        private $date_creation;
        private $nbr_membre = 0;
        private $titre;
        private $img_club;
        private $apprenants = [];

        // création des getters & setters

        //getters

        /*
        *get id
        *@return int
        */

        function getId(){
            return $this->id;
        }

        /*
        *get nom
        *@return string
        */

        function getNom(){
            return $this->nom;
        }

        /*
        *get date_creation
        *@return date
        */

        function getDate_creation(){
            return $this->date_creation;
        }

        /*
        *get nbr_membre
        *@return int
        */

        function getNbr_membre(){
            return $this->nbr_membre;
        }

        /*
        *get titre
        *@return string
        */

        function getTitre(){
            return $this->titre;
        }

        /*
        *get img_club
        *@return string
        */
        function getImage(){
            return $this->img_club;
        }

        /*
        *get apprenants
        *@return array $apprenants
        */

        function getApprenants(){
            return $this->apprenants;
        }


        //setters

        //autre methodes

        /*
        *ajouter un apprenant a un club
        *@param Apprenant $apprenant
        *@return boolean 
        */

        function ajouterApprenant($apprenant){
            $tmp = new DB();
            $tmp->init();
            if(count($this->apprenants) > 0){
                $tmp->conn->query("UPDATE apprenant SET club_id = {$this->getId()} WHERE id = {$apprenant->getId()}");
                array_push($this->apprenants, $apprenant);
                $this->nbr_membre++;
                return true;
            }else{
                foreach($this->apprenants as $a){
                    if($a->nom == $apprenant->nom && $a->prenom == $apprenant->prenom)
                        return false;
                    else{
                        $tmp->conn->query("UPDATE apprenant SET club_id = {$this->getId()} WHERE id = {$apprenant->getId()}");
                        array_push($this->apprenants, $apprenant);
                        $this->nbr_membre++;
                        return true;
                    }
                }
            }
            $tmp->close();
        }

        /*
        *retirer un apprenant du club
        *@param Apprenant $apprenant
        *@return boolean
        */

        function retirerApprenant($apprenant){
            $tmp = new DB();
            $tmp->init();
            for($i = 0;$i<count($this->apprenants);$i++)
                if($this->apprenants[$i]->nom == $apprenant->nom && $this->apprenants[$i]->prenom == $apprennat->prenom){
                    unset($this->apprenants[$i]);
                    $tmp->conn->query("UPDATE apprenant SET club_id = NULL WHERE id = {$apprenant->getId()}");
                    $tmp->close();
                    return true;
                }
            $tmp->close();
            return false;
        }

        /*
        *création d'un nouveau apprenant
        *@param array $data
        */

        function creerApprenant($data){
            $tmp = new DB();
            $tmp->init();
            $newApprenant = new Apprenant();

            $newApprenant->setNom($data['nom']);
            $newApprenant->setPrenom($data['prenom']);
            $newApprenant->setClasse($data['classe']);
            $newApprenant->setAnnee($data['annee']);
            $newApprenant->setImg_profile($data['img']);

            $query = "INSERT INTO apprenant(nom, prenom, classe, annee, img_profile) VALUES ('{$newApprenant->getNom()}', '{$newApprenant->getPrenom()}', '{$newApprenant->getClasse()}', {$newApprenant->getAnnee()}, '{$newApprenant->getImg_profile()}');";
            echo $query."\n";
            $result = $tmp->conn->query($query);

            if(!$result)
                echo "error\n";
            else
                echo "new apprenant created!\n";

            $tmp->close();

        }


    }

    // $tmp = new Club();

    // $data = [ 'nom' => 'a', 'prenom' => 'a', 'classe' => 'a', 'annee' => 1, 'img' => 'a'];

    // $tmp->creerApprenant($data);
?>