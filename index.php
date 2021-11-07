<?php
include("config.php");
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
    <title><?php echo $site_name; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
<link href="./dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./dist/css/carousel.css" rel="stylesheet">
  </head>
  <body>

<?php include("./pages/header.php"); ?>

<main>

      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./dist/images/seedlingshands-1000.jpg" alt="">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Plan2Plant</h1>
            <p>Solution for every farmer.</p>
            <p><a class="btn btn-lg btn-primary" href="calendar.php">Show Calendar</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./dist/images/Plant-Seeds-1450x700-1.jpg.webp" alt="">

        <div class="container">
          <div class="carousel-caption">
            <h1>Plan2Plant</h1>
            <p>analyzes the unique customer, crop, environment & markets- planning for the best fitted full value chain</p>
            <p><a class="btn btn-lg btn-primary" href="planning.php">Start Planning</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./dist/images/2018_cp_blog_lead_answerplot_aerial.png" alt="">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Plan2Plant</h1>
            <p>Start Planning Today.</p>
            <p><a class="btn btn-lg btn-primary" href="map.php">Browse map</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
<section class="col-lg-12 connectedSortable ui-sortable">
            <!-- Custom tabs (Charts with tabs)-->
   
            <!-- /.card -->

            <!-- DIRECT CHAT -->

            <!--/.direct-chat -->

            <!-- Dashboard -->

              <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
            <a href="calendar.php">
              <div class="card">
                <center><img src="https://i.pinimg.com/originals/c8/4f/fc/c84ffc99f868d4585e8b604709dcca75.png" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Calendar</button>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="col">
              <a href="map.php">
              <div class="card">
                <center><img src="https://img.freepik.com/free-vector/world-map-with-countries-borders_47243-900.jpg?size=626&amp;ext=jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <center>
                  <div class="d-grid gap-2">
                    <button class="btn btn-info" type="button">Map</button>
                  </div>
                </center></div>
              </div>
              </a>
            </div>
            <div class="col">
              <a href="dashboard.php">
              <div class="card">
                <center><img src="https://www.pixeden.com/media/k2/galleries/1039/001-dashboard-infographic-chart-graphics-vector-pack.jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-light" type="button">Dashboard</button>
                  </div>
                </div>
              </div>
            </a>
            </div>
            <div class="col">
              <a href="planning.php">
              <div class="card">
                <center><img src="https://assets.materialup.com/uploads/900c6291-bc21-41b9-93fb-2d4b495de051/preview.jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Planning</button>
                  </div>
                </div>
              </div>
              </a>
            </div>
              <div class="col">
              <div class="card">
                <center><img src="https://image.freepik.com/free-vector/message-notification-background_23-2147671665.jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-warning" type="button">Notification</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="col">
              <div class="card">
                <center><img src="https://st3.depositphotos.com/1373020/19444/v/1600/depositphotos_194440412-stock-illustration-realistic-notebook-vector.jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-success" type="button">Draft</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="col">
              <div class="card">
                <center><img src="https://img.freepik.com/free-vector/popular-programming-languange_25156-21.jpg?size=626&amp;ext=jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-danger" type="button">Reports</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="col">
              <div class="card">
                <center><img src="https://img.freepik.com/free-vector/processing-concept-illustration_114360-410.jpg?size=626&amp;ext=jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-secondary" type="button">Production</button>
                  </div>
                </div>
              </div>
            </div>
              <div class="col">
              <div class="card">
                <center><img src="https://image.freepik.com/free-vector/peer-peer-insurance-model-collaborative-consumption-policyholders-cooperation-p2p-digital-insurers-service-partners-sharing-liability-insurance_335657-2538.jpg" class="dashboard-img card-img-top" alt="..."></center>
                <div class="card-body">
                  <div class="d-grid gap-2">
                    <button class="btn btn-danger" type="button">P2P Community</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- /.card -->
          </section>


    <!-- START THE FEATURETTES -->


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
<!-- ENd Main ---->

  <!-- FOOTER -->
</main>


    <script src="./dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
  </body>
</html>
