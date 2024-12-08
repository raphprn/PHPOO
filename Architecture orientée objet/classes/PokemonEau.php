<?php
class PokemonEau extends Pokemon
{
    public function __construct($nom, $pointsDeVie, $puissanceAttaque, $defense)
    {
        parent::__construct($nom, 'Eau', $pointsDeVie, $puissanceAttaque, $defense);
    }

    public function capaciteSpeciale($adversaire)
    {
        if ($adversaire->getType() == 'Feu') {
            $degats = $this->puissanceAttaque * 1.5;
            $adversaire->recevoirDegats($degats);
        } else {
            $adversaire->recevoirDegats($this->puissanceAttaque);
        }
    }
}
?>