<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments</title>

  <!-- FullCalendar CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <style>
  /* General Styling */
  body {
    font-family: 'Nunito', sans-serif;
    background-color: #f4f6f9;
    color: #333;
    margin: 0;
    padding: 20px;
    box-sizing: border-box;
  }

  header {
    background-color: #1f1fad;
    color: white;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 15px;
  }

  nav ul li {
    display: inline;
  }

  nav ul li a {
    text-decoration: none;
    color: white;
    font-weight: 500;
  }

  nav ul li a:hover {
    text-decoration: underline;
  }

  h1 {
    color: #f64c72;
    font-weight: 700;
    margin-bottom: 20px;
  }

  /* Flexbox layout for appointments and calendar */
  .container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    height: 75vh;
    flex-wrap: wrap;
  }

  /* Appointments Table */
  .appointments-table {
    flex: 1;
    min-width: 300px;
    max-height: 72vh;
    /* Set max height */
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    overflow-y: auto;
    /* Enable vertical scrolling if content overflows */
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f64c72;
    color: white;
  }

  tbody tr:hover {
    background-color: #f9f9f9;
  }

  .no-data {
    text-align: center;
    font-size: 16px;
    color: #888;
  }

  /* Calendar Styling */
  .calendar-container {
    flex: 1;
    min-width: 300px;
    max-height: 72vh;
    /* Set max height */
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    /* Enable vertical scrolling if content overflows */
  }

  #calendar {
    max-width: 90%;
    margin: 0 auto;
  }

  /* Success/Error Message Styling */
  .message {
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
  }

  .message.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .message.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }

  /* Search and Dropdown Styling */
  .filters {
    margin-bottom: 20px;
  }

  .filters input,
  .filters select {
    padding: 10px;
    margin-right: 10px;
    font-size: 14px;
  }

  /* Responsive Styling */
  @media (max-width: 768px) {
    .container {
      flex-direction: column;
    }
  }
  </style>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="/home">Home</a></li>
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

  <!-- Filters Section -->
  <div class="filters">
    <input type="text" id="searchName" placeholder="Search by Name..." />
    <select id="classFilter">
      <option value="">Filter by Class</option>
      <!-- Populate with class names from $appointments -->
      <?php foreach ($appointments as $a): ?>
      <option value="<?php echo htmlspecialchars($a['class_name']); ?>">
        <?php echo htmlspecialchars($a['class_name']); ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <!-- Container with Appointments Table and Calendar -->
  <div class="container">
    <div class="appointments-table">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Class Name</th>
            <th>Email</th>
            <th>Class Time</th>
          </tr>
        </thead>
        <tbody id="appointmentsTable">
          <?php if (!empty($appointments)): ?>
          <?php foreach ($appointments as $a): ?>
          <tr data-class="<?php echo htmlspecialchars($a['class_name']); ?>">
            <td><?php echo htmlspecialchars($a['name']); ?></td>
            <td><?php echo htmlspecialchars($a['class_name']); ?></td>
            <td><?php echo htmlspecialchars($a['email']); ?></td>
            <td><?php echo htmlspecialchars($a['class_time']); ?></td>
          </tr>
          <?php endforeach; ?>
          <?php else: ?>
          <tr>
            <td colspan="4" class="no-data">No Appointments Found</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="calendar-container">
      <div id="calendar"></div>
    </div>
  </div>

  <!-- jQuery, Moment.js, and FullCalendar JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>

  <script>
  const appointments = <?= json_encode($calendar); ?>;
  const events = appointments.map(appointment => ({
    title: appointment.title,
    start: appointment.start,
    description: appointment.description
  }));

  $(document).ready(function() {
    // Initialize FullCalendar
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

    // Search and Filter Functionality
    $('#searchName').on('input', function() {
      const searchValue = $(this).val().toLowerCase();
      $('#appointmentsTable tr').each(function() {
        const name = $(this).find('td:first').text().toLowerCase();
        $(this).toggle(name.indexOf(searchValue) !== -1);
      });
    });

    $('#classFilter').on('change', function() {
      const selectedClass = $(this).val();
      $('#appointmentsTable tr').each(function() {
        const className = $(this).data('class');
        $(this).toggle(selectedClass === '' || className === selectedClass);
      });
    });
  });
  </script>
</body>

</html>