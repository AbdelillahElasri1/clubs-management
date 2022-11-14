<?php
    require_once dirname(__FILE__)."/../DB/config.php";
    require_once dirname(__FILE__)."/apprenant.php";

    class Club{
        private $id;
        private $nom;
        private $date_creation;
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

        /*
        *set id
        *@param int $id
        */

        function setId($id){
            $this->id = $id;
        }

        /*
        *set nom
        *@param string $nom
        */

        function setNom($nom){
            $this->nom = $nom;
        }

        /*
        *set date_creation
        *@param date $date_creation
        */

        function setDate_creation($date_creation){
            $this->date_creation = $date_creation;
        }


        /*
        *set titre
        *@param string $titre
        */

        function setTitre($titre){
            $this->titre = $titre;
        }

        /*
        *set img_club
        *@param string $img_club
        */

        function setImg_club($img_club){
            $this->img_club = $img_club;
        }

        /*
        *set apprenants
        *@param array $apprenant
        */

        function setApprenants($apprenants){
            $this->apprenants = $apprenants;
        }

        //autre methodes

        /*
        *ajouter un apprenant a un club
        *@param Apprenant $apprenant
        *@return boolean 
        */

        function ajouterApprenant($apprenant){
            $tmp = new DB();
            $tmp->init();
            if(count($this->apprenants) == 0){
                echo "UPDATE apprenant SET club_id = {$this->getId()} WHERE id = {$apprenant->getId()}\n";
                $tmp->conn->query("UPDATE apprenant SET club_id = {$this->getId()} WHERE id = {$apprenant->getId()}");
                array_push($this->apprenants, $apprenant);
                return true;
            }else{
                foreach($this->apprenants as $a){
                    if($a->nom == $apprenant->nom && $a->prenom == $apprenant->prenom)
                        return false;
                    else{
                        echo "UPDATE apprenant SET club_id = {$this->getId()} WHERE id = {$apprenant->getId()}\n";
                        $tmp->conn->query("UPDATE apprenant SET club_id = {$this->getId()} WHERE id = {$apprenant->getId()}");
                        array_push($this->apprenants, $apprenant);
                        return true;
                    }
                }
            }
            $tmp->close();
        }

        /*
        *retirer un apprenant du club
        *@param int $id
        *@return boolean
        */

        function retirerApprenant($id){
            $tmp = new DB();
            $tmp->init();
            for($i = 0;$i<count($this->apprenants);$i++)
                if($this->apprenants[$i]->getId() == $id){
                    unset($this->apprenants[$i]);
                    $tmp->conn->query("UPDATE apprenant SET club_id = NULL WHERE id = $id");
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
            $result = $tmp->conn->query($query);

            if(!$result)
                echo "error\n";
            else
                echo "new apprenant created!\n";

            $newApprenant->setId($tmp->conn->insert_id);
            $this->ajouterApprenant($newApprenant);

            $tmp->close();

        }

        /*
        *supprimer apprenant
        *@param int $id
        */

        function supprimerApprenant($id){
            $tmp = new DB();
            $tmp>init();

            $query = "DELETE FROM apprenant WHERE id = {$id};";
            $tmp->conn->query($query);

            
        }

        /*
        *liste des apprenants
        */

        function listeApprenants(){
            $tmp = new DB();
            $tmp->init();
            $query = "SELECT * from apprenant WHERE club_id = {$this->getId()};";
            $result = $tmp->conn->query($query);
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $newApprenant = new Apprenant();
                $newApprenant->setId($row['id']);
                $newApprenant->setNom($row['nom']);
                $newApprenant->setPrenom($row['prenom']);
                $newApprenant->setClasse($row['classe']);
                $newApprenant->setAnnee($row['annee']);
                $newApprenant->setImg_profile($row['img_profile']);
                array_push($this->apprenants, $newApprenant);
            }
            $tmp->close();
        }

    }

    //$tmp = new Club();

    //$data = [ 'nom' => 'bb', 'prenom' => 'bb', 'classe' => 'a', 'annee' => 1, 'img' => 'a'];

    //$tmp->creerApprenant($data);
?>