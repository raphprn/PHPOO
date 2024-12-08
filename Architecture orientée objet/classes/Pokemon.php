<?php
abstract class Pokemon
{
    protected $nom;
    protected $type;
    protected $pointsDeVie;
    protected $puissanceAttaque;
    protected $defense;

    public function __construct($nom, $type, $pointsDeVie, $puissanceAttaque, $defense)
    {
        $this->nom = $nom;
        $this->type = $type;
        $this->pointsDeVie = $pointsDeVie;
        $this->puissanceAttaque = $puissanceAttaque;
        $this->defense = $defense;
    }

    public function attaquer($adversaire)
    {
        $degats = $this->puissanceAttaque - $adversaire->getDefense();
        $adversaire->recevoirDegats($degats);
    }

    public function recevoirDegats($degats)
    {
        $this->pointsDeVie -= $degats;
    }

    public function estKO()
    {
        return $this->pointsDeVie <= 0;
    }

    abstract public function capaciteSpeciale($adversaire);

    public function getDefense()
    {
        return $this->defense;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPointsDeVie()
    {
        return $this->pointsDeVie;
    }

    public function getType()
    {
        return $this->type;
    }
}
?>