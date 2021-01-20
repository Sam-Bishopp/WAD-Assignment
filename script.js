var map;

function init(){
    //AJAX Button
    document.getElementById("btn-ajax").addEventListener("click", sendAjax);
    
    //Map Variables
    map = L.map ("map1");
    var attrib="Map data copyright OpenStreetMap contributors, Open Database Licence";

    //Map
    L.tileLayer
        ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            { attribution: attrib } ).addTo(map);
    map.setView([51.4310, -0.93], 14);

    //Geolocation
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(

            gpspos => {
                console.log(`Lat: ${gpspos.coords.latitude}, Lon: ${gpspos.coords.longitude}`);
                map.setView([gpspos.coords.latitude, gpspos.coords.longitude], 14);
            },

            err => {
                alert(`An error occured: ${err.code}`);
            }
        );
    }
    else{
        alert("Sorry, Geolocation is not available");
    }  
}

function sendAjax(){
    var l = document.getElementById('location3').value;

    var ajaxConnection = new XMLHttpRequest();

    ajaxConnection.addEventListener("load", e =>
    {
        var output = "";
        var allPlaces = JSON.parse(e.target.responseText);

        allPlaces.forEach(aPlace =>
            {
                output = output + `Name: ${aPlace.name} <br/>` + `Type: ${aPlace.type} <br/>` + `Location: ${aPlace.location} <br/>` + `Description: ${aPlace.description} <br/>` + `<br/>`;

                //var placeLat = aPlace.latitude;
                //var placeLon = aPlace.longitude;

                //var newPos = [placeLat.latlng.lat, placeLon.latlng.lng];
                //L.marker(newPos).addTo(map);
            });
        document.getElementById("ajax-response").innerHTML = output;
    });

    ajaxConnection.open("GET", `https://edward2.solent.ac.uk/~wad1920/slim/locationAjax/${l}`);

    ajaxConnection.send();
}