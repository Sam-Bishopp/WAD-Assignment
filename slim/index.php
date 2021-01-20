<?php
//use Psr\Http\Message\ServerRequestInterface as Request;
//use Psr\Http\Message\ResponseInterface as Response;

require '/var/www/html/share/vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

$container['db'] = function() {
    $conn = new PDO("mysql:host=localhost;dbname=wad1920" ,"wad1920", "eengohph");
    return $conn;
};

$app->get('/location/{location}', function($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT name, type, location, description FROM accommodation WHERE location=?");
    $stmt->bindParam (1, $args["location"]);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res->withJson($results);
});

$app->get('/location/{location}/type/{type}', function($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT name, type, location, description FROM accommodation WHERE type=? AND location=?");
    $stmt->bindParam (1, $args["type"]);
    $stmt->bindParam (2, $args["location"]);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res->withJson($results);
});

$app->get('/locationAjax/{location}', function($req, $res, array $args) {
    $stmt = $this->db->prepare("SELECT * FROM accommodation WHERE location=?");
    $stmt->bindParam (1, $args["location"]);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res->withJson($results);
});

//$app->post('/booking/create', function($req, $res, array $args) {
    //$post = $req->getParsedBody();
    //$res->getBody()->write("Booking Details : \nAccommodation ID: ". $post['accID']. "\nDate Booked: ". $post['thedate']. "\nNumber of People: ". $post['npeople']);
    //$stmt = $this->db->prepare("INSERT INTO acc_bookings (accID, thedate, npeople) VALUES (accID=?, thedate=?, npeople=?)");
    //$stmt->bindParam(1, $args->$post['accID']);
    //$stmt->bindParam(2, $args->$post['thedate']);
    //$stmt->bindParam(3, $args->$post['npeople']);
    //$stmt->execute();
    //return $res;
//});

$app->post('/booking/create', function($req, $res, array $args) {
    $post = $req->getParsedBody();
    //$res->getBody()->write("Booking Details : \nAccommodation ID: ". $post['accID']. "\nDate Booked: ". $post['thedate']. "\nNumber of People: ". $post['npeople']);
    $stmt = $this->db->prepare("INSERT INTO acc_bookings (accID, thedate, npeople) VALUES (:accID, :thedate, :npeople)");
    $stmt->bindParam(':accID', $_REQUEST['accID']);
    $stmt->bindParam(':thedate', $_REQUEST['thedate']);
    $stmt->bindParam(':npeople', $_REQUEST['npeople']);
    $stmt->execute();
    echo "Your booking has been made!";
    //return $res;
});

$app->run();
?>