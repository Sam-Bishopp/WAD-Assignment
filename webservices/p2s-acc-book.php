<?php
    header("Content-type: application/json");
    
    $conn = new PDO("mysql:host=localhost;dbname=wad1920" ,"wad1920", "eengohph");
 
    $insert = "INSERT INTO acc_bookings (accID, thedate, npeople) VALUES (:accID, :thedate, :npeople)";
    //$insert = "INSERT INTO acc_bookings (accID, thedate, username, npeople) VALUES (:accID, :thedate, :username, :npeople)";

    $stmt = $conn->prepare($insert);

    $stmt->bindParam(':accID', $_REQUEST['accID']);
    $stmt->bindParam(':thedate', $_REQUEST['thedate']);
    //$stmt->bindParam(':username', $username);
    $stmt->bindParam(':npeople', $_REQUEST['npeople']);

    $stmt->execute();
    echo "Your booking has been made!";
?>