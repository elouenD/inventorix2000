<?php
class pret{
    private $id;
    private $dateDebut;
    private $dateFinPrevu;
    private $dateRendu;
    private $utilisateurId;
    private $materielId;

    /**
     * pret constructor.
     * @param $id
     * @param $dateDebut
     * @param $dateFinPrevu
     * @param $dateRendu
     * @param $utilisateurId
     * @param $materielId
     */
    public function __construct($id, $dateDebut, $dateFinPrevu, $dateRendu, $utilisateurId, $materielId)
    {
        $this->id = $id;
        $this->dateDebut = $dateDebut;
        $this->dateFinPrevu = $dateFinPrevu;
        $this->dateRendu = $dateRendu;
        $this->utilisateurId = $utilisateurId;
        $this->materielId = $materielId;
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
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFinPrevu()
    {
        return $this->dateFinPrevu;
    }

    /**
     * @param mixed $dateFinPrevu
     */
    public function setDateFinPrevu($dateFinPrevu)
    {
        $this->dateFinPrevu = $dateFinPrevu;
    }

    /**
     * @return mixed
     */
    public function getDateRendu()
    {
        return $this->dateRendu;
    }

    /**
     * @param mixed $dateRendu
     */
    public function setDateRendu($dateRendu)
    {
        $this->dateRendu = $dateRendu;
    }

    /**
     * @return mixed
     */
    public function getUtilisateurId()
    {
        return $this->utilisateurId;
    }

    /**
     * @param mixed $utilisateurId
     */
    public function setUtilisateurId($utilisateurId)
    {
        $this->utilisateurId = $utilisateurId;
    }

    /**
     * @return mixed
     */
    public function getMaterielId()
    {
        return $this->materielId;
    }

    /**
     * @param mixed $materielId
     */
    public function setMaterielId($materielId)
    {
        $this->materielId = $materielId;
    }



}
?>