<?php 
    class House {
        public $location;
        public $price;
        public $lot;
        public $type;
        public $discount;
        public $total_price;

        public function __construct($location, $price, $lot, $type) {
            $this->location = $location;
            $this->price = $price;
            $this->lot = $lot . "sqm";
            $this->type = $type;
            $this->discount = $this->find_discount($type);
            $this->total_price = $this->calculate_total_price($this->price, $this->discount);
        }

        public function show_all() {
            return [$this->location, $this->price, $this->lot, $this->type, $this->discount, $this->total_price];
        }

        public function find_discount($type) {
            if ($type == "Pre-selling") {
                return 0.2;
            } else if ($type == "Ready for Occupancy") {
                return 0.05;
            } else { return 0; }
        }

        public function calculate_total_price($price, $discount) {
            return $price - ($price * $discount);
        }
    }

    $house1 = new House("La Union", 1500000, "100", "Pre-selling");
    var_dump($house1->show_all());

    $house1 = new House("Metro Manila", 1000000, "150", "Ready for Occupancy");
    var_dump($house1->show_all());
?>