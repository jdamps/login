<?php
require "header.php";
?>

<?php
require "header2.php";
?>

<main>
<?php

if (isset($_SESSION['aid'])) {
	
require './includes/dbh.inc.php';



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
	<script src='fullcalendar/core/locales/pl.js'></script>

    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
              plugins: [ 'timeGrid', 'dayGrid' ],
			  locale: 'pl',
			  timeZone: 'local',
			  defaultView: 'dayGridMonth',
			   minTime: "07:00:00",
			   maxTime: "20:00:00",
			  businessHours: [{
				daysOfWeek: [ 1, 2, 3, 4, 5 ], 
				startTime: '7:00', // a start time (10am in this example)
				endTime: '20:00', // an end time (6pm in this example)
				},
				{
				daysOfWeek: [ 6 ], // Monday - Thursday
				startTime: '9:00', // a start time (10am in this example)
				endTime: '15:00', // an end time (6pm in this example)
				}],
				
				
		header: {
		left: 'prev,next',
		center: 'title, addEventButton',
		right: 'timeGridDay,timeGridFourDay,dayGridMonth'
		},

		views: {
		timeGridFourDay: {
        type: 'timeGrid',
        duration: { days: 7 },
        buttonText: 'Tydzień'
		}
		},
		
		customButtons: {
      addEventButton: {
        text: 'add event...',
        click: function() {
          var dateStr = prompt('Enter a date in YYYY-MM-DD format');
          var date = new Date(dateStr + 'T00:00:00'); // will be in local time

          if (!isNaN(date.valueOf())) { // valid?
            calendar.addEvent({
              title: 'dynamic event',
              start: date,
              allDay: true
            });
            alert('Great. Now, update your database...');
          } else {
            alert('Invalid date.');
          }
        }
      }
    }
		
        });

        calendar.render();
      });

    </script>
  </head>
  <body>

    <div id='calendar'></div>

  </body>
</html>