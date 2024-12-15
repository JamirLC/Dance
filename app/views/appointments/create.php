<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #242582;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form Container */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box; /* Ensure padding doesn't cause overflow */
        }

        .form-container h2 {
            text-align: center;
            color: #f64c72;
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #242582;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="date"],
        .form-container input[type="time"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box; /* Prevent padding overflow */
        }

        .form-container input[type="submit"] {
            width: auto; /* Allow the button width to be determined by content */
            padding: 12px 20px;
            background-color: #242582;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 15px; /* Add space between button and next element */
            display: inline-block;
        }

        .form-container input[type="submit"]:hover {
            background-color: #f64c72;
        }

        /* Notification Messages */
        .message {
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Back Button Styling */
        .back-button {
            display: inline-block; /* Allow button width to be based on content */
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #242582;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #f64c72;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                padding: 15px;
            }

            .form-container input[type="submit"] {
                font-size: 14px;
            }

            .form-container input[type="submit"],
            .back-button {
                width: 100%; /* Allow buttons to stretch on small screens */
            }
        }
    </style>
</head>
<body>

    <h1>Create a New Schedule</h1>

    <!-- Display success or error messages -->
    <?php if (isset($success)): ?>
        <div class="message success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <div class="message error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <div class="form-container">
        <form action="/appointments/store" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter your name">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">

            <label for="appointment_date">Scheduled Date</label>
            <input type="date" id="appointment_date" name="appointment_date" required>

            <label for="appointment_time">Scheduled Time</label>
            <input type="time" id="appointment_time" name="appointment_time" required>

            <input type="submit" value="Create Appointment">

            <!-- Back to Home Button inside the form container -->
            <a href="<?= site_url('/home'); ?>" class="back-button">Back to Home</a>
        </form>
    </div>

</body>
</html>
