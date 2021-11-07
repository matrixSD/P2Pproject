 <html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- TimeLine CSS -->
    <link href="assets/dist/css/timeline.min.css" rel="stylesheet">
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <!-- OpenStreet Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
    <!-- <script src='https://api.tiles.mapbox.com/mapbox.js/v1.6.1/mapbox.js'></script> -->
    <!-- <link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.1/mapbox.css' rel='stylesheet' /> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
 <?php
 # Display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ('../config.php');

function getAreasbyID ($conn,$id) {
  $sql = "SELECT * FROM area WHERE id='".$id."'";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo $row['name'];
    }
  } else {
    echo "0 results";
  }
}

function stages ($stage,$duration,$temp_day, $temp_night, $humid, $daylength, $wind) { //$duration = choose duration time / 1 = one day , 30 = month.
	## Sub Functions ##

	## Sub Functions ##
############# === STAGES === #############
include('../config.php');
include ('stages.php');
// echo '<br><pre>'; print_r($json2php); echo '</pre><br>';
foreach ($json2php['Stages'] as  $x => $val) {
  if ($x == $stage) {
  	$stageData = $val;
  }
  // echo '<pre>'; print_r($x); echo '</pre><hr>';
  // echo '<pre>'; print_r($val); echo '</pre><hr>';
}
############# === STAGES END === #############
	if ($stage == 'planting') {
		return 1;
	}

	# ==============///   Planting Stage   \\\===============
		// $stage['planting'] = 1; // Planting stage always 1; 
	             						                    	
	# ==============/// Start The Function Stage \\\==============
		$data = 0;
		$result = $stageData['day_temperature_days'];
		// echo $stageData['day_temperature_days'];
		## ======= Day Temperature =======
			if ($temp_day == $stageData['day_temperature_degree']) $result=$stageData['day_temperature_days'];
			// If Temperature Above 28c
			if ($temp_day > $stageData['day_temperature_degree']) {
				$temp_difference = $temp_day - $stageData['day_temperature_degree'];
				$data = $stageData['day_temperature_reduce']*$temp_difference;
// /* DEBUG */ echo 'temp_day: '.$data.'<br>';
				$result= $result+$data; // Append Data
				/* Reset Data */ $data = 0; /* Reset Data */
			}
			// If Temperature Under 28c
			if ($stage == 'establishment') { // Some Stages Dont need that status
				if ($temp_day < $stageData['day_temperature_degree']) {
					$temp_difference = $stageData['day_temperature_degree'] - $temp_day;
					$data = $stageData['day_temperature_increase']/$duration*$temp_difference; // Divide /30 because the datat is monthly .
// /* DEBUG */ echo 'temp_day'.$data.'<br>';
					$result= $result-$data; // Append Data
					/* Reset Data */ $data = 0; /* Reset Data */
				}
			}
		## ======= Night Temperature =======
			if ($temp_night == $stageData['night_temperature_NoInfluence']) $result+=0;
			foreach ($stageData['night_temperature_influence'] as $value) {
			  // print_r($value);echo "<br>";
			  if ($value[3] == "lower") {
			  	// echo "Lower<br>";
				  if ($value[4] == "extend") {
			  		if ($temp_night < $value[0] ) {
			  			$temp_difference = $value[0]-$temp_night;
			  			$data = $temp_difference*$value[2];
// /* DEBUG */ echo 'temp_night: '.$data.'<br>';
			  			$result= $result+$data; // Append Data
			  			/* Reset Data */ $data = 0; /* Reset Data */
			  		}
			  	  }
				  if ($value[4] == "short") {
			  		if ($temp_night < $value[0] ) {
			  			$temp_difference = $value[0]-$temp_night;
			  			$data = $temp_difference*$value[2];
// /* DEBUG */ echo 'temp_night: '.$data.'<br>';
			  			$result= $result-$data; // Append Data
			  			/* Reset Data */ $data = 0; /* Reset Data */
			  		}
			  	  }
			  }
			  // IF HIGHER 
			  if ($value[3] == "higher") {
			  	// echo "Lower<br>";
				  if ($value[4] == "extend") {
			  		if ($temp_night > $value[0] ) {
			  			$temp_difference = $temp_night-$value[0];
			  			$data = $temp_difference*$value[1];
// /* DEBUG */ echo 'temp_night: '.$data.'<br>';
			  			$result= $result+$data; // Append Data
			  			/* Reset Data */ $data = 0; /* Reset Data */
			  		}
			  	  }
				  if ($value[4] == "short") {
			  		if ($temp_night > $value[0] ) {
			  			$temp_difference = $temp_night-$value[0];
			  			$data = $temp_difference*$value[1];
// /* DEBUG */ echo 'temp_night: '.$data.'<br>';
			  			$result= $result-$data; // Append Data
			  			/* Reset Data */ $data = 0; /* Reset Data */
			  		}
			  	  }
			  }
			}
		## ======= RH (Humid) =======
			if ($humid < $stageData['humid_range_min']) $error = "Humidity must be above 20%";
			if ($humid < $stageData['humid_influence'][1][0] && $humid > $stageData['humid_influence'][1][1]) {
				$humid_difference = $stageData['humid_influence'][1][0] - $humid;
				$data= $stageData['humid_influence'][1][2]/$duration*$humid_difference; // $duration = time.
				$result= $result+$data; // Append Data
// /* DEBUG */ echo 'humidity: '.$data.'<br>';
				/* Reset Data */ $data= 0; /* Reset Data */
			}
			if ($humid < $stageData['humid_influence'][2][0] && $humid > $stageData['humid_influence'][2][1]) {
				$humid_difference = $stageData['humid_influence'][2][0] - $humid;
				if (isset(['humid_influence'][2][3])) {
					$data= $stageData['humid_influence'][2][3]/$duration*$humid_difference; // $duration = time
				}
				$result= $result+$data; // Append Data
// /* DEBUG */ echo 'humidity: '.$data.'<br>';
				/* Reset Data */ $data= 0; /* Reset Data */
			}
			if (isset($stageData['humid_influence'][3][0])) {
				if ($humid < $stageData['humid_influence'][3][0]) {
					$humid_difference = $stageData['humid_influence'][2][0] - $humid;
					$data= $stageData['humid_influence'][2][2]/$duration*$humid_difference; // $duration = time
// /* DEBUG */ echo 'Humidity: '.$data.'<br>';
					$result= $result+$data; // Append Data
					/* Reset Data */ $data= 0; /* Reset Data */
				}
			}
		## ======= Day Length =======
			if ($daylength < $stageData['daylength_influence']) {
				$daylength_difference = $stageData['daylength_influence'] - $daylength; // at 20 hours speed up to 25 days, each 0.5 of an hour less, will add 0.27 days 
				// /* DEBUG */ echo '  *DayLength Difference: '.$daylength_difference.'<br>';
				$daylength_difference = $daylength_difference*2; // Multiple (*2) to convert from Hour to Half Hour
				$data = $daylength_difference*$stageData['daylength_extend'];
				// /* DEBUG */ echo '  *DayLength 1st Data: '.$data.'<br>';
				$data = $data*$duration; // duration time
// /* DEBUG */ echo 'Day Length: '.$data.'<br> *Day Length Extend: '.$stageData['daylength_extend'].'<br>';
				$result= $result+$daylength_difference; // Append Data
				/* Reset Data */ $data = 0; /* Reset Data */
			} 
		## ======= Wind (KMH) =======
			if ($wind > $stageData['wind_min'] && $wind >= 20) { // Till 15 won't influence, each 5 kmh will extend by 0.05 days
				$wind_difference = $wind - $stageData['wind_min']; // Get The Difference 
				$wind_difference = $wind_difference / 5; // Divide the differnce to get every 5 KMH 
				$wind_difference = floor($wind_difference); // Get int number 
				$data = $wind_difference * $stageData['wind_extend']; // each 5 kmh will extend by 0.05 days
				$data = $data * $duration; // duration time
// /* DEBUG */ echo 'Wind: '.$data.'<br>';
				$result= $result+$data; // Append Data

				/* Reset Data */ $data = 0; /* Reset Data */
			} 

	$final_result = $result/2;
// == DEBUG =============================================================================
	// echo '<a style="color:green">Stage: </a>'.$stage.'<br>';
	// echo '<a style="color:red">Day Temp: </a>'.$temp_day.'<br>';
	// echo '<a style="color:red">Night Temp: </a>'.$temp_night.'<br>';
	// echo '<a style="color:red">Humid: </a>'.$humid.'%<br>';
	// echo '<a style="color:red">Day Length: </a>'.$daylength.'<br>';
	// echo '<a style="color:red">Wind: </a>'.$wind.'<br>';
	// echo '<a style="color:red">Establishment Stage: </a>'.$final_result.'<br>';
// == DEBUG =============================================================================
	return $final_result;
}

###### Function Example ######
// $stage = 'sucker_selection';
// $temp_day = 28;
// $temp_night = 26;
// $humid = 50;
// $daylength = 15;
// $wind = 36;
// stages($stage, 30, $temp_day, $temp_night, $humid,  $daylength, $wind);
###### Function Example ######



// ================== GET Data for Options ======================
if ( isset($_GET['getharvest']) && isset($_GET['select_id']) ) {
	$the_id = $_GET['select_id'];
	$xlsxfile = "../excel/".$_GET['select_id'].'.xlsx';
	if (!file_exists($xlsxfile)) {
		echo '<center><h4 style="color:red; padding-top:20px; padding-bottom:7px;">No Data</h4></center>';
		die();
	}
	// echo $xmlfile;
	require_once('simplexlsx.class.php');
	$xlsx = new SimpleXLSX($xlsxfile);
	// echo '<pre>'; print_r($xlsx->rows()); echo '</pre>';
	// $output_xlsx = $xlsx->rows();
	$stage_data = $xlsx->rows();
	$sd_count = 0;
	foreach ($stage_data as $row => $innerArray) { 
	  if ($sd_count == 0) {
	  	$sd_count++;
	  	continue;
	  } else {
	  	// echo '<pre>'; print_r($innerArray); echo '</pre>';
		 //    echo $innercount . "<br/>";
	  	$_Stages = file_get_contents($jsonfilelocation);
		$json2php = json_decode($_Stages,true);
		$growth_result = 0;
		foreach ($json2php['Stages'] as  $x => $val) {
		  // echo '<hr><pre>'; print_r($x); echo '</pre>';
		  // echo '<pre>'; print_r($val); echo '</pre><hr>';
		
	  		$stage = $x;
			$month = $stage_data[$sd_count][0];
			$temp_day = $stage_data[$sd_count][2];
			$temp_night = $stage_data[$sd_count][3];
			$humid = $stage_data[$sd_count][4];
			$daylength = $stage_data[$sd_count][5];
			$wind = $stage_data[$sd_count][6];
			$growth_result += stages($stage, 30, $temp_day, $temp_night, $humid,  $daylength, $wind);
			
		}
		 $final_growth_result[$month] = $growth_result;
		 // array_push($final_growth_result, array('month' => $month, 'days' => $growth_result));
		 $sd_count++;
		 $array_i = 0;
		 foreach ($final_growth_result as $the_array => $the_val) {
		 // echo '<pre>'; print_r($the_val); echo '</pre>';
		 	// $numbers[] = $the_val;
		 	// array_push($numbers[$array_i], array('month' => $month,
		 	// 						  'days' => $growth_result));
		 	$array_i++;
		 }

	  }
	  // echo $sd_count.'<br>';
		// echo '<hr>';

	}
		 // print_r(array_keys($numbers, min($numbers)));  # array('cats')
		 // echo '<h4  style="color:red;">Min: <center style="color:black;">'.$min.'</center></h4>';
		$min_num = array_keys($final_growth_result, min($final_growth_result)); 
		$min_num = $min_num[0];
		// print_r($min_num);
		$the_month = ucfirst($min_num);
		$planting_date = $the_month." 01 2021";
		// echo("<br>".$planting_date."<br>");
		$planting_date_php = date('Y/m/d', strtotime($planting_date));
		// echo $planting_date_php."<br>";
		$harvest_date = new DateTime($planting_date_php);
		$harvest_date->modify('+'.floor($final_growth_result[$min_num]).' days');
		$harvest_date_final = $harvest_date->format('Y/m/d');

		$days_add = $final_growth_result[$min_num];
		// echo $days_add;
		// $planting_date_php1 = date('Y-m-d', strtotime($planting_date));
		// echo $planting_date_php1; echo '<br>';
		// echo date('Y-m-d', strtotime($planting_date_php1.'+'.floor($days_add).' days'));

		// $harvest_date = date('d/m/Y', strtotime($planting_date_php.'+'.$final_growth_result[$min_num].' days'));
		// echo '7asad in: '.$harvest_date_final.'<br>';
	// ==== The Output Result ====
		echo '<p><h6><center>Best Month: <strong style="color:#007BFF; text-decoration: underline;">'.$the_month.'</strong></center></h6>Best Date: <strong style="color:red;">'.$planting_date_php.'</strong><br> Days: <strong>'.$final_growth_result[$min_num].'</strong><br>Harvest Date: <strong style="color:green;">'.$harvest_date_final.'</strong></p><br>'.$x;
		?>

		<?php
	// ==== The Output Result ====

		 // echo '<br><br><pre>'; print_r($final_growth_result); echo '</pre>';
	// echo $stage_data[1][2].'<br>';
	// echo $stage_data[1][3].'<br>';
	// echo $stage_data[1][4].'<br>';
	// echo $stage_data[1][5].'<br>';
	// echo $stage_data[1][6].'<br>';
}
// ============================================== *GET Data for Options ======================================================


if (isset($_GET['id'])) {
	$the_id = $_GET['id'];
	$xlsxfile = "../excel/".$_GET['id'].'.xlsx';
	if (!file_exists($xlsxfile)) {
		echo '<center><h4 style="color:red; padding-top:20px; padding-bottom:7px;">No Data</h4></center>';
		die();
	}
	// echo $xmlfile;
	require_once('simplexlsx.class.php');
	$xlsx = new SimpleXLSX($xlsxfile);
	// echo '<pre>'; print_r($xlsx->rows()); echo '</pre>';
	// $output_xlsx = $xlsx->rows();
	$stage_data = $xlsx->rows();
	$sd_count = 0;
	foreach ($stage_data as $row => $innerArray) { 
	  if ($sd_count == 0) {
	  	$sd_count++;
	  	continue;
	  } else {
	  	// echo '<pre>'; print_r($innerArray); echo '</pre>';
		 //    echo $innercount . "<br/>";
	  	$_Stages = file_get_contents($jsonfilelocation);
		$json2php = json_decode($_Stages,true);
		$growth_result = 0;
		foreach ($json2php['Stages'] as  $x => $val) {
		  // echo '<hr><pre>'; print_r($x); echo '</pre>';
		  // echo '<pre>'; print_r($val); echo '</pre><hr>';
		
	  		$stage = $x;
			$month = $stage_data[$sd_count][0];
			$temp_day = $stage_data[$sd_count][2];
			$temp_night = $stage_data[$sd_count][3];
			$humid = $stage_data[$sd_count][4];
			$daylength = $stage_data[$sd_count][5];
			$wind = $stage_data[$sd_count][6];
			$growth_result += stages($stage, 30, $temp_day, $temp_night, $humid,  $daylength, $wind);
			
			
		}
		 $final_growth_result[$month] = $growth_result;
		 // array_push($final_growth_result, array('month' => $month, 'days' => $growth_result));
		 $sd_count++;
		 $array_i = 0;
		 foreach ($final_growth_result as $the_array => $the_val) {
		 // echo '<pre>'; print_r($the_val); echo '</pre>';
		 	// $numbers[] = $the_val;
		 	// array_push($numbers[$array_i], array('month' => $month,
		 	// 						  'days' => $growth_result));
		 	$array_i++;
		 }

	  }
	  // echo $sd_count.'<br>';
		// echo '<hr>';

	}
		 // print_r(array_keys($numbers, min($numbers)));  # array('cats')
		 // echo '<h4  style="color:red;">Min: <center style="color:black;">'.$min.'</center></h4>';
		$min_num = array_keys($final_growth_result, min($final_growth_result)); 
		$min_num = $min_num[0];
		// print_r($min_num);
		$the_month = ucfirst($min_num);
		$planting_date = $the_month." 01 2021";
		// echo("<br>".$planting_date."<br>");
		$planting_date_php = date('Y/m/d', strtotime($planting_date));
		// echo $planting_date_php."<br>";
		$harvest_date = new DateTime($planting_date_php);
		$harvest_date->modify('+'.floor($final_growth_result[$min_num]).' days');
		$harvest_date_final = $harvest_date->format('Y/m/d');

		$days_add = $final_growth_result[$min_num];
		// echo $days_add;
		// $planting_date_php1 = date('Y-m-d', strtotime($planting_date));
		// echo $planting_date_php1; echo '<br>';
		// echo date('Y-m-d', strtotime($planting_date_php1.'+'.floor($days_add).' days'));

		// $harvest_date = date('d/m/Y', strtotime($planting_date_php.'+'.$final_growth_result[$min_num].' days'));
		// echo '7asad in: '.$harvest_date_final.'<br>';
	// ==== The Output Result ====
		echo '<p><h6><center>Best Month: <strong style="color:#007BFF; text-decoration: underline;">'.$the_month.'</strong></center></h6>Best Date: <strong style="color:red;">'.$planting_date_php.'</strong><br> Days: <strong>'.$final_growth_result[$min_num].'</strong><br>Harvest Date: <strong style="color:green;">'.$harvest_date_final.'</strong></p><br>';
		?>
		<p>
		  <button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#growthData<?php echo $the_id; ?>" aria-expanded="false" aria-controls="growthData<?php echo $the_id; ?>">
		    Show Data
		  </button>
		</p>
		<div class="collapse" id="growthData<?php echo $the_id; ?>">
		  <div class="card card-body">
		    <!-- <pre><?php // print_r($final_growth_result); ?></pre> -->
        	<div class="timeline">
                <div class="timeline__wrap">
                    <div class="timeline__items">
		    <?php 		$div_count=0;
				foreach ($final_growth_result as $key => $value) {
					?>
                            	<div class="timeline__item">
                                    <div class="timeline__content">
                                    	<h2><?php echo $key; ?></h2>
                                    	<h4><?php echo '<font style="color:red;">'.$x.'</font>'; ?></h4>
                                    	<p><?php echo $value; ?></p>
                                    </div>
                                </div>

					<?php
					$div_count++;
				}
		    ?>
                    </div>
                </div>
            </div>
		  </div>
		</div>
		        <!-- ==== TimeLine ==== -->
        <script>
			$(document).ready(function(){
			 jQuery('.timeline').timeline({
			  // mode: 'horizontal',
			  // visibleItems: 4
			  //Remove this comment for see Timeline in Horizontal Format otherwise it will display in Vertical Direction Timeline
			 });
			});
		</script>
		<?php
	// ==== The Output Result ====

		 // echo '<br><br><pre>'; print_r($final_growth_result); echo '</pre>';
	// echo $stage_data[1][2].'<br>';
	// echo $stage_data[1][3].'<br>';
	// echo $stage_data[1][4].'<br>';
	// echo $stage_data[1][5].'<br>';
	// echo $stage_data[1][6].'<br>';
} else if (isset($_POST['areas'])) {
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$area_array = $_POST['areas'];
		$div_count=0;
		foreach ($area_array as $value) {
			if ($div_count==0) {
				echo '
					<div class="alert alert-danger" role="warning">
						<div id="growing_time_name'.$div_count.'"><center><h4>Bannana</h4></center></div>
					</div>
				';
			}
			// include($actual_link.'?id='.$value);
			// $output = shell_exec("php growing_time.php?id=".$value); 
			// print_r($output);
			?>
			<div class="alert alert-primary" role="alert">
				<h4 style="text-align: center; text-decoration: underline;"><?php getAreasbyID ($conn,$value); ?></h4>
				<div id="growing_time<?php echo $div_count; ?>"></div>
			</div>
			<script type="text/javascript">$(document).ready(function(){$('#growing_time<?php echo $div_count; ?>').load('lib/growing_time.php?id=<?php echo $value; ?>');});</script>
			<?php
			$div_count++;
		}
	}
?>


      <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
        <script src="assets/dist/js/dashboard.js"></script>
        <!-- === jQuery TimeLine === -->
        <script src="assets/dist/js/timeline.min.js"></script>