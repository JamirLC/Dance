<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet" />

    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        header {
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #242582;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #f64c72;
        }

        h1 {
            color: #242582;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Flexbox layout for appointments and calendar */
        .container {
            display: flex;
            justify-content: space-between;
            /* Ensure both items are aligned horizontally */
            gap: 20px;
            flex-wrap: nowrap;
            /* Prevent wrapping */
        }

        /* Appointments Table */
        .appointments-table {
            width: 48%;
            /* Adjust width of the table */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #242582;
            color: #fff;
        }

        td {
            color: #333;
        }

        tbody tr:hover {
            background-color: #f1f3f8;
        }

        /* Links */
        a {
            text-decoration: none;
            color: #f64c72;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Notification Messages */
        .message {
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Calendar Styling */
        .calendar-container {
            width: 48%;
            /* Adjust width of the calendar */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        #calendar {
            max-width: 100%;
            margin: 0 auto;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                gap: 20px;
            }

            .appointments-table,
            .calendar-container {
                width: 100%;
                /* Take full width on smaller screens */
            }

            table {
                font-size: 14px;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="">Create Appointment</a></li>
            </ul>
        </nav>
    </header>

    <h1>Schedules</h1>

    <!-- Display success or error messages -->
    <?php if (isset($success)): ?>
        <div class="message success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="message error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <!-- Container with Appointments Table and Calendar -->
    <div class="container">
        <!-- Appointments Table -->
        <div class="appointments-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Scheduled Date</th>
                        <th>Schedule Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($appointments) && count($appointments) > 0): ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($appointment['name']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['email']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                                <td>
                                    <a href="/appointments/delete/<?php echo $appointment['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No schedule found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Calendar Container -->
        <div class="calendar-container">
            <div id="calendar"></div>
        </div>
    </div>

    <!-- jQuery (Required for FullCalendar) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>

    <script>
        // Example PHP data to JS (Replace with actual data from $appointments)
        const appointments = <?= json_encode($appointments); ?>;

        // Format appointments data to FullCalendar event format
        const events = appointments.map(appointment => ({
            title: `${appointment.name} - ${appointment.appointment_time}`,
            start: `${appointment.appointment_date}T${appointment.appointment_time}`,
            description: `Email: ${appointment.email}`
        }));

        // Initialize FullCalendar
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: events,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                eventClick: function(event) {
                    alert(`Appointment: ${event.title}\nDescription: ${event.description}`);
                }
            });
        });
    </script>

</body>

</html>