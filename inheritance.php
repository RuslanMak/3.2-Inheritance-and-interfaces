<?php
/**
 * 1) Полеморфизм - это как бы многоформенное наследование. На примере когда у нас есть класс фигура и метод (функция) которая
 * рисует данный класс. И у нас есть ксассы квадрат, круг, триугольник которые разширени (унаследованы) от класса фигура.
 * Таким образом они рисуют каждаю саму себя, но по разному.
 *
 * Наследование - это свойство классов расширяться (перенимать) свойства от родительского класса. Например родительский
 * класс телефон, а от него идут классы нокиа, айфон... У родителя есть свойства: екран, сим-карта...; нокиа и
 * айфон тоже унаследуют это свойство, но по мимо этого они могут иметь каждый свои собствинные свойства.
 * Например айфон имеет камеру и GPS..., а нокиа не имеет эти свойства, но у ней могут быть другие свойства
 *
 *
 * More will be soon:)
 */

//-------------------------------------------Classes-------------------------------------------
class CarClass
{
    public $name;
    private $color = 'White';
    public $price;

    public function changeColor($color)
    {
        $this->color = $color;
    }
}

class TV
{
    private $price;
    public function __construct($name, $diameter, $discount, $price)
    {
        $this->name = $name;
        $this->diameter = $diameter;
        $this->discount = $discount;
        $this->price = $price;
    }

    public function getPrice()
    {
        if ($this->discount) {
            return round($this->price - ($this->price * $this->discount / 100));
        } else {
            return $this->price;
        }
    }
}

class BallPen
{
    private $price;
    public function __construct($name, $color, $discount, $price)
    {
        $this->name = $name;
        $this->color = $color;
        $this->discount = $discount;
        $this->price = $price;
    }

    public function getPrice()
    {
        if ($this->discount) {
            return round($this->price - ($this->price * $this->discount / 100));
        } else {
            return $this->price;
        }
    }
}

class Duck
{
    public function __construct($name, $color, $price)
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
    }
}

class Product
{
    private $price;
    public function __construct($category, $name, $discount, $price)
    {
        $this->category = $category;
        $this->name = $name;
        $this->discount = $discount;
        $this->price = $price;
    }

    public function getPrice()
    {
        if ($this->discount) {
            return round($this->price - ($this->price * $this->discount / 100));
        } else {
            return $this->price;
        }
    }
}

//------------------------------------- Objects---------------------------------------------
//----------------CAR----------------
$bmw = new CarClass();
$bmw->name = "BMW";
$bmw->new = "NEW - Mожно ли так создавать новое свойство?";  // --- Mожно ли так создавать новое свойство???
$bmw->price = 1100;
$bmw->changeColor('Blue');

$audi = new CarClass();
$audi->name = "AUDI";
$audi->price = 900;

//----------------TV-----------------
$lg = new TV('LG', 24, '', 500);
$sone = new TV('SONE', 42, '10', 700);

//----------------PEN-----------------
$parker = new BallPen('Parker', 'Black', '', 20);
$space_pen = new BallPen('Space Pen', 'Black', '', 70);

//----------------Duck-----------------
$american_pekin = new Duck('American Pekin', 'White', 10);
$american_black_duck = new Duck('American black duck', 'Black', 11);

//----------------TV-----------------
$cup = new Product('Cups', 'White cup', '', 2);
$book = new Product('Books', 'Health', '', 5);


//-----------------------------------Echo-----------------
echo "<pre>";
print_r($bmw);
echo "<br>";

print_r($audi);
echo "<br><br><br><br><br><br>";

//------------TV--------------
print_r($lg);
echo "Price for " . "$lg->name: " . $lg->getPrice() . "<br><br><br>";

print_r($sone);
echo "Price for " . "$sone->name: " . $sone->getPrice() . "<br>";





