<?php
class PokemonPlante extends Pokemon
{
    public function __construct($nom, $pointsDeVie, $puissanceAttaque, $defense)
    {
        parent::__construct($nom, 'Plante', $pointsDeVie, $puissanceAttaque, $defense);
    }

    public function capaciteSpeciale($adversaire)
    {
        if ($adversaire->getType() == 'Eau') {
            $degats = $this->puissanceAttaque * 1.5;
            $adversaire->recevoirDegats($degats);
        } else {
            $adversaire->recevoirDegats($this->puissanceAttaque);
        }
    }
}
?>