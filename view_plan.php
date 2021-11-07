<?php
include("config.php");
include("functions.php");

function saveToArea ($area_id) {
  global $conn;
  $sql = "UPDATE area SET current_growing='N/A', harvest='N/A' WHERE id=".$area_id;
  echo "<br>".$sql."<br>";
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

}

if (isset($_GET['delete_id'])) {
  $sql = "DELETE FROM calendar WHERE id=".$_GET['delete_id'];

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  saveToArea ($_GET['map_id']);
  header("Location: calendar.php");
  
  die("<br>Delete Done;");
}

if (!isset($_GET['id'])) {
  die("Error");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title><?php echo $site_name; ?> - View Plan</title>

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
.md-stepper-horizontal {
  display:table;
  width:100%;
  margin:0 auto;
  background-color:#FFFFFF;
  box-shadow: 0 3px 8px -6px rgba(0,0,0,.50);
}
.md-stepper-horizontal .md-step {
  display:table-cell;
  position:relative;
  padding:24px;
}
.md-stepper-horizontal .md-step:hover,
.md-stepper-horizontal .md-step:active {
  background-color:rgba(0,0,0,0.04);
}
.md-stepper-horizontal .md-step:active {
  border-radius: 15% / 75%;
}
.md-stepper-horizontal .md-step:first-child:active {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
.md-stepper-horizontal .md-step:last-child:active {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.md-stepper-horizontal .md-step:hover .md-step-circle {
  background-color:#757575;
}
.md-stepper-horizontal .md-step:first-child .md-step-bar-left,
.md-stepper-horizontal .md-step:last-child .md-step-bar-right {
  display:none;
}
.md-stepper-horizontal .md-step .md-step-circle {
  width:30px;
  height:30px;
  margin:0 auto;
  background-color:#999999;
  border-radius: 50%;
  text-align: center;
  line-height:30px;
  font-size: 16px;
  font-weight: 600;
  color:#FFFFFF;
}
.md-stepper-horizontal.green .md-step.active .md-step-circle {
  background-color:#00AE4D;
}
.md-stepper-horizontal.orange .md-step.active .md-step-circle {
  background-color:#F96302;
}
.md-stepper-horizontal .md-step.active .md-step-circle {
  background-color: rgb(33,150,243);
}
.md-stepper-horizontal .md-step.done .md-step-circle:before {
  font-family:'FontAwesome';
  font-weight:100;
  content: "\f00c";
}
.md-stepper-horizontal .md-step.done .md-step-circle *,
.md-stepper-horizontal .md-step.editable .md-step-circle * {
  display:none;
}
.md-stepper-horizontal .md-step.editable .md-step-circle {
  -moz-transform: scaleX(-1);
  -o-transform: scaleX(-1);
  -webkit-transform: scaleX(-1);
  transform: scaleX(-1);
}
.md-stepper-horizontal .md-step.editable .md-step-circle:before {
  font-family:'FontAwesome';
  font-weight:100;
  content: "\f040";
}
.md-stepper-horizontal .md-step .md-step-title {
  margin-top:16px;
  font-size:16px;
  font-weight:600;
}
.md-stepper-horizontal .md-step .md-step-title,
.md-stepper-horizontal .md-step .md-step-optional {
  text-align: center;
  color:rgba(0,0,0,.26);
}
.md-stepper-horizontal .md-step.active .md-step-title {
  font-weight: 600;
  color:rgba(0,0,0,.87);
}
.md-stepper-horizontal .md-step.active.done .md-step-title,
.md-stepper-horizontal .md-step.active.editable .md-step-title {
  font-weight:600;
}
.md-stepper-horizontal .md-step .md-step-optional {
  font-size:12px;
}
.md-stepper-horizontal .md-step.active .md-step-optional {
  color:rgba(0,0,0,.54);
}
.md-stepper-horizontal .md-step .md-step-bar-left,
.md-stepper-horizontal .md-step .md-step-bar-right {
  position:absolute;
  top:36px;
  height:1px;
  border-top:1px solid #DDDDDD;
}
.md-stepper-horizontal .md-step .md-step-bar-right {
  right:0;
  left:50%;
  margin-left:20px;
}
.md-stepper-horizontal .md-step .md-step-bar-left {
  left:0;
  right:50%;
  margin-right:20px;
}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1400px;
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./dist/css/carousel.css" rel="stylesheet">
  </head>
  <body>

<?php //include("./pages/header.php"); ?>

<main>


  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
<section class="col-lg-12 connectedSortable ui-sortable">
<?php 

  $start_date = $_GET['start_date'];
  $area_id = $_GET['area_id'];
//   echo $start_date; echo "<br>";
//   echo $area_id;
//   // echo ("<br><pre>") ;print_r(getProfit ($start_date, $area_id)); echo ("</pre><br>");
// echo '<strong style="color:black;">Est. Profit</strong><br>';
// echo getProfit ($start_date, $area_id)['profit']." Shekel";
// echo '<br><strong style="color:black;">Max. quantity</strong><br>';
// echo getProfit ($start_date, $area_id)['yivol']." KG";
// echo '<br><strong style="color:black;">Risk Level</strong><br>';
// echo ("N/A");
// echo ("<br>Start Date:: ".$start_date);
// echo ("<br>Harvist: ".$_GET['harvist']);
?>
<hr>
<div class="row" style="margin-top:10px;">
  <div class="col-md-6">
    <div class="card" style="width: 100%;">
    
      <div class="card-body">
        <h5 class="card-title"><?php echo getAreaDataById($area_id)['name']; ?></h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Plot Crop: Bannana <img src="./dist/images/bannana.png" style="width: 5%;" class="card-img-top" alt="..."></li>
        <li class="list-group-item">Est. Profit: <?php echo getProfit ($start_date, $area_id)['profit']." Shekel"; ?></li>
        <li class="list-group-item">Planting Date: <?php echo $start_date; ?></li>
        <li class="list-group-item">Estimated harvest date: <?php echo $_GET['harvist']; ?></li>
        <li class="list-group-item">Estimated harvest amount: <?php echo getProfit ($start_date, $area_id)['yivol']." KG"; ?></li>
        <li class="list-group-item">Estimated Profit: <?php echo getProfit ($start_date, $area_id)['profit']." Shekel"; ?></li>
      </ul>
    </div>
  </div>
  <div class="col-md-6">
    <iframe src="./lib/function2.php?type=table&amp;start_date=<?php echo $start_date; ?>" frameborder="0" style="width: 100%;height: 23rem;"></iframe>
  </div>
  <iframe src="./lib/GanttChartPHP/example/index.php?start_date=<?php echo $start_date; ?>&area_id=<?php echo $area_id; ?>" style="height:20rem;" frameborder="0"></iframe>
</div>
  <a href="view_plan.php?delete_id=<?php echo $_GET['id']; ?>&map_id=<?php echo $area_id; ?>">
    <div class="d-grid gap-2">
      <button class="del btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')" type="button">Delete Plan</button>
    </div>
  </a>
<?php

 ?>
          </section>


    <!-- START THE FEATURETTES -->


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
<!-- ENd Main ---->

  <!-- FOOTER -->

</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script>
$(document).ready(function(){
function deleteItem() {
    if (confirm("Are you sure?")) {
        // your deletion code
    }
    return false;
};
});
</script>

    <script src="./dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  </body>
</html>
