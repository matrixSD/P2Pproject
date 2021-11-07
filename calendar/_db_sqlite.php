<?php

$db_exists = file_exists("daypilot.sqlite");

$db = new PDO('sqlite:daypilot.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$db_exists) {
    //create the database
    $db->exec("CREATE TABLE IF NOT EXISTS person (
                        id INTEGER PRIMARY KEY,
                        first VARCHAR(200),
                        last VARCHAR(200))");

    $db->exec("CREATE TABLE IF NOT EXISTS leave_event (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
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
