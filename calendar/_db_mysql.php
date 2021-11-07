<?php
$host = "127.0.0.1";
$port = 3306;
$username = "zero";
$password = "a123123a";
$database = "plan2plant";

$db = new PDO("mysql:host=$host;port=$port",
               $username,
               $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE DATABASE IF NOT EXISTS `$database`");
$db->exec("use `$database`");

function tableExists($dbh, $id)
{
    $results = $dbh->query("SHOW TABLES LIKE '$id'");
    if(!$results) {
        return false;
    }
    if($results->rowCount() > 0) {
        return true;
    }
    return false;
}

$exists = tableExists($db, "person");

if (!$exists) {

    $db->exec("CREATE TABLE IF NOT EXISTS person (
                        id INTEGER PRIMARY KEY,
                        first VARCHAR(200),
                        last VARCHAR(200))");

    $db->exec("CREATE TABLE IF NOT EXISTS leave_event (
                        id INTEGER PRIMARY KEY AUTO_INCREMENT,
                        person_id INTEGER,
                        leave_start DATETIME,
                        leave_end DATETIME)");

    $employees = array(
        array('id' => 1,
            'first' => 'Adam',
            'last' => 'Emerson'),
        array('id' => 2,
            'first' => 'Cheryl',
            'last' => 'Irwin'),
        array('id' => 3,
            'first' => 'Emily',
            'last' => 'Jameson'),
        array('id' => 4,
            'first' => 'Eva',
            'last' => 'Rodriguez'),
        array('id' => 5,
            'first' => 'Eliah',
            'last' => 'Kingston'),
        array('id' => 6,
            'first' => 'Taylor',
            'last' => 'Niles'),
        array('id' => 7,
            'first' => 'Jo',
            'last' => 'Thomas'),
    );

    $insert = "INSERT INTO person (id, first, last) VALUES (:id, :first, :last)";
    $stmt = $db->prepare($insert);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':first', $first);
    $stmt->bindParam(':last', $last);

    foreach ($employees as $item) {
        $id = $item['id'];
        $first = $item['first'];
        $last = $item['last'];
        $stmt->execute();
    }

}