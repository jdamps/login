<?php
require "../header.php";
?>

<?php
require "../header2.php";
?>

<main>
<?php

if (isset($_SESSION['aid'])) {
	
require '../includes/dbh.inc.php';



$eid = $_SESSION['aid'];


mysqli_close($con);

}
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
  
    <meta charset='utf-8' />

    <link href='fullcalendar/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
	<link href='fullcalendar/list/main.css' rel='stylesheet' />
	<link href='fullcalendar/interaction/main.css' rel='stylesheet' />
	<link href='fullcalendar/timegrid/main.css' rel='stylesheet' />

    <script src='fullcalendar/core/main.js'></script>
    <script src='fullcalendar/daygrid/main.js'></script>
	<script src='fullcalendar/interaction/main.js'></script>
	<script src='fullcalendar/list/main.js'></script>
	<script src='fullcalendar/timegrid/main.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
              plugins: [ 'timeGrid' ],
			  timeZone: 'local',
			  defaultView: 'timeGridFourDay',
			  businessHours: {
  // days of week. an array of zero-based day of week integers (0=Sunday)
  daysOfWeek: [ 1, 2, 3, 4, 5, 6 ], // Monday - Thursday

  startTime: '7:00', // a start time (10am in this example)
  endTime: '18:00', // an end time (6pm in this example)
},
		header: {
		left: 'prev,next',
		center: 'title',
		right: 'timeGridDay,timeGridFourDay', 'dayGridMonth'
		},

		views: {
      timeGridFourDay: {
        type: 'timeGrid',
        duration: { days: 5 },
        buttonText: 'weekhhhh'
		}
		
		
		views: {
      timeGridFourDay: {
        type: 'timeGrid',
        duration: { days: 7 },
        buttonText: 'Miesiąc'
		}
		},
		
		
        });

        calendar.render();
      });

    </script>
  </head>
  <body>

    <div id='calendar'></div>

  </body>
</html>