<?php 

// trait Mixer{
//     private $power = '20';
//     public $model = "ABC";
//     protected $price = "20k BDT";
// }

abstract class Fruit{
    abstract public function showName();
    abstract public function showColor();
}


//Inheritance
class Juice extends Fruit{
    public function showName()
    {
        echo "Name of the Fruit!";
    }
    public function showColor()
    {
        return "Name of the Fruit!";
    }
}



// Instantiation
$juice = new Fruit;
$juice->showName();
//scope resolution operator (::)

$a = 1;
$a = 2;












?>