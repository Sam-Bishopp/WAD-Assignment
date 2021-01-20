<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <h1>Book an Accommodation</h1>

    <?php
        $conn = new PDO("mysql:host=localhost;dbname=wad1920" ,"wad1920", "eengohph");

        $results = $conn->query("SELECT * FROM accommodation");
        while($row=$results->fetch())
        {
            echo "Name: " . $row["name"] . "<br/>";
            echo "Type: " . $row["type"] . "<br/>";
            echo "Location: " . $row["location"] . "<br/>";
            echo "Description: " . $row["description"] . "<br/>";
            echo "<a href='booking.php?bID=" . $row["ID"] . "'>Book this accommodation</a>" . "<br/>";
            echo "</p>"; 
        }
    ?>

        <p><a href="index.html">Return to homepage</a></p>

    </body>
</html>