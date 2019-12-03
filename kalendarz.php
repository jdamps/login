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
				
	
	
		
		events: 'load.php',
		selectable:true,
		selectHelper:true,
		  select: function(start, end, allDay)
			{
			var title = prompt("Enter Event Title");
			if(title)
			{
			var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
			var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
			$.ajax({
			url:"insert.php",
			type:"POST",
			data:{title:title, start:start, end:end},
			success:function()
			   {
				calendar.fullCalendar('refetchEvents');
				alert("Added Successfully");
			   }
			  })
			 }
			},
			
					editable:true,
			eventResize:function(event)
			{
			 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			 var title = event.title;
			 var id = event.id;
			 $.ajax({
			  url:"update.php",
			  type:"POST",
			  data:{title:title, start:start, end:end, id:id},
			  success:function(){
			   calendar.fullCalendar('refetchEvents');
			   alert('Event Update');
			  }
			 })
			},
			
					eventDrop:function(event)
			{
			 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
			 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
			 var title = event.title;
			 var id = event.id;
			 $.ajax({
			  url:"update.php",
			  type:"POST",
			  data:{title:title, start:start, end:end, id:id},
			  success:function()
			  {
			   calendar.fullCalendar('refetchEvents');
			   alert("Event Updated");
			  }
			 });
			},
			
					eventClick:function(event)
			{
			 if(confirm("Are you sure you want to remove it?"))
			 {
			  var id = event.id;
			  $.ajax({
			   url:"delete.php",
			   type:"POST",
			   data:{id:id},
			   success:function()
			   {
				calendar.fullCalendar('refetchEvents');
				alert("Event Removed");
			   }
			  })
			 }
			},

				
				
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
		

		
        });

        calendar.render();
      });

    </script>
  </head>
  <body>

    <div id='calendar'></div>

  </body>
</html>