<?php
require_once 'classes/Pokemon.php';
require_once 'classes/PokemonFeu.php';
require_once 'classes/PokemonEau.php';
require_once 'classes/PokemonPlante.php';
require_once 'Combat.php';

$pokemons = [
    new PokemonFeu("Salamèche", 100, 30, 10),
    new PokemonFeu("Dracaufeu", 200, 50, 30),
    new PokemonEau("Carapuce", 100, 25, 15),
    new PokemonEau("Tortank", 180, 40, 20),
    new PokemonPlante("Bulbizarre", 100, 20, 15),
    new PokemonPlante("Florizarre", 180, 45, 25),
    new PokemonFeu("Reptincel", 120, 35, 15),
    new PokemonFeu("Pyroli", 160, 45, 25),
    new PokemonEau("Psykokwak", 100, 20, 10),
    new PokemonEau("Akwakwak", 160, 40, 20),
    new PokemonPlante("Chétiflor", 90, 18, 12),
    new PokemonPlante("Empiflor", 150, 40, 22),
];

$resultatCombat = "";

if (isset($_POST['pokemon1'], $_POST['pokemon2'])) {
    $index1 = intval($_POST['pokemon1']);
    $index2 = intval($_POST['pokemon2']);

    if (isset($pokemons[$index1], $pokemons[$index2])) {
        $pokemon1 = $pokemons[$index1];
        $pokemon2 = $pokemons[$index2];

        $combat = new Combat($pokemon1, $pokemon2);
        $resultatCombat = $combat->demarrerCombat();
    } else {
        $resultatCombat = "Les Pokémon sélectionnés sont invalides.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat Pokémon</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Combat Pokémon</h1>
    <div class="container">
        <form method="post">
            <h2>Choisissez vos Pokémon :</h2>
            <label for="pokemon1">Pokémon 1 :</label>
            <select name="pokemon1" id="pokemon1" required>
                <?php foreach ($pokemons as $index => $pokemon): ?>
                    <option value="<?= $index ?>"><?= $pokemon->getNom() ?> (<?= $pokemon->getType() ?>)</option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="pokemon2">Pokémon 2 :</label>
            <select name="pokemon2" id="pokemon2" required>
                <?php foreach ($pokemons as $index => $pokemon): ?>
                    <option value="<?= $index ?>"><?= $pokemon->getNom() ?> (<?= $pokemon->getType() ?>)</option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit">Lancer le combat</button>
        </form>

        <?php if ($resultatCombat): ?>
            <div class="result">
                <h3>Résultat du Combat :</h3>
                <p><?= nl2br($resultatCombat) ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>