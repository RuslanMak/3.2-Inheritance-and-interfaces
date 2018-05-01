<?php
/**
 * 1) Полеморфизм - это как бы многоформенное наследование. На примере когда у нас есть класс фигура и метод (функция)
 * которая рисует данный класс. И у нас есть ксассы квадрат, круг, триугольник которые разширени (унаследованы) от
 * класса фигура. Таким образом они рисуют каждая саму себя, но по разному.
 *
 * Наследование - это свойство классов расширяться (перенимать) свойства от родительского класса. Например родительский
 * класс телефон, а от него идут классы нокиа, айфон... У родителя есть свойства: екран, сим-карта...; нокиа и
 * айфон тоже унаследуют это свойство, но по мимо этого они могут иметь каждый свои собствинные свойства.
 * Например айфон имеет камеру и GPS..., а нокиа не имеет эти свойства, но у ней могут быть другие свойства
 *
 *
 * Абстрактный класс это как заготовка класса, которая не имеет своей реализации, а имеет базувую структуру свойств и
 * методов без оптеделенных значений. С помощью абстактных классов мы создаем обекты которые разширяются абстрактным
 * классом. В абстрактном классе можно использовать приватный и протектед типы видимости.
 * Интерфейс в отличии от абстрактного класса не наследуется, а реалезуется и может содержать только публичные методы.
 * Интерфейс может наследовать другой интерфейс. Классы могут содержать сколько угодно интерфейсов.
 * Если в абстрактном методе все члены публичные и не заложено ни одного поведения методов, тогда нужен интерфейс.
 * Интерфейс может использоваться в разных классах, например для стандартного вывода цены в разных продуктах
 *
 */

//-------------------------------------------MyInterface-------------------------------------------

interface MyConstruct
{
    public function __construct($name, $discount, $price);
}

interface MyPrice extends MyConstruct
{
    public function getPrice();
}

interface ChangeColor
{
    public function changeColor($color);
}

interface Category
{
    public function category($category);
}

//-------------------------------------------MySuperClass-------------------------------------------

class Products implements MyConstruct
{
    public $name;
    public $discount;
    public $price;

    public function getPrice()
    {
        if ($this->discount) {
            return round($this->price - ($this->price * $this->discount / 100));
        } else {
            return $this->price;
        }
    }

    public function __construct($name, $discount, $price)
    {
        $this->name = $name;
        $this->discount = $discount;
        $this->price = $price;
    }
}

//-------------------------------------------Classes-------------------------------------------
class CarClass extends Products implements MyPrice, ChangeColor
{
    private $color = 'White';
    public function changeColor($color)
    {
        $this->color = $color;
    }
}

class TV extends Products implements MyPrice
{
public $diagonal;
}

class BallPen extends Products implements MyPrice
{
    public $color;
}

class Duck extends Products implements MyPrice, ChangeColor
{
    private $color = 'White';
    public function changeColor($color)
    {
        $this->color = $color;
    }
}

class Product extends Products implements MyPrice, Category
{
    public function category($category)
    {
        $this->category = $category;
    }
}

//------------------------------------- Objects---------------------------------------------
//----------------CAR----------------
$bmw = new CarClass('BMW', '10', 700);
$bmw->changeColor('Blue');

$audi = new CarClass('AUDI', '10', 900);

//----------------TV-----------------
$lg = new TV('LG', '', 500);
$lg->diagonal = 42;

$sone = new TV('SONE', '10', 700);
$sone->diagonal = 80;

//----------------PEN-----------------
$parker = new BallPen('Parker', '10', 20);
$parker->color = 'Black';

$space_pen = new BallPen('Space Pen', 'Black', 70);
$space_pen->color = 'Black';

//----------------Duck-----------------
$american_pekin = new Duck('American Pekin', 10, 10);

$american_black_duck = new Duck('American black duck', '10', 11);
$american_black_duck->changeColor('Black');

//----------------Product-----------------
$cup = new Product('White cup', '10', 10);
$cup->category('Cups');

$book = new Product('Health', '10', 8);
$book->category('Books');


//-----------------------------------Echo------------------------------------------------------
echo "<h2>Car</h2>";
echo "<pre>";
print_r($bmw);
echo "Price for " . "$bmw->name: " . $bmw->getPrice() . "<br><br><br>";

print_r($audi);
echo "Price for " . "$audi->name: " . $audi->getPrice() . "<br><br><br>";

//------------TV--------------
echo "<h2>TV</h2>";
print_r($lg);
echo "Price for " . "$lg->name: " . $lg->getPrice() . "<br><br><br>";

print_r($sone);
echo "Price for " . "$sone->name: " . $sone->getPrice() . "<br>";

//------------Product--------------
echo "<h2>Product</h2>";
print_r($cup);
echo "Price for " . "$cup->name: " . $cup->getPrice() . "<br><br><br>";

print_r($book);
echo "Price for " . "$book->name: " . $book->getPrice() . "<br>";



