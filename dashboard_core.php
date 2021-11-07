<?php 
include("config.php");
include("functions.php");
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.js"></script>
  
  <title>PIE chart using Chartjs,jQuery and Bootstrap</title>
</head>
<body>
  <div class="container">
	<h2 class="text-center">Dashboard</h2>
    <?php 
    // print_r($_GET);
        if (!isset($_GET['date'])) {
            ?>
            <form action="dashboard_core.php" method="GET">
                <center>
                    <input type="date" name="date" id="date" required="true">
                    <input type="submit">
                </center> 
            </form>
            <?php
        }
    ?>
    <?php if (isset($_GET['date'])) {
        // code...
    ?>
    <div class="row">
        <!-- <center><h1><?php echo $_GET['date']; ?></h1></center> -->
        <div class="col-md-10">
            <canvas id="barChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-2">

<select id="select" name="cd-dropdown" class="cd-select">
<!-- <option value="-1" selected>Currency</option> -->
<option value="1" selected>בננה</option>
<option value="2">תירס מתוק</option>
<option value="3">אבטיח </option>
<option value="4">שעורה </option>
<option value="5">אבוקדו</option>
<option value="6">שום</option>
<option value="7">שעועית</option>
<option value="8">חיטה</option>
<option value="9">מנגו</option>
<option value="10">בצל</option>
</select>

<div class="pr-price d1">
    <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - בננה
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;">34%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;">76%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;">15M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;">7.6</strong></li>
      </ul>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #1e71c9; color: #FFFFFF; margin-top:10px;">
        Planted In
      </div>
      <ul class="list-group list-group-flush">
        <?php getAreaByPlanted (); ?>
      </ul>
    </div>

</div>
<div class="pr-price d2">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - תירס מתוק
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>
      
</div>
<div class="pr-price d3">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - אבטיח
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d4">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - שעורה
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d5">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - אבוקדו
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d6">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - שום
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d7">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - שעועית
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d8">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - חיטה
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d9">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - מנגו
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>
<div class="pr-price d10">

      <div class="card" style="width: 18rem;">
      <div class="list-group-item" style="background-color: #e9e9ed; margin-top:10px;">
        Info - בצל
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Planted: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Planed: <strong style="color:red;"><?php echo rand(10,40); ?>%</strong></li>
        <li class="list-group-item">Annual Value: <strong style="color:red;"><?php echo rand(10,100); ?>M $</strong></li>
        <li class="list-group-item">Risk Level: <strong style="color:red;"><?php echo mt_rand(0,9); ?>.<?php echo mt_rand(0,9); ?></strong></li>
      </ul>
    </div>

</div>

        
        </div>
    </div>
    <div class="row" style="margin-top: 25px;">
        <?php 
            $date = $_GET['date'];
            $next_week = date('Y-m-d', strtotime("+7 days", strtotime($date)));
            $prev_week = date('Y-m-d', strtotime("-7 days", strtotime($date)));
         ?>
         <center>
        <div class="col-md-2"><a href="./dashboard_core.php?date=<?php echo $prev_week; ?>"><button type="button" class="btn btn-danger">Previous Week</button></a></div>
        <div class="col-md-5"><center><h3><?php echo $_GET['date']; ?></h3></center></div>
        <div class="col-md-5"><a href="./dashboard_core.php?date=<?php echo $next_week; ?>"><button type="button" class="btn btn-danger">Next Week</button></a></div>
    </center>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	var chartDiv = $("#barChart");
var myChart = new Chart(chartDiv, {
    type: 'pie',
    data: {
        labels: ["אבטיח", "תירס מתוק", "בננה", "שעורה", "אבוקדו", "שום", "שעועית", "חיטה", "מנגו", "בצל"],
        datasets: [
        {
            data: [<?php echo rand (0,21); ?>,<?php echo rand (0,39); ?>, 34, <?php echo rand (0,14); ?>,<?php echo rand (0,16); ?>, <?php echo rand (0,21); ?>, <?php echo rand (0,21); ?>,<?php echo rand (0,21); ?>,<?php echo rand (0,21); ?>,<?php echo rand (0,21); ?>],
            backgroundColor: [
               "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#fc6b03",
            "#03fc18",
            "#b103fc",
            "#8a1151",
            "#1e71c9",
            "#36A2EB",
            "#2c5c31"
            ]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Pie Chart'
        },
		responsive: true,
maintainAspectRatio: false,
    }
});

$(function () {
  $('.pr-price').hide();
  // $('.d2').show();
    
  $('#select').on("change",function () {
    $('.pr-price').hide();
    $('.d'+$(this).val()).show();
  }).val("0");
});

});


</script>
<?php } ?>
<!-- Modal -->
