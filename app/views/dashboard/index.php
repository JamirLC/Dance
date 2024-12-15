<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Calendar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <style>
        .fc-day-today {
            background-color: #f0f0f0;
        }
        .fc-day-appointment {
            background-color: #ff9f00;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Appointment Calendar</h1>
        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var appointments = <?php echo json_encode($appointments); ?>; // Get appointment dates from PHP
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: appointments.map(function(appointment_date) {
                    return {
                        title: 'Appointment',
                        start: appointment_date,  // Mark the date as appointment
                        color: '#ff9f00'  // Custom color for the appointment
                    };
                })
            });
            calendar.render();
        });
    </script>
</body>
</html>
