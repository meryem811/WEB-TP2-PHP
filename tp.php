

<!DOCTYPE html>
<html lang ="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Jeu Pokémon</title>
</head>
<body>
    <h1> Bienvenu dans notre Jeu Pokémon !!</h1>
    <?php 

    class Pokemon {
        private $name ;
        private $url; 
        private $hp ;
        private $attackPokemon ;
        private $type;

        public function __construct($name, $url, $hp, AttackPokemon $attaque) {
            $this->name = $name;
            $this->url = $url;
            $this->hp = $hp;
            $this->attackPokemon = $attaque;
        }
        public function getName() {
            return $this->name;
        }
    
        public function getHp() {
            return $this->hp;
        } 

        public function getType(){
            return "Normal" ;
        }

        public function getAttackPokemon(){
            return $this->attackPokemon ;
        }

        public function setHp($nouvelleValeur) {
            $this->hp = max(0, $nouvelleValeur); 
        }

        public function isDead() {
            return $this->hp <= 0;
        }

        public function attack(Pokemon $pokemonAttaqué) {
            $perte = $this->attackPokemon->getAttackPoints();
            if (rand(1, 100) <= $this->attackPokemon->getProbabilitySpecialAttack()) {
                $perte *= $this->attackPokemon->getSpecialAttack();
            }
            $pokemonAttaqué->hp -= $perte;
            if ($pokemonAttaqué->hp < 0) $pokemonAttaqué->hp = 0;
        }

        public function whoAmI(){
            return "
            <div class='row'>
                <div class='col'>
                    Nom : {$this->name}
                </div>
                <div class='col'>
                    <img src='{$this->url}' alt='{$this->name}' height='100'><br>
                </div>
            </div>
            <div class='row'>
                Type : {$this->getType()}
            </div>
            <div class='row'>
                Points: {$this->hp}
            </div>
            <div class='row'>
                Min attack points : {$this->attackPokemon->getAttackMinimal()}
            </div>
            <div class='row'>
                Max attack points : {$this->attackPokemon->getAttackMaximal()}
            </div>
            <div class='row'>
                Special attack : {$this->attackPokemon->getSpecialAttack()}
            </div>
            <div class='row'>
                    Probability spacial attack : {$this->attackPokemon->getProbabilitySpecialAttack()}
            </div>
            ";
        }
    }


    class AttackPokemon {
        private  $attackMinimal;
        private  $attackMaximal;
        private  $specialAttack;
        private  $probabilitySpecialAttack;

        public function __construct($attackMinimal, $attackMaximal, $specialAttack, $probabilitySpecialAttack) {
            $this->attackMinimal = $attackMinimal;
            $this->attackMaximal = $attackMaximal;
            $this->specialAttack = $specialAttack;
            $this->probabilitySpecialAttack = $probabilitySpecialAttack;
        }

        public function getAttackMinimal(){
            return $this->attackMinimal ;
        }
        public function getAttackMaximal(){
            return $this->attackMaximal ;
        }
        public function getAttackPoints() {
            return rand($this->attackMinimal, $this->attackMaximal);
        }

        public function getProbabilitySpecialAttack(){
            return $this->probabilitySpecialAttack ;
        }
        
        public function getSpecialAttack() {
            return $this->specialAttack;
        }

    }


    class PokemonFeu extends Pokemon {
        public function __construct($name, $url, $hp, AttackPokemon $attaque) {
            parent::__construct($name, $url, $hp, $attaque);
        }

        public function getType() {
            return "Feu";
        }

        public function attack(Pokemon $pokemonAttaqué) {
            $perte = $this->getAttackPokemon()->getAttackPoints();
            if (rand(1, 100) <= $this->getAttackPokemon()->getProbabilitySpecialAttack()) {
                $perte *= $this->getAttackPokemon()->getSpecialAttack();
            }

            $type = $pokemonAttaqué->getType();
            if ($type === "Plante") {
                $perte *= 2;
            } elseif ($type === "Feu" || $type === "Eau") {
                $perte *= 0.5;
            }

            $nouvelleVal = $pokemonAttaqué->getHp() - $perte;
            if ($pokemonAttaqué->getHp() < 0) $nouvelleVal = 0;
            $pokemonAttaqué->setHp($nouvelleVal);
        }
    }

    class PokemonEau extends Pokemon {
        public function __construct($name, $url, $hp, AttackPokemon $attaque) {
            parent::__construct($name, $url, $hp, $attaque);
        }

        public function getType() {
            return "Eau";
        }

        public function attack(Pokemon $pokemonAttaqué) {
            $perte = $this->getAttackPokemon()->getAttackPoints();

            if (rand(1, 100) <= $this->getAttackPokemon()->getProbabilitySpecialAttack()) {
                $perte *= $this->getAttackPokemon()->getSpecialAttack();
            }

            $type = $pokemonAttaqué->getType();
            if ($type === "Feu") {
                $perte *= 2;
            } elseif ($type === "Eau" || $type === "Plante") {
                $perte *= 0.5;
            }

            $nouvelleVal = $pokemonAttaqué->getHp() - $perte;
            if ($pokemonAttaqué->getHp() < 0) $nouvelleVal = 0;
            $pokemonAttaqué->setHp($nouvelleVal);    
        }
    }

    class PokemonPlante extends Pokemon {
        public function __construct($name, $url, $hp, AttackPokemon $attaque) {
            parent::__construct($name, $url, $hp, $attaque);
        }

        public function getType() {
            return "Plante";
        }

        public function attack(Pokemon $pokemonAttaqué) {
            $perte = $this->getAttackPokemon()->getAttackPoints();

            if (rand(1, 100) <= $this->getAttackPokemon()->getProbabilitySpecialAttack()) {
                $perte *= $this->getAttackPokemon()->getSpecialAttack();
            }

            $type = $pokemonAttaqué->getType();
            if ($type === "Eau") {
                $perte *= 2;
            } elseif ($type === "Feu" || $type === "Plante") {
                $perte *= 0.5;
            }
            $nouvelleVal = $pokemonAttaqué->getHp() - $perte;
            if ($pokemonAttaqué->getHp() < 0) $nouvelleVal = 0;
            $pokemonAttaqué->setHp($nouvelleVal);

            return "
                <div class ='row'> 
                <div class='col'>
                    {$this->whoAmI()}
                </div>
                <div class='col'>
                    {$pokemonAttaqué->whoAmI()}
                </div>
            </div>
            ";
        }
    }

    // Création des objets pokémon :
    $attaque1 = new AttackPokemon(10, 20, 2, 30); 
    $attaque2 = new AttackPokemon(20, 30, 5, 20); 

    $Bulbizarre = new PokemonPlante("Bulbizarre", "https://www.pokepedia.fr/images/thumb/e/ef/Bulbizarre-RFVF.png/250px-Bulbizarre-RFVF.png", 100, $attaque1);
    $squirtle = new PokemonEau("Squirtle", "https://assets.pokemon.com/assets/cms2/img/pokedex/full//007.png", 100, $attaque2);

    // Affichage des infos pour la première fois avant le combat :
    echo "
        <div class ='row' style=' background-color : lightblue ; margin:30px;'>
            Les combattants
        </div>
        <div class='container'>
            <div class ='row'> 
                <div class='col'>
                    {$Bulbizarre->whoAmI()}
                </div>
                <div class='col'>
                    {$squirtle->whoAmI()}
                </div>
            </div>
        </div>
        
    ";

    //début du combat + affichage des infos de chaque round
    $round = 1;
    while (!$Bulbizarre->isDead() && !$squirtle->isDead()) {
        $Bulbizarre->attack($squirtle);
        if ($squirtle->isDead()) {
            echo "
            <div class ='row' style=' background-color : pink ; margin:30px;'>
                Round {$round} :  
                <div class='col'>
                    {$Bulbizarre->getHp()}
                </div>
                <div class='col'>
                    {$squirtle->getHp()}
                </div>
            </div>
            <p style='text-align:center;'><strong>Bulbizarre</strong> a gagné avec {$Bulbizarre->getHp()} points</p>
            ";
            break;
        }
        
        $squirtle->attack($Bulbizarre);
        if ($Bulbizarre->isDead()) {
            echo "
            <div class ='row' style=' background-color : pink ; margin:30px;'>
                Round {$round} :  
                <div class='col'>
                    {$Bulbizarre->getHp()}
                </div>
                <div class='col'>
                    {$squirtle->getHp()}
                </div>
            </div>
            <p style='text-align:center;'><strong>Squirtle</strong> a gagné avec {$squirtle->getHp()} points</p>
            ";
            break;
        }
        echo "
        <div class ='row' style=' background-color : pink ; margin:30px;'>
            Round {$round} : 
            <div class='col'>
                {$Bulbizarre->getHp()}
            </div>
            <div class='col'>
                {$squirtle->getHp()}
            </div>
        </div>
        ";
        
        $round++;   
    }

?>

</body>
</html>