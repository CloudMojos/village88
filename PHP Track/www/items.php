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
            return $this;
        }

        public function return() {
            if ($this->sold > 0) {
                echo "Returning<br>";
                $this->stock++;
                $this->sold--;
            } else {
                echo "No items sold<br>";
            }
            return $this;
        }
    }

    $item1 = new Item("Item 1", 10, 5);
    $item1->buy()->buy()->buy()->return();
    $item1->logDetails();

    echo "<br>";

    $item2 = new Item("Item 2", 20, 3);
    $item2->buy()->buy()->return()->return();
    $item2->logDetails();

    echo "<br>";

    $item3 = new Item("Item 3", 30, 4);
    $item3->return()->return()->return();
    $item3->logDetails();
?>