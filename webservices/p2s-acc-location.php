<?php
    $l = $_GET["location"];
?>

<html>
    <head>
        <title>Location Search Results</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <?php
            echo "<h1>Search Results by Location: $l</h1> <br/>";
        ?>

        <?php
            $connection = curl_init();
            curl_setopt($connection, CURLOPT_URL, "https://edward2.solent.ac.uk/~wad1920/slim/location/$l");
            curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($connection, CURLOPT_HEADER, 0);
            $response = curl_exec($connection);
            curl_close($connection);

            $json = $response;
            $data = json_decode($json, true);
            for($i=0; $i<count($data); $i++)
            {
                echo "Name: " . $data[$i]["name"] . "<br/>";
                echo "Type: " . $data[$i]["type"] . "<br/>";
                echo "Location: " . $data[$i]["location"] . "<br/>";
                echo "Description: " . $data[$i]["description"] . "<br/>";
                echo "<br/>";
            }
        ?>
    </body>
</html>