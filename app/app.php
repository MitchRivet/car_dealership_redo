<?php
    //dependencies
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    //create and check cookie
    session_start();
    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }

    $ferrari = new Car("S430", 100000, 1, "http://lorempixel.com/output/transport-q-c-640-480-10.jpg");
    $chevy = new Car("Friendster", 500, 1, "http://lorempixel.com/output/transport-q-c-640-480-10.jpg");
    $_SESSION['list_of_cars'] = array($ferrari, $chevy);

    //initialize the application
    $app = new Silex\Application();
    $app['debug'] = true;
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    //routes
    $app->get("/", function() use ($app) {
        return $app['twig']->render('cars.html.twig');
    });

    // $app->post("/cars", function() use ($app){
    //     $car = new Car($_POST['model'], $_POST['price'], $_POST['miles'], $_POST['image']);
    //     $car->save();
    //     return $app['twig']->render('car_added.html.twig', array('newcar' => Car::getAll()));
    // });

    $app->get("/results", function() use ($app){
      $user_miles = $_GET['miles'];
      $user_price = $_GET['price'];
      $allcars = Car::getAll();
      $matching_cars = array();
      foreach ($allcars as $car) {
      // if ($user_miles < $car->miles && $user_price < $car->price)
      //   {array_push($matching_cars, $car);
      //   }
      // }

        if ($car->getMiles() < $user_miles && $car->getPrice() < $user_price)
        {array_push($matching_cars, $car);
        }
      }
        return $app['twig']->render('results.html.twig', array('matching_cars' => $matching_cars));
    });

return $app;

?>
