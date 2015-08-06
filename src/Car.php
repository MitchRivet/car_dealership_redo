<?php
  class Car
  {
        private $model;
        private $price;
        private $miles;
        private $image;

  function __construct($model, $price, $miles, $image)
  {
        $this->model = $model;
        $this->price = $price;
        $this->miles= $miles;
        $this->image = $image;
  }

  function getModel()
    {
        return $this->model;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getMiles()
    {
        return $this->miles;
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

    function setPrice($new_price)
    {
        $int_price = (int) $new_price;
        if ($int_price != 0) {
            $this->price = $int_price;
        }
    }

    function setMiles($new_miles)
    {
        $int_miles = (int) $new_miles;
        if ($int_miles != 0) {
            $this->miles = $int_miles;
        }
    }

    function setImage($new_image)
    {
        if (is_string($new_image)){
            $this->image = $new_image;
        }
    }

    static function getAll()
    {
        return $_SESSION['list_of_cars'];
    }
  }
?>
