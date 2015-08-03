<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;

    function worthBuying($max_price)
    {
        return $this->cost < ($max_price + 100);
    }

    function __construct($make_model, $price, $miles)
    {
        $this->model = $make_model;
        $this->cost = $price;
        $this->mileage = $miles;
    }

    function getModel()
    {
        return $this->model;
    }

    function getCost()
    {
        return $this->cost;
    }

    function getMileage()
    {
        return $this->mileage;
    }

    function setModel($new_model)
    {
        if (is_string($new_model)){
            $this->model = $new_model;
        }
    }

    function setCost($new_cost)
    {
        $int_price = (int) $new_cost;
        if ($int_price != 0) {
            $this->cost = $int_price;
        }
    }

    function setMileage($new_mileage)
    {
        $int_miles = (int) $new_mileage;
        if ($int_miles != 0) {
            $this->mileage = $int_miles;
        }
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864);
$ford = new Car("2011 Ford F450", 55995, 14241);
$lexus = new Car("2013 Lexus RX 350", 44700, 20000);
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying ($_GET['price'])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                echo "<li> $car->model </li>";
                echo "<ul>";
                    echo "<li> $$car->cost </li>";
                    echo "<li> Miles: $car->mileage </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
