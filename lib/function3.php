<?php 
include("../config.php");
// =============== Functions ======================
function getAreaData ($id) {
  global $conn;
  $sql = "SELECT * FROM area WHERE id=".$id;
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            return $row;
    }
  } else {
    echo "0 results";
  }
}
// =============== Functions ======================

function getProfit ($start_date, $area_id) {
$date_in_month =  date('m', strtotime($start_date)); //June, 2017
$date_in_week =  date('w', strtotime($start_date))-1; //June, 2017
// echo "<br>".$date_in_week."<br>";

// === Parameters ===
$byMonth = array(
  '01' => 0.85,
  '02' => 0.65,
  '03' => 0.6,
  '04' => 0.55,
  '05' => 0.5,
  '06' => 0.45,
  '07' => 0.55,
  '08' => 0.7,
  '09' => 0.85,
  '10' => 1,
  '11' => 1,
  '12' => 0.95);

$bySoil = array(
  'sand' => 0.75,
  'loamy sand' => 0.8,
  'sandy loam' => 0.85,
  'loam' => 0.9,
  'silt loam' => 0.9,
  'silt' => 0.85,
  'sandy clay loam' => 1,
  'clay loam' => 1,
  'silty clay loam' => 0.95,
  'sandy clay' => 0.95,
  'silty clay' => 0.95,
  'clay' => 0.9,
  'heavy clay' => 0.85);

$Prices = array(
  1.66,
  1.71,
  1.91,
  1.73,
  1.53,
  1.35,
  1.24,
  2.33,
  2.17,
  2.71,
  3.08,
  2.87,
  2.34,
  2.39,
  1.83,
  3.25,
  3.00,
  2.43,
  2.67,
  1.80,
  1.90,
  1.72,
  1.65,
  1.90,
  3.13,
  3.50,
  4.10,
  4.20,
  3.80,
  3.10,
  2.93,
  3.01,
  2.95,
  2.80,
  2.20,
  2.25,
  2.30,
  1.95,
  2.08,
  2.06,
  1.91,
  1.70,
  1.57,
  1.36,
  1.14,
  1.03,
  0.94,
  0.90,
  0.86,
  0.79,
  0.85,
  0.90,
  );

// echo "<br>By Month: ".$byMonth[$date_in_month];
// echo "<br>Soil: ".getAreaData ($area_id)['soil']." Data: ".$bySoil[getAreaData ($area_id)['soil']];
// echo "<br>Chloride: ".getAreaData ($area_id)['chloride']."<br>";
$chloride = getAreaData ($area_id)['chloride'];
$chloride_math = $chloride - 70;
$chloride_math = $chloride_math*10;
// echo "Chloride by Soil: ".$chloride_math;
$profit = ((12000*$byMonth[$date_in_month]*$bySoil[getAreaData ($area_id)['soil']])-$chloride_math)*$Prices[$date_in_week];
$yivol = ((12000*$byMonth[$date_in_month]*$bySoil[getAreaData ($area_id)['soil']])-$chloride_math);
$result["profit"] = $profit;
$result["yivol"] = $yivol;
return $result;
}




if (isset($_GET['start_date']) && isset($_GET['area_id'])) {
	$start_date = $_GET['start_date'];
	$area_id = $_GET['area_id'];
	print_r(getProfit ($start_date, $area_id));
} else { die("No Data"); }
$date_in_month =  date('m', strtotime($start_date)); //June, 2017
$date_in_week =  date('w', strtotime($start_date))-1; //June, 2017
// echo "<br>".$date_in_week."<br>";

// === Parameters ===
$byMonth = array(
  '01' => 0.85,
  '02' => 0.65,
  '03' => 0.6,
  '04' => 0.55,
  '05' => 0.5,
  '06' => 0.45,
  '07' => 0.55,
  '08' => 0.7,
  '09' => 0.85,
  '10' => 1,
  '11' => 1,
  '12' => 0.95);

$bySoil = array(
  'sand' => 0.75,
  'loamy sand' => 0.8,
  'sandy loam' => 0.85,
  'loam' => 0.9,
  'silt loam' => 0.9,
  'silt' => 0.85,
  'sandy clay loam' => 1,
  'clay loam' => 1,
  'silty clay loam' => 0.95,
  'sandy clay' => 0.95,
  'silty clay' => 0.95,
  'clay' => 0.9,
  'heavy clay' => 0.85);

$Prices = array(
  1.66,
  1.71,
  1.91,
  1.73,
  1.53,
  1.35,
  1.24,
  2.33,
  2.17,
  2.71,
  3.08,
  2.87,
  2.34,
  2.39,
  1.83,
  3.25,
  3.00,
  2.43,
  2.67,
  1.80,
  1.90,
  1.72,
  1.65,
  1.90,
  3.13,
  3.50,
  4.10,
  4.20,
  3.80,
  3.10,
  2.93,
  3.01,
  2.95,
  2.80,
  2.20,
  2.25,
  2.30,
  1.95,
  2.08,
  2.06,
  1.91,
  1.70,
  1.57,
  1.36,
  1.14,
  1.03,
  0.94,
  0.90,
  0.86,
  0.79,
  0.85,
  0.90,
  );

// echo "<br>By Month: ".$byMonth[$date_in_month];
// echo "<br>Soil: ".getAreaData ($area_id)['soil']." Data: ".$bySoil[getAreaData ($area_id)['soil']];
// echo "<br>Chloride: ".getAreaData ($area_id)['chloride']."<br>";
$chloride = getAreaData ($area_id)['chloride'];
$chloride_math = $chloride - 70;
$chloride_math = $chloride_math*10;
// echo "Chloride by Soil: ".$chloride_math;
$profit = ((12000*$byMonth[$date_in_month]*$bySoil[getAreaData ($area_id)['soil']])-$chloride_math)*$Prices[$date_in_week];
$yivol = ((12000*$byMonth[$date_in_month]*$bySoil[getAreaData ($area_id)['soil']])-$chloride_math);

// echo "<br>Profit: ".$profit;
// echo "<br>Yivol: ".$yivol;
// $new_profit = $profit;
// foreach ($Prices as $data)  {
//     $new_profit = $new_profit+$data;
// }
// echo "<br>".$new_profit;
?>