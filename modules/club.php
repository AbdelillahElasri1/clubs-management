<?php
    require "./../DB/config.php";

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

        function ajouterApprenants($apprenant){
            if(count($this->apprenants) > 0){
                //ajouter la method de mise ajout de l'id du club
                array_push($this->apprenants, $apprenant);
                $this->nbr_membre++;
                return true;
            }else{
                foreach($this->apprenants as $a){
                    if($a->nom == $apprenant->nom && $a->prenom == $apprenant->prenom)
                        return false;
                    else{
                        //ajouter la method de mise ajout de l'id du club
                        array_push($this->apprenants, $apprenant);
                        $this->nbr_membre++;
                        return true;
                    }
                }
            }
        }

        /*
        *retirer un apprenant du club
        *@param Apprenant $apprenant
        *@return boolean
        */

        function retirerApprenant($apprenant){
            for($i = 0;$i<count($this->apprenants);$i++)
                if($this->apprenants[$i]->nom == $apprenant->nom && $this->apprenants[$i]->prenom == $apprennat->prenom){
                    unset($this->apprenants[$i]);
                    //ajouter la method pour enlever l'id du club pour l'apprenant
                    return true;
                }
            return false;
        }

        function ajouterClub(){
            $tmp = new DB();
        }
    }
?>