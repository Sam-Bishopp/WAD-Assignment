<!DOCTYPE HTML>
<html>
    <head>
        <title>Visit Hampshire</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <h1>Visit Hampshire</h1>
        <h2>All accommodation within the Hampshire area</h2>
        <br/>

        <!-- Accommodation Search -->
        <div class="vh-search">
            <form method="GET" action="vh-searchresults.php">
                <p>Search for a type of accommodation (e.g. "Pub" or "Hotel")</p>
                <p>
                    <input type="text" name="type" id="type"/>
                    <input type="submit" value="Search!"/>
                </p>
            </form>
        </div>

        <br/>
        
        <!-- Booking -->
        <div class="vh-book">
            <h2>Book an accommodation in the Hampshire Area</h2>
            <p><a href="vh-accommodations.php">Click here to book an accommodation</a></p>
        </div>
    </body>
</html>