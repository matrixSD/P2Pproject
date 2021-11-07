<?php
include("config.php");
include("functions.php");
if (isset($_GET['step'])) {
  $step = $_GET['step'];
} else $step="choose_plot";

function printCard ($type,$start_date,$area_id) {
  $unique_collapse = rand(10,100);
  $unique_chart = rand(10,1000);
  $Planting = stage("Planting",$start_date);
  $BunchFilling = stage("BunchFilling",$start_date);
  $area_id = getAreaDataById($area_id)['id'];
    $now = strtotime($BunchFilling);; // or your date as well
    $your_date = strtotime($Planting);
    $datediff = $now - $your_date;
print "<div profit='".getProfit ($start_date, $area_id)['profit']."' cover='".getProfit ($start_date, $area_id)['yivol']."' class=\"thecard\" style=\"\">\n";
print "<div class=\"card border-success mb-3\" style=\"\">\n";
print "        <div class=\"card-header\">Bannana <small style='color:red;'>".getAreaDataById($area_id)['name']."</small></div>\n";
print "        <div class=\"card-body text-success\">\n";
print "          <div class=\"row\">\n";
print "            <div class=\"col-md-6\">\n";
print "              <small>Recommended planting date: </small><font style=\"color:red;\" '=\"\">".$Planting."</font><br><small>Recommended harvist date: </small><font style=\"color:red;\" '=\"\">".$BunchFilling."</font><br><small>Total: </small><font style=\"color:red;\" '=\"\">".round($datediff / (60 * 60 * 24))." Days</font>              <br><br><strong style=\"color:black;\">Timeline: </strong>\n";
print "              <iframe src=\"./lib/function2.php?type=bar&start_date=".$start_date."\" style=\"width:100%;\" frameborder=\"0\"></iframe>\n";
print "            </div>\n";
print "            <div class=\"col-md-3\">\n";
print "          <strong style=\"color:black;\">Est. Profit</strong><br>".getProfit ($start_date, $area_id)['profit']." Shekel<br><strong style=\"color:black;\">Max. quantity</strong><br>".getProfit ($start_date, $area_id)['yivol']." KG<br><strong style=\"color:black;\">Risk Level</strong><br>";
echo '<iframe scrolling="no" src="lib/pbar/jQuery-plugin-progressbar.php" style="height: 212px;"></iframe>';
echo "            </div>\n";
print "            <div class=\"col-md-3\"><center><img src=\"./dist/images/bannana.svg\" style=\"width:20%;\" alt=\"\"></center>";
echo '                        <div class="card-body" style="height: 420px">
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-line'.$unique_chart.'" width="299" height="200" class="chart-line chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                        </div>';
echo "</div>\n";
print "          </div>\n";
print "          <button class=\"btn btn-primary\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapseExample".$unique_collapse."\" aria-expanded=\"false\" aria-controls=\"collapseExample".$unique_collapse."\">\n";
print "            Show Timeline\n";
print "          </button>\n";
echo '';
print "      <div class=\"collapse\" id=\"collapseExample".$unique_collapse."\">\n";
print "        <div class=\"card card-body\">\n";
print "            <iframe src=\"./lib/GanttChartPHP/example/index.php?start_date=".$start_date."&area_id=".getAreaDataById($area_id)['id']."\" style=\"width: 100%; height: 28rem;\" frameborder=\"0\"></iframe>\n";
print "         </div>\n";
print "        </div>\n";
print "            <a href=\"planning.php?step=plan_details&start_date=".$start_date."&area_id=".$area_id."&harvist=".$BunchFilling."\">\n";
print "          <p class=\"card-text\">\n";
print "            </p><div class=\"d-grid gap-2\">\n";
print "              <button class=\"btn btn-".$type."\" type=\"button\">Apply</button>\n";
print "            </div>\n";
print "          </a>\n";
print "          <p></p>\n";
print "        </div>\n";
print "      </div>";
print "   </div>";
?>
<script>
    $(document).ready(function() {
        var ctx = $("#chart-line<?php echo $unique_chart; ?>");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo getProfit ($start_date, $area_id)['profit']; ?>],
                datasets: [{
                    data: [86],
                    label: "Expense",
                    borderColor: "#458af7",
                    backgroundColor: '#458af7',
                    fill: false
                }, {
                    data: [<?php echo getProfit ($start_date, $area_id)['profit']; ?>],
                    label: "Profit",
                    borderColor: "#8e5ea2",
                    fill: true,
                    backgroundColor: '#8e5ea2'
                },]
            },
            options: {
                title: {
                    display: true,
                    text: 'World population per region (in millions)'
                }
            }
        });
    });
</script>
<?php
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
<!-- ==== iCheck ==== -->
  <!-- <link href="dist/icheck/demo/css/custom.css?v=1.0.3" rel="stylesheet"> -->
  <link href="dist/icheck/skins/all.css?v=1.0.3" rel="stylesheet">
  <script src="dist/icheck/demo/js/jquery.js"></script>
  <script src="dist/icheck/icheck.js?v=1.0.3"></script>
  <script src="dist/icheck/demo/js/custom.min.js?v=1.0.3"></script>
<!-- char js -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

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
html {
  -webkit-font-smoothing: antialiased!important;
  -moz-osx-font-smoothing: grayscale!important;
  -ms-font-smoothing: antialiased!important;
}
body {
  font-family: 'Open Sans', sans-serif;
  font-size:16px;
  color:#555555; 
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
<script>
    $(document).ready(function() {
        var ctx = $(".chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [1500],
                datasets: [{
                    data: [86],
                    label: "Expense",
                    borderColor: "#458af7",
                    backgroundColor: '#458af7',
                    fill: false
                }, {
                    data: [12000],
                    label: "Profit",
                    borderColor: "#8e5ea2",
                    fill: true,
                    backgroundColor: '#8e5ea2'
                },]
            },
            options: {
                title: {
                    display: true,
                    text: 'World population per region (in millions)'
                }
            }
        });
    });
</script>
<style>
     body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .card {
     background: #fff;
     border-width: 0;
     border-radius: .25rem;
     box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
     margin-bottom: 1.5rem
 }

 .card {
     position: relative;
     display: flex;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(19, 24, 44, .125);
     border-radius: .25rem
 }

 .card-header {
     padding: .75rem 1.25rem;
     margin-bottom: 0;
     background-color: rgba(19, 24, 44, .03);
     border-bottom: 1px solid rgba(19, 24, 44, .125)
 }

 .card-header:first-child {
     border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
 }

 card-footer,
 .card-header {
     background-color: transparent;
     border-color: rgba(160, 175, 185, .15);
     background-clip: padding-box
 }
</style>

    
    <!-- Custom styles for this template -->
    <link href="./dist/css/carousel.css" rel="stylesheet">
  </head>
  <body>

<?php include("./pages/header.php"); ?>

<main>


  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
<section class="col-lg-12 connectedSortable ui-sortable">

          </section>


    <!-- START THE FEATURETTES -->
<?php if ($step=='choose_plot') { ?>
<div class="md-stepper-horizontal orange">
    <div class="md-step active">
      <div class="md-step-circle"><span>1</span></div>
      <div class="md-step-title">Choose Plot</div>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    <div class="md-step">
      <div class="md-step-circle"><span>2</span></div>
      <div class="md-step-title">Top Recommendation</div>
      <!-- <div class="md-step-optional">Optional</div> -->
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    <div class="md-step">
      <div class="md-step-circle"><span>3</span></div>
      <div class="md-step-title">Plan Details</div>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
  </div>
<hr>
<form action="planning.php?step=top_recommendation" method="post">
  <div class="mb-3">
    <?php //print_r($_POST);

    ?>
    <div class="modal-body" id="planningModalBody"><form action="lib/dashboard/planning.php?step=1" method="POST" id="form1">
          <div class="row">
            <div class="col-md-2">
              <?php areaListCheck(); ?>
            </div>
            <div class="col-md-2">
                      <div class="demo-list clear">
        </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="bannana" name="bannana">
                <label class="form-check-label" for="bannana">
                  <h4>Bannana</h4>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="watermillon" name="watermillon">
                <label class="form-check-label" for="watermillon">
                  <h4>WaterMillon</h4>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="avocado" name="avocado">
                <label class="form-check-label" for="avocado">
                  <h4>Avocado</h4>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="mango" name="mango">
                <label class="form-check-label" for="mango">
                  <h4>Mango</h4>
                </label>
              </div>
            </div>
            <div class="col-md-8">
             <div class="row">
                <div class="col-md-6">
               <div class="form-group">
                  <label for="exampleFormControlInput1">FROM</label>
                  <input type="date" name="from" class="form-control" id="exampleFormControlInput1" placeholder="" required="">
                </div>
              </div>
              <div class="col-md-6">
               <div class="form-group">
                  <label for="exampleFormControlInput1">TO</label>
                  <input type="date" name="to" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
              </div>
           </div>  
               <div class="form-group" style="margin-top: 25px;">
                  <label for="exampleFormControlInput1">Plan</label>
                  <select name="plan" class="form-control" id="plan">
                    <option value="1">MOST PROFIT</option>
                    <option value="2">MARKET COVER</option>
                    <option value="3">MARKET PEAKS</option>
                    <option value="4">HIGHEST YIELD</option>
                  </select>
                </div>
               <div class="form-group" style="margin-top: 25px;">
                  <label for="exampleFormControlInput1">Budget</label>
                  <input type="text" class="form-control" name="budget" id="exampleFormControlInput1" placeholder="$1,000,000">
                </div>
               <div class="form-group" style="margin-top: 25px;">
                  <label for="exampleFormControlInput1">Risk Level</label>
                   <select class="form-control" name="risk">
                    <option>LOW</option>
                    <option>MODERATE</option>
                    <option>HIGH</option>
                    <option>ANY</option>
                  </select>
                </div>
                <!-- <button type="submit" class="btn btn-danger btn-lg btn-block">GO</button> -->
            </div>
          </div>
</div> 
  </div>
  <div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">Next</button>
</div>
        </form>

</form>
    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->
<!-- ENd Main ---->

  <!-- FOOTER -->
  <footer class="container">
  </footer>
 <?php } ?>
 
 <?php if ($step=='top_recommendation') { ?>
<div class="md-stepper-horizontal orange">
    <div class="md-step">
      <div class="md-step-circle"><span>1</span></div>
      <a href="planning.php"><div class="md-step-title">Choose Plot</div></a>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    <div class="md-step active">
      <div class="md-step-circle"><span>2</span></div>
      <div class="md-step-title">Top Recommendation</div>
      <!-- <div class="md-step-optional">Optional</div> -->
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    <div class="md-step">
      <div class="md-step-circle"><span>3</span></div>
      <div class="md-step-title">Plan Details</div>
      <div class="md-step-bar-left"></div>
    <div class="md-step-bar-right"></div>
    </div>
  </div>
  <div class="" style="margin-top:10px;">
    <!-- <h1>Top Recommendation</h1> -->
    <hr>
    Top Recommendation
    <?php 
    // echo "<pre>"; print_r($_POST); echo "</pre>";
    $start_date = $_POST['from'];
    $area_id = "3";
    // printCard ($start_date, $area_id);
    $loop_date[0] = date('Y-m-d', strtotime("+1 month", strtotime($start_date)));
    $loop_date[1] = date('Y-m-d', strtotime("+2 month", strtotime($start_date)));
    $loop_date[2] = date('Y-m-d', strtotime("+3 month", strtotime($start_date)));
    // print_r($loop_date); echo "<br>";

      
$post_countr = 1;
while ($post_countr <= 4) {
      if (isset($_POST[$post_countr])) { // Gongel Mezrah
        print_r (getAreaDataById($_POST[$post_countr])[name]);
        printCard ("success",$_POST['from'], getAreaDataById($_POST[$post_countr])['id']);
          $x = 0;
          while ($x<=2) {
           // echo '<h3 style="color:red;">Recommendation</h3>';
           echo '<div id="pai">';
           printCard ("danger",$loop_date[$x], getAreaDataById($_POST[$post_countr])['id']); 
           echo '</div>';
           $x++;
          }
        }
        $post_countr++;
}
    ?>
    
    
  </div>
 <?php }

?>
<?php 
if (isset($_GET['step']) && $_GET['step']=="plan_details") {
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
<div class="md-stepper-horizontal orange">
    <div class="md-step">
      <div class="md-step-circle"><span>1</span></div>
      <div class="md-step-title">Choose Plot</div>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    <div class="md-step">
      <div class="md-step-circle"><span>2</span></div>
      <div class="md-step-title">Top Recommendation</div>
      <!-- <div class="md-step-optional">Optional</div> -->
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
    <div class="md-step active">
      <div class="md-step-circle"><span>3</span></div>
      <div class="md-step-title">Plan Details</div>
      <div class="md-step-bar-left"></div>
      <div class="md-step-bar-right"></div>
    </div>
  </div>
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
  <a href="save.php?start_date=<?php echo $start_date; ?>&area_id=<?php echo $area_id; ?>&harvist=<?php echo $_GET['harvist']; ?>">
    <div class="d-grid gap-2">
      <button class="btn btn-success" type="button">Choose Plan</button>
    </div>
  </a>
<?php
}
 ?>
</main>


    <script src="./dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
          <script>
          $(document).ready(function(){
          

            var callbacks_list = $('.demo-callbacks ul');
            $('.col-md-2 input').on('ifCreated ifClicked ifChanged ifChecked ifUnchecked ifDisabled ifEnabled ifDestroyed', function(event){
              callbacks_list.prepend('<li><span>#' + this.id + '</span> is ' + event.type.replace('if', '').toLowerCase() + '</li>');
            }).iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%'
            });
          

            (function( $ ){
               $.fn.byProfit = function() {
                  // alert('By Profit');
                  var divList = $(".thecard");
                  divList.sort(function(a, b) {
                      // para ordem decrescente; use a - b para crescente
                      return $(b).attr("profit") - $(a).attr("profit")
                  });
                  $("#pai").html(divList);
                  return this;
               }; 
            })( jQuery );

            (function( $ ){
               $.fn.byMarketCover = function() {
                  // alert('By Market Cover');
                  var divList = $(".thecard");
                  divList.sort(function(a, b) {
                      // para ordem decrescente; use a - b para crescente
                      return $(b).attr("cover") - $(a).attr("cover")
                  });
                  $("#pai").html(divList);
                  return this;
               }; 
            })( jQuery );

            <?php
            if(isset($_POST['plan']) && $_POST['plan']=="1") { 
              echo "$('#pai').byProfit();"; 
            } 
            if(isset($_POST['plan']) && $_POST['plan']=="2") { 
              echo "$('#pai').byMarketCover();"; 
            } 
            ?>

          });
          </script>
      
  </body>
</html>
