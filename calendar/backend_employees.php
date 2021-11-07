<?php
require_once '_db.php';

$stmt = $db->prepare("SELECT * FROM person ORDER BY last, first");
$stmt->execute();
$list = $stmt->fetchAll();

class Employee {}

$result = array();

foreach($list as $employee) {
  $r = new Employee();
  $r->id = $employee['id'];
  $r->name = $employee['last'].', '.$employee['first'];
  $result[] = $r;
  
}

header('Content-Type: application/json');
echo json_encode($result);
