<?php 

trait Mixer{
    private $power = '20';
    public $model = "ABC";
    protected $price = "20k BDT";
}

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

interface SoundInterface{
    public static function sound($var);
}

class Car implements SoundInterface{
    public function start(){
        echo "Car is started!";
    }
    public static function sound($var){
        echo gettype($var);
        echo '<br>';
    }
}

class Animal implements SoundInterface{
    public static function sound($var){
        echo gettype($var);
        echo '<br>';
    }
}

Car::sound(12);
Animal::sound('12');










































?>