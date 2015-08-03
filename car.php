<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $picture;

    function worthBuying($max_price, $max_mileage)
    {
        return $this->cost < ($max_price) && $this->mileage < ($max_mileage);
    }

    function __construct($make_model, $price, $miles, $picture)
    {
        $this->model = $make_model;
        $this->cost = $price;
        $this->mileage = $miles;
        $this->image = $picture;
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

    function getImage()
    {
        return $this->image;
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

    function setImage($new_image)
    {
        if (is_string($new_image)){
            $this->image = $new_image;
        }
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864, "img/porsche.png");
$ford = new Car("2011 Ford F450", 55995, 14241, "img/ford.png");
$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "img/lexus.png");
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "img/mercedes.png");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying ($_GET['price'], $_GET['mileage'])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>

    <?php
    if (empty($cars_matching_search)) {
        echo "<h1> No cars matching search! </h1>";
    } else {
        foreach ($cars_matching_search as $car) {
            echo "<div class='container'>
                <div class='row'>
                    <div class='col-md-6'>
                        <img src ='$car->image' alt='An image of $car->model'>
                    </div>
                    <div class='col-md-6'>
                    <li>$car->model</li>
                        <ul>
                            <li>$$car->cost</li>
                            <li>Miles: $car->mileage</li>
                        </ul>
                    </div>
                </div>
            </div>
            ";
            }
        }
    ?>

</body>
</html>
