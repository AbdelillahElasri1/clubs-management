<?php
    require "./../DB/config.php";
    class User{
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

    $tmp = new User();
    $tmp->initUser();
?>