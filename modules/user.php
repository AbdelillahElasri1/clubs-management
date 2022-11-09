<?php
    require_once "./../DB/config.php";
    class User extends DB{
        private $id;
        private $email;
        private $nom;
        private $prenom;
        private $mdp;

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

        //setters

        function setId($id){
            $this->id = $id;
        }

        function setNom($nom){
            $this->nom = $nom;
        }

        function setPrenom($prenom){
            $this->prenom = $prenom;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function setMdp($mdp){
            $option = [
                'cost' => 12,
            ];
            $this->mdp = password_hash($mdp, PASSWORD_BCRYPT, $option);
        }

        //modifier 
    }
?>