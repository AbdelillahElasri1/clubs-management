<?php
require_once dirname(__FILE__) . "/../DB/config.php";

class Apprenant
{

    private $id;
    private $nom;
    private $prenom;
    private $classe;
    private $annee;
    private $img_profile;
    private $responable;
    private $club_id;

    //setters and getters

    //getters

    /*
        *get id
        *@return int
        */

    function getId()
    {
        return $this->id;
    }

    /*
        *get nom
        *@return string
        */

    function getNom()
    {
        return $this->nom;
    }

    /*
        *get prenom
        *@return string
        */

    function getPrenom()
    {
        return $this->prenom;
    }

    /*
        *get classe
        *@return string
        */

    function getClasse()
    {
        return $this->classe;
    }

    /*
        *get annee
        *@return string
        */

    function getAnnee()
    {
        return $this->annee;
    }

    /*
        *get prenom
        *@return string
        */

    function getImg_profile()
    {
        return $this->img_profile;
    }

    /*
        *get responsable
        *@return boolean
        */

    function getResponsable()
    {
        return $this->responsable;
    }

    /*
    *get club id
    *@return int
    */

    function getClub_id()
    {
        return $this->club_id;
    }


    //setters

    /*
        *set id
        *@param int $id
        */


    function setId($id)
    {
        $this->id = $id;
    }

    /*
        *modifier le nom de l'apprenant
        *@param string $nom 
        */

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    /*
        *modifier le prenom de l'apprenant
        *@param string $prenom 
        */

    function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /*
        *modifier le année de l'apprenant
        *@param int $annee 
        */

    function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /*
        *modifier la classe de l'apprenant
        *@param string $classe 
        */

    function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /*
        *modifier l'imag de du profile de l'apprenant
        *@param string $img_profile 
        */

    function setImg_profile($img)
    {
        $this->img_profile = $img;
    }

    /*
        *set responable
        *@param boolean $bool
        */

    function setReponsable($bool)
    {
        $this->responsable = $bool;
    }

    /*
    *set club id
    *@param int $club_id
    */

    function setClub_id($club_id)
    {
        $this->club_id = $club_id;
    }

    //autre methodes

    /*
        *retourner les informations de l'apprenants avec l'id
        *@param int $id
        */

    function initId($id)
    {
        $tmp = new DB();
        $tmp->init();
        $query = "SELECT * FROM apprenant WHERE id = {$id};";
        $result = $tmp->conn->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);

        $this->setNom($row["nom"]);
        $this->setPrenom($row["prenom"]);
        $this->setAnnee($row["annee"]);
        $this->setClasse($row["classe"]);
        $this->setImg_profile($row["img_profile"]);
        $this->setClub_id($row['club_id']);
        $this->setId($row['id']);

        $tmp->close();
    }
}
