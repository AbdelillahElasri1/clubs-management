<?php
    require "./../DB/config.php";

    class Club{
        private $id;
        private $nom;
        private $date_creation;
        private $nbr_membre;
        private $titre;
        private $img_club;

        // création des getters & setters

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
    }
?>