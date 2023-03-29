<?php 

class fruit{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function showFruitName(){
        print "This is a ".$this->name;
    }
}

class mango extends fruit{
    public $species = "Fozli";

    public function showSpecies(){
        print "I am ".$this->species." Mango";
    }
}

class Vehicle {
    public $name;
    public $color;
    public $model;

    public function __construct($name, $color, $model) {
        $this->name = $name;
        $this->color = $color;
        $this->model = $model;
    }

    public function getName() {
        return $this->name;
    }
}

trait Weapon {
    public $fire_power = "1000";
}

class Tank extends Vehicle{
    use Weapon;
    public static $model_of_tank = "T-80";

    public static function fire() {
        echo "Tank is firing";
        echo "<br>";
    }
}



echo Tank::$model_of_tank;


// $new_machine = new Tank("Tank", "Black", "T-80");
// echo $new_machine->fire();















?>