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

$mango = new mango('Mango', 'Yellow');

echo '<pre>';
print_r($mango->showFruitName());
echo '</pre>';













?>