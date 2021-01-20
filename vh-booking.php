<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <h1>Book this Accommodation</h1>

    <?php
        $ID = $_GET["bID"];

        //Form for booking accommodation (dates for this database are written as YYMMDD which is why I have specified)
        echo "<form method='POST' action='webservices/p2s-acc-book.php'>";
        echo "<input type='hidden' name='accID' id='accID' value='$ID' />";
        echo "Specify the date: (Please write as YYMMDD (191125)) <input type='number' name='thedate' id='thedate' />";
        echo "<br/>";
        echo "How many people will be staying?: <input type='number' name='npeople' id='npeople' />";
        echo "<br/>";
        echo "<input type='submit' value='Confirm Your Booking' />";
        echo "</p>";
    ?>

        <p><a href="visit-hampshire.php">Return to homepage</a></p>
        <p><a href="vh-accommodations.php">Return to accommodations page</a></p>

    </body>
</html>