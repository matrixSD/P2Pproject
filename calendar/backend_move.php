<?php
require_once '_db.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$stmt = $db->prepare("UPDATE leave_event SET leave_start = :start, leave_end = :end WHERE id = :id");
$stmt->bindParam(':id', $params->id);
$stmt->bindParam(':start', $params->start);
$stmt->bindParam(':end', $params->end);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Update successful';

header('Content-Type: application/json');
echo json_encode($response);

?>
