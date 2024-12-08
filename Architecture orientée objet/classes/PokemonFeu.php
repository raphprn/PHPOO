<?php
class PokemonFeu extends Pokemon
{
    public function __construct($nom, $pointsDeVie, $puissanceAttaque, $defense)
    {
        parent::__construct($nom, 'Feu', $pointsDeVie, $puissanceAttaque, $defense);
    }

    public function capaciteSpeciale($adversaire)
    {
        if ($adversaire->getType() == 'Plante') {
            $degats = $this->puissanceAttaque * 1.5;
            $adversaire->recevoirDegats($degats);
        } else {
            $adversaire->recevoirDegats($this->puissanceAttaque);
        }
    }
}
?>