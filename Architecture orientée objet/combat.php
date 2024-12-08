<?php
class Combat
{
    private $pokemon1;
    private $pokemon2;

    public function __construct($pokemon1, $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function demarrerCombat()
    {
        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);
            if (!$this->pokemon2->estKO()) {
                $this->tourDeCombat($this->pokemon2, $this->pokemon1);
            }
        }
        return $this->determinerVainqueur();
    }

    public function tourDeCombat($attaquant, $defenseur)
    {
        echo $attaquant->getNom() . " attaque " . $defenseur->getNom() . "<br>";
        $attaquant->capaciteSpeciale($defenseur);
        echo $defenseur->getNom() . " perd " . ($attaquant->getPointsDeVie() - $defenseur->getPointsDeVie()) . " points de vie.<br>";
    }

    public function determinerVainqueur()
    {
        if ($this->pokemon1->estKO()) {
            return $this->pokemon2->getNom() . " est le vainqueur!";
        } else {
            return $this->pokemon1->getNom() . " est le vainqueur!";
        }
    }
}
?>