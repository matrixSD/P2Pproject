<?php
require_once '_db.php';

$stmt = $db->prepare("SELECT * FROM leave_event WHERE NOT ((leave_end <= :start) OR (leave_start >= :end))");
$stmt->bindParam(':start', $_GET['start']);
$stmt->bindParam(':end', $_GET['end']);
$stmt->execute();
$result = $stmt->fetchAll();

class Event {}
$events = array();

foreach($result as $row) {
    $e = new Event();
    $e->id = $row['id'];
    $e->text = "";
    $e->start = $row['leave_start'];
    $e->end = $row['leave_end'];
    $e->resource = $row['person_id'];
    $events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);
