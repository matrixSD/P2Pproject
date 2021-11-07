<?php 
// Google Map Function 
function getDataGoogleMaps () {
  global $conn;
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '
                    const contentString'.$row["id"].' =
          "';
          echo "<center><img src='./dist/images/bannana.png' style='width:25%;'></center><h3><img src='./dist/images/mountain.png' style='width:25%;'>".$row['name']."<br></h3>";
          echo "Size: ".$row['size']."<br>";
          echo "Soil: ".$row['soil']."<br>";
          echo "Max Temp: ".$row['max_temp']."<br>";
          echo "Min Temp: ".$row['min_temp']."<br>";
          echo "<a href='' class='ajax' data-id='".$row['id']."'><center><a href='#' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#mapViewModal".$row['id']."'>View</a></center></a>";
        echo '";
        const infowindow'.$row["id"].' = new google.maps.InfoWindow({
          content: contentString'.$row["id"].',
          maxWidth: 200,
        });
        const marker'.$row["id"].' = new google.maps.Marker({
          position: uluru'.$row["id"].',
          map,
          title: "Uluru (Ayers Rock)",
        });
        marker'.$row["id"].'.addListener("click", () => {
          infowindow'.$row["id"].'.open(map, marker'.$row["id"].');
          map.setZoom(15);
          map.setCenter(marker'.$row["id"].'.getPosition());

        });
      ';
    }
  } else {
    echo "0 results";
  }
}
function getLatLongGoogleMaps () {
  global $conn;
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo '
            const uluru'.$row["id"].' = { lat: '.$row["latitude"].', lng: '.$row["longitude"].' };
      ';
    }
  } else {
    echo "0 results";
  }
}
// === End Google Maps ===
function getAreasList () {
  global $conn;
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>
        <div id="results" class="results card" style="margin-top: 14px;">
          <h5 class="card-header"><?php echo $row['name']; ?></h5>
          <div class="card-body">
            <?php if ($row['harvest']!="N/A") {
              echo '<img src="./dist/images/bannana.png" alt="" style="width:10%">';
            } ?>
            <h5 class="card-title">Current Growing:<font style="color:red;"> <?php echo $row['current_growing']; ?></font></h5>
            <p class="card-text">Harvest Time: <font style="color: red;"><?php echo $row['harvest']; ?></font></p>
            <div class="row">
              <div class="col-md-3"><center><a href="#" class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#mapViewModal<?php echo $row['id']; ?>'>Details</a></center></div>
              <div class="col-md-6"><center><a href="#" data-bs-toggle="modal" data-bs-target="#growingModal<?php echo $row['id']; ?>" class="btn btn-danger">Growing Time Forecast</a></center></div>
              <div class="col-md-3"><center><a href="planning.php" class="btn btn-info">Plan</a></center></div>
            </div>
          </div>
        </div>
        <?php
    }
  } else {
    echo "0 results";
  }
}

function getAreaModals () {
  global $conn;
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>
<div class="modal fade" id="mapViewModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="mapViewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <h1><span class="badge bg-success"><?php echo $row['name']; ?></span></h1>
            <div class="row">
              <div class="col-md-2"><img style="width:100%;" src="https://cdn3.iconfinder.com/data/icons/summer-189/64/sun_bright_sunlight-512.png" alt=""></div>
              <div class="col-md-10">
              <small>Avg. Month temp: </small>
              <h2><?php echo $row['max_temp']; ?></h2>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-2"><img style="width:100%;" src="https://d29fhpw069ctt2.cloudfront.net/icon/image/49039/preview.svg" alt=""></div>
              <div class="col-md-10">
              <small>Avg. Humidity: </small>
              <h2><?php echo $row['humidity']; ?></h2>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-2"><img style="width:100%;" src="https://us.123rf.com/450wm/aiinue/aiinue2008/aiinue200800785/153959767-tree-planting-icon-sapling-icon-vector-and-illustration-.jpg?ver=6" alt=""></div>
              <div class="col-md-10">
              <small>Current Growing Crop: </small>
              <h2><?php echo $row['current_growing']; ?></h2>
              <small>Previously Planted: <font style="color: red">N/A</font></small>
              </div>
            </div> 
            <hr>
            <h1><span class="badge bg-info">Coordinates</span></h1>
            <div class="row">
              <div class="col-md-2"><img style="width:100%;" src="https://png.pngtree.com/png-vector/20190307/ourlarge/pngtree-vector-angle-ruler-icon-png-image_757219.jpg" alt=""></div>
              <div class="col-md-10">
              <small>Longtitude: </small>
              <h2><?php echo $row['longitude']; ?></h2>
              </div>
            </div>  
            <hr>
            <div class="row">
              <div class="col-md-2"><img style="width:100%;" src="https://png.pngtree.com/png-vector/20190307/ourlarge/pngtree-vector-angle-ruler-icon-png-image_757219.jpg" alt=""></div>
              <div class="col-md-8">
              <small>Latitude: </small>
              <h2><?php echo $row['latitude']; ?></h2>
              </div>
            </div>      
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <?php
    }
  } else {
    echo "0 results";
  }
}
function getGrowingModals () {
  global $conn;
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>
<div class="modal fade" id="growingModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['name']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="./lib/growing_time.php?id=<?php echo $row['id']; ?>" frameborder="0" style="height:60vh; width:100%"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <?php
    }
  } else {
    echo "0 results";
  }
}

function areaListCheck () {
  global $conn;
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      ?>
        <div class="form-check">
          <input class="form-check-input" name="<?php echo $row['id']; ?>" type="checkbox" value="<?php echo $row['id']; ?>" id="flexCheckDefault<?php echo $row['id']; ?>">
          <label class="form-check-label" for="flexCheckDefault<?php echo $row['id']; ?>">
            <h4><?php echo $row['name']; ?></h4>
          </label>
        </div>
        <?php
    }
  } else {
    echo "0 results";
  }
}
function getAreaDataById ($id) {
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

function getCalendarByAreaId ($id) {
  global $conn;
  $sql = "SELECT * FROM calendar WHERE area_id=".$id;
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

function getAreaByPlanted () {
  global $conn;
  $sql = "SELECT * FROM area WHERE current_growing='Bannana'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            // echo "";print_r( $row['name'] );
            ?>

            <li class="list-group-item"><button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#flipFlop<?php echo $row['id']; ?>">
            <?php echo $row['name']; ?>
            </button></li>

<!-- The modal -->
<div class="modal fade" id="flipFlop<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="modalLabel"><?php echo $row['name']; ?></h4>
</div>
<div class="modal-body">
<iframe src="view_plan.php?step=start_date=2021-09-15&area_id=<?php echo $row['id']; ?>&harvist=2023-01-16&id=36" style="width: 100%; height:500px;"frameborder="0"></iframe>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
            <?php
    }
  } else {
    echo "0 results";
  }
}

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
$chloride = getAreaDataById ($area_id)['chloride'];
$chloride_math = $chloride - 70;
$chloride_math = $chloride_math*10;
// echo "Chloride by Soil: ".$chloride_math;
$profit = ((12000*$byMonth[$date_in_month]*$bySoil[getAreaDataById ($area_id)['soil']])-$chloride_math)*$Prices[$date_in_week];
$yivol = ((12000*$byMonth[$date_in_month]*$bySoil[getAreaDataById ($area_id)['soil']])-$chloride_math);
$result["profit"] = $profit;
$result["yivol"] = $yivol;
return $result;
}

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

?>