<?php 
function stage($stage, $start_date) {
  switch ($stage) {
    case "Planting":
      $Date = $start_date; 
      return date('Y-m-d', strtotime($Date. '+1 days'));
      break;
    case "Establishment":
      $randomNumber = rand(25,45);
      $Date = date('Y-m-d', strtotime($start_date. ' + 1 days'));
      return date('Y-m-d', strtotime($Date. ' + '.$randomNumber.' days'));
      //return $Date;
      break;
    case "SuckersSelection":
      $randomNumber = rand(60,180);
      $Date = date('Y-m-d', strtotime($start_date. ' + '.rand(25,45).' days'));
      return date('Y-m-d', strtotime($Date. ' + '.$randomNumber.' days'));
      break;
    case "Growth":
      $randomNumber = rand(60,90);
      $Date = date('Y-m-d', strtotime($start_date. ' + '.rand(100,220).' days'));
      return date('Y-m-d', strtotime($Date. ' + '.$randomNumber.' days'));
      break;
    case "Shooting":
      $randomNumber = rand(15,30);
      $Date = date('Y-m-d', strtotime($start_date. ' + '.rand(160,290).' days'));
      return date('Y-m-d', strtotime($Date. ' + '.$randomNumber.' days'));
      break;
    case "HandsOpening":
      $randomNumber = rand(15,30);
      $Date = date('Y-m-d', strtotime($start_date. ' + '.rand(315,330).' days'));
      return date('Y-m-d', strtotime($Date. ' + '.$randomNumber.' days'));
      break;
    case "BunchFilling":
      $randomNumber = rand(30,120);
      $Date = date('Y-m-d', strtotime($start_date. ' + '.rand(330,400).' days'));
      return date('Y-m-d', strtotime($Date. ' + '.$randomNumber.' days'));
      break;
    default:
      return "Your favorite color is neither red, blue, nor green!";
  }
}
if (isset($_GET['start_date'])) {
  $Planting = stage("Planting",$_GET['start_date']); echo ("");
  $Establishment = stage("Establishment",$_GET['start_date']); echo ("");
  $SuckersSelection = stage("SuckersSelection",$_GET['start_date']); echo ("");
  $Growth = stage("Growth",$_GET['start_date']); echo ("");
  $Shooting = stage("Shooting",$_GET['start_date']); echo ("");
  $HandsOpening = stage("HandsOpening",$_GET['start_date']); echo ("");
  $BunchFilling = stage("BunchFilling",$_GET['start_date']); echo ("");
}

function calculatePercentage ($start, $end) {
     $start = new DateTime($start);
     $end = new DateTime($end);
     $today = new DateTime('now');

     $total = $start->diff($end);
     $current = $start->diff($today);

      return $percent_completed = round($current->days / $total->days * 100, 1);
}
  // echo $Planting;
  // echo $x = calculatePercentage ($Establishment, $BunchFilling);
  $x = rand(60,80);
  // echo $x;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">




    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

</header>

<div class="container-fluid">
  <div class="row">


    <main class="col-md-12">

<?php if (isset($_GET['type']) && $_GET['type']=="table") {
?>
<table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Stage Name</th>
                      <th>From Date</th>
                      <th>To Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Planting</td>
                      <td><?php echo date('Y-m-d', strtotime($Planting. '-1 days')); ?></td>
                      <td><?php echo $Planting; ?></td>
                    </tr>
                    <tr>
                      <td>Establishment</td>
                      <td><?php echo date('Y-m-d', strtotime($Planting. '+1 days')); ?></td>
                      <td><?php echo $Establishment; ?></td>
                    </tr>
                    <tr>
                      <td>SuckersSelection</td>
                      <td><?php echo date('Y-m-d', strtotime($Establishment. '+1 days')); ?></td>
                      <td><?php echo $SuckersSelection; ?></td>
                    </tr>
                    <tr>
                      <td>Growth</td>
                      <td><?php echo date('Y-m-d', strtotime($SuckersSelection. '+1 days')); ?></td>
                      <td><?php echo $Growth; ?></td>
                    </tr>
                    <tr>
                      <td>Shooting</td>
                      <td><?php echo date('Y-m-d', strtotime($Growth. '+1 days')); ?></td>
                      <td><?php echo $Shooting; ?></td>
                    </tr>
                    <tr>
                      <td>HandsOpening</td>
                      <td><?php echo date('Y-m-d', strtotime($Shooting. '+1 days')); ?></td>
                      <td><?php echo $HandsOpening; ?></td>
                    </tr>
                    <tr>
                      <td>BunchFilling</td>
                      <td><?php echo date('Y-m-d', strtotime($HandsOpening. '+1 days')); ?></td>
                      <td><?php echo $BunchFilling; ?></td>
                    </tr>
                  </tbody>
                </table>
<?php

} ?>
  
  
  <br>
  <?php if (isset($_GET['type']) && $_GET['type']=="bar") {
?>
<table class="table table-striped">
<?php $timestamp = strtotime($Planting);  $s_date = date("Y", $timestamp);?>
<?php $timestamp1 = strtotime($BunchFilling);  $s_date1 = date("Y", $timestamp1);?>
                  <thead>
                    <tr>
                      <th><?php echo $s_date; ?></th>
                      <th><?php echo $s_date1; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="2"><div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php echo $x; ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div></td>
                    </tr>
                  </tbody>
                </table>
        <?php

} ?>
      </div>
    </main>
  </div>
</div>


    <script src="../dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
