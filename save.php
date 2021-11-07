<?php 
include("config.php");
// === Save To Calendar Function ===
function saveToCalendar ($start_date, $area_id, $harvist) {
	global $conn;
	$sql = "INSERT INTO calendar (start_date, harvest_date, area_id)
	VALUES ('".$start_date."', '".$harvist."', '".$area_id."')";

	if ($conn->query($sql) === TRUE) {
	  echo "<center><h2>New record created successfully</h2><center><br>";
	  saveToArea ($area_id, $harvist);
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function saveToArea ($area_id, $harvist) {
	global $conn;
	$sql = "UPDATE area SET current_growing='Bannana', harvest='".$harvist."' WHERE id=".$area_id;

	if ($conn->query($sql) === TRUE) {
		header("Location: calendar.php");
	  echo "Record updated successfully";
	} else {
	  echo "Error updating record: " . $conn->error;
	}

}

// === Save To Calendar Function ===
if (isset($_GET['start_date']) && isset($_GET['area_id']) && isset($_GET['harvist'])) {
	// print_r($_GET);
	$start_date =$_GET['start_date'];
	$area_id =$_GET['area_id'];
	$harvist =$_GET['harvist'];
	saveToCalendar ($start_date, $area_id, $harvist);
}
?>