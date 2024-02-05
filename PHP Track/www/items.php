<?php
    class Item {
        public $name;
        public $price;
        public $stock;
        public $sold;

        public function __construct($name, $price, $stock) {
            $this->name = $name;
            $this->price = $price;
            $this->stock = $stock;
            $this->sold = 0;
        }

        public function logDetails() {
            echo "Item: " . $this->name . "<br>";
            echo "Price: $" . $this->price . "<br>";
            echo "Stock: " . $this->stock . "<br>";
            echo "Sold: " . $this->sold . "<br>";
        }

        public function buy() {
            if ($this->stock > 0) {
                echo "Buying<br>";
                $this->stock--;
                $this->sold++;
            } else {
                echo "Out of stock<br>";
            }
        }

        public function return() {
            if ($this->sold > 0) {
                echo "Returning<br>";
                $this->stock++;
                $this->sold--;
            } else {
                echo "No items sold<br>";
            }
        }
    }

    $item1 = new Item("Item 1", 10, 5);
    $item1->buy();
    $item1->buy();
    $item1->buy();
    $item1->return();
    $item1->logDetails();

    $item2 = new Item("Item 2", 20, 3);
    $item2->buy();
    $item2->buy();
    $item2->return();
    $item2->return();
    $item2->logDetails();

    $item3 = new Item("Item 3", 30, 4);
    $item3->return();
    $item3->return();
    $item3->return();
    $item3->logDetails();
?>