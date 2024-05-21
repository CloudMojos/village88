<?php 
    class Character {
        public $health;
        public $mana;
        public $stamina;

        public function __construct() {
            $this->health = 100;
            $this->mana = 100;
            $this->stamina = 100;
        }

        public function walk() {
            if ($this->stamina > 0) {
                echo "Walking...";
                $this->stamina--;
            } else {
                echo "No stamina.";
            }
            echo "<br>";
            return $this;
        }

        public function run() {
            if ($this->stamina > 0) {
                echo "Running...";
                $this->stamina -= 3;
            } else {
                echo "No stamina.";
            }
            echo "<br>";
            return $this;
        }

        public function showStats() {
            var_dump($this);
        }
    }

    class Shaman extends Character {
        public function __construct() {
            $this->health = 150;
            $this->mana = 100;
            $this->stamina = 100;
        }

        public function heal() {
            echo "Healing!";
            $this->health += 5;
            $this->mana += 5;
            $this->stamina += 5;
            echo "<br>";
            return $this;
        }
    }

    class Swordsman extends Character {
        public function __construct() {
            $this->health = 170;
            $this->mana = 100;
            $this->stamina = 100;
        }

        public function slash() {
            if ($this->mana > 0) {
                echo "Slashing!";
                $this->mana -= 10;
            } else {
                echo "No mana.";
            }
            echo "<br>";
            return $this;
        }
    }

    $character = new Character();
    $character->showStats();
    $character->run()->run()->run();
    $character->showStats();
    $character->walk();
    $character->showStats();

    $shaman = new Shaman();
    $shaman->showStats();
    $shaman->walk()->walk()->walk()->run()->run()->heal();
    $shaman->showStats();

    $swordsman = new Swordsman();
    $swordsman->showStats();
    $swordsman->walk()->walk()->walk()->run()->run()->slash()->slash();
    $swordsman->showStats();

    $character->heal();
    $character->slash();
?>