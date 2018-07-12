<?php
class Materiel
{
    private $id;
    private $codeBarre;
    private $nom;
    private $description;
    private $dateAchat;
    private $prixAchat;
    private $deleted;
    private $fournisseur;
    private $fournisseurId;

    /**
     * materiel constructor.
     * @param $id
     * @param $codeBarre
     * @param $nom
     * @param $description
     * @param $dateAchat
     * @param $prixAchat
     * @param $deleted
     * @param $fournisseur
     * @param $fournisseurId
     */
    public function __construct($id, $codeBarre, $nom, $description, $dateAchat, $prixAchat, $deleted, $fournisseur, $fournisseurId)
    {
        $this->id = $id;
        $this->codeBarre = $codeBarre;
        $this->nom = $nom;
        $this->description = $description;
        $this->dateAchat = $dateAchat;
        $this->prixAchat = $prixAchat;
        $this->deleted = $deleted;
        $this->fournisseur = $fournisseur;
        $this->fournisseurId = $fournisseurId;
    }

    /**
     * @return mixed
     */
    public function getFournisseurId()
    {
        return $this->fournisseurId;
    }

    /**
     * @param mixed $fournisseurId
     */
    public function setFournisseurId($fournisseurId)
    {
        $this->fournisseurId = $fournisseurId;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCodeBarre()
    {
        return $this->codeBarre;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getDateAchat()
    {
        return $this->dateAchat;
    }

    /**
     * @return mixed
     */
    public function getPrixAchat()
    {
        return $this->prixAchat;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @return mixed
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }




}
?>


