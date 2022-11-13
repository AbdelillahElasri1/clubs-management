<?php
    require_once dirname(__FILE__)."/../DB/config.php";

    class Apprenant{

        private $id;
        private $nom;
        private $prenom;
        private $classe;
        private $annee;
        private $img_profile;

        //setters and getters

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
        *get prenom
        *@return string
        */

        function getPrenom(){
            return $this->prenom;
        }

        /*
        *get classe
        *@return string
        */

        function getClasse(){
            return $this->classe;
        }

        /*
        *get annee
        *@return string
        */

        function getAnnee(){
            return $this->annee;
        }

        /*
        *get prenom
        *@return string
        */

        function getImg_profile(){
            return $this->img_profile;
        }


        //setters

        /*
        *set id
        *@param int $id
        */

        
        function setId($id){
            $this->id = $id;
        }

        /*
        *modifier le nom de l'apprenant
        *@param string $nom 
        */

        function setNom($nom){
            $this->nom = $nom;
        }

        /*
        *modifier le prenom de l'apprenant
        *@param string $prenom 
        */

        function setPrenom($prenom){
            $this->prenom = $prenom;
        }

        /*
        *modifier le année de l'apprenant
        *@param int $annee 
        */

        function setAnnee($annee){
            $this->annee = $annee;
        }

        /*
        *modifier la classe de l'apprenant
        *@param string $classe 
        */

        function setClasse($classe){
            $this->classe = $classe;
        }

        /*
        *modifier l'imag de du profile de l'apprenant
        *@param string $img_profile 
        */

        function setImg_profile($img){
            $this->img_profile = $img;
        }

        //autre methodes

    }
?>