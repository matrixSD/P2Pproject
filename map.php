<?php
include("config.php");
include("functions.php");
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else $page="main";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title><?php echo $site_name; ?> - Map</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
<link href="./dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<!-- Google Maps -->
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
 <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<meta name="theme-color" content="#7952b3">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .dashboard-img {
        width: 100%;
        height: 278px;
      }
      #map {
        height: 94vh;
        position: fixed !important;
       width: 66vw;
      }
      body {
        height: 100%;
        margin: 0;
        padding: 0;
        padding-bottom: 0 !important;
      }
      html, body {
          max-width: 100%;
          overflow-x: hidden;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./dist/css/carousel.css" rel="stylesheet">
  </head>
  <body>

<?php include("./pages/header.php"); ?>

<main>
  <div class="row">
    <div class="col-md-8">
      <div id="map"></div>
    </div>
    <div class="col-md-4">
      <!-- <input type="text" id="filter" style="margin-top: 3rem;"/> -->
      <!-- <input type="button" id="search" value="search"/> -->
    <div class="mb-3 form-check" style="margin:0 auto;">
     <input type="text" class="form-control" style="margin-top: 1rem !important;width: 79%;text-align: center;margin: 0 auto;" placeholder="search" id="filter" aria-describedby="searchHelp">
    </div>
      <div id="results">
        <?php getAreasList (); ?>
      </div>
    </div>
  </div>     
</main>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3HSSW38iMq7x_abVoB52F10FZCNe1NRA&callback=initMap&libraries=&v=weekly"
      async
    ></script>
   <script>
      // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens.
      // The maximum width of the info window is set to 200 pixels.
      function initMap() {
        const uluru = { lat: -25.363, lng: 131.044 };
        <?php getLatLongGoogleMaps (); ?>
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: uluru1,
        });
        const contentString =
          '<div id="content">' +
          '<div id="siteNotice">' +
          "</div>" +
          '<h1 id="firstHeading" class="firstHeading">Uluru</h1>' +
          '<div id="bodyContent">' +
          "<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large " +
          "sandstone rock formation in the southern part of the " +
          "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
          "south west of the nearest large town, Alice Springs; 450&#160;km " +
          "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
          "features of the Uluru - Kata Tjuta National Park. Uluru is " +
          "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
          "Aboriginal people of the area. It has many springs, waterholes, " +
          "rock caves and ancient paintings. Uluru is listed as a World " +
          "Heritage Site.</p>" +
          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
          "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
          "(last visited June 22, 2009).</p>" +
          "</div>" +
          "</div>";
        const infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200,
        });
        const marker = new google.maps.Marker({
          position: uluru,
          map,
          title: "Uluru (Ayers Rock)",
        });
        marker.addListener("click", () => {
          infowindow.open(map, marker);
        });
        <?php getDataGoogleMaps (); ?>
      }
    </script>
    <script src="./dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script>
    // $('.contact-name').hide();
    $("#filter").keyup(function() {

      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('.results').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show();
          count++;
        }

      });

    });


  </script>
      
  </body>
</html>
<!-- ============ Modals ============ -->
<?php getAreaModals (); ?>
<?php getGrowingModals(); ?>
<!-- ============ Modals ============ -->