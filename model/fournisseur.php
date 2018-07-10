<?php
class Fournisseur
{
    private $id;
    private $nom;
    private $adresse;

    /**
     * Fournisseur constructor.
     * @param $id
     * @param $nom
     * @param $adresse
     */
    public function __construct($id, $nom, $adresse)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

}
?>