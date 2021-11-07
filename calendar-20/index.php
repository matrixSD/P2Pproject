<?php
include("../config.php");
include("../functions.php");

// print_r($conn);
function readData () {
  global $conn;
  $sql = "SELECT * FROM calendar";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $colors = array("#34eb49", "#34d9eb", "#5c1870", "#d10000", "#7ad100", "#00d18b", "#001cd1", "#d100ca");
      $kolor = array_rand($colors);
      $vkolor = $colors[$kolor];
      ?>
        {
          title: '<?php echo getAreaDataById($row['area_id'])['name']; ?>',
          url: '../view_plan.php?step=start_date=<?php echo $row["start_date"]; ?>&area_id=<?php echo $row["area_id"]; ?>&harvist=<?php echo $row["harvest_date"]; ?>&id=<?php echo $row["id"]; ?>',
          color: '<?php echo $vkolor; ?>',
          start: '<?php echo $row['start_date']; ?>T10:30:00',
          end: '<?php echo $row['harvest_date']; ?>T12:30:00'
        },
      <?php
    }
  } else {
    echo "0 results";
  }
}
// readData ();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="fonts/icomoon/style.css">
  
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Calendar #10</title>
  </head>
  <body>
  

  <div id='calendar-container'>
    <div id='calendar'></div>
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>
    <script src='fullcalendar/packages/timegrid/main.js'></script>
    <script src='fullcalendar/packages/list/main.js'></script>

    

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      height: 'parent',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      defaultView: 'dayGridMonth',
      defaultDate: '2021-06-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        <?php readData (); ?>

      ]
    });

    calendar.render();
  });

    </script>

    <script src="js/main.js"></script>
  </body>
</html>