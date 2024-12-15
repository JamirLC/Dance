<?php
include APP_DIR . 'views/templates/header.php';

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet" />

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* General Styling */
        body {
            font-family: Nunito, sans-serif;
            background-color: #f7f9fc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Main app container */
        #app {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        /* Sidebar Styling */
        #sidebar {
            background-color: #fff;
            /* Set sidebar background color to white */
            color: #333;
            min-height: 100vh;
        }

        #sidebar .logo {
            text-align: center;
            margin-bottom: 50px;
        }

        #sidebar .logo img {
            max-width: 200px;
        }

        #sidebar .nav-link {
            color: #333;
            /* Dark text color */
            font-size: 18px;
            /* Increase text size */
            display: flex;
            align-items: center;
        }

        #sidebar .nav-link.active {
            color: #1E90FF;
            /* Active link blue */
            font-weight: bold;
            /* Make active link bold */
        }

        #sidebar .nav-link .icon {
            margin-right: 10px;
            /* Add spacing between icon and text */
            font-size: 20px;
            /* Set icon size */
        }

        #sidebar .nav-item {
            margin: 15px 0;
        }

        /* Logo in the sidebar */
        #sidebar .logo {
            width: 200px;
            /* Set the width of the logo */
            margin: 20px auto;
            /* Center the logo */
            display: block;
        }


        #sidebar ul li a:hover,
        #sidebar ul li a.active {
            background-color: #242582;
            /* Background on hover and active */
            color: #fff;
            /* White text on hover and active */
        }

        /* Main Content Styling */
        main {
            flex-grow: 1;
            padding: 20px;
            background-color: #f9fafb;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container Styling */
        .container {
            width: 80%;
            /* Make the container take 80% of the width */
            max-width: 1200px;
            /* Ensure it doesn't grow too large */
            padding-top: 20px;
            margin: 0 auto;
            /* Center the container horizontally */
            margin-left: 30px;
        }

        h1#users-header {
            color: #242582;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Card Styling */
        .card-header {
            background-color: #f64c72;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            background-color: #fff;
            padding: 20px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Flexbox for 10 boxes per line */
        .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Increase space between boxes */
        }

        .box {
            flex: 0 0 18%;
            /* Each box takes up 18% of the width to fit 5 per row */
            box-sizing: border-box;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .box img {
            width: 100%;
            height: auto;
            max-height: 250px;
            /* Set max height for images */
            object-fit: cover;
            /* Ensure images are cropped to fit */
            border-radius: 5px;
        }

        .view-button {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #242582;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .view-button:hover {
            background-color: #1E90FF;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 25px;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include APP_DIR . 'views/templates/nav.php'; ?>
    <div id="app">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="logo">
                <img src="/public/image/dance.png" alt="Dance Studio Logo">
            </div>
            <ul>
                <!-- Dashboard Link -->
                <li>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="/home">
                                <span class="icon">&#127968;</span> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'classes.php') ? 'active' : ''; ?>" href="/classes">
                                <span class="icon">&#128218;</span> Classes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'appointments.php') ? 'active' : ''; ?>" href="/appointments">
                                <span class="icon">&#128197;</span> Scheduling
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($current_page == 'aboutus.php') ? 'active' : ''; ?>" href="/about-us">
                                <span class="icon">&#8505;</span> About Us
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">About Us</div>
                            <div class="card-body">
                                <h2>Welcome to our Dance Studio!</h2>
                                <p>Welcome to our Dance Studio, where passion meets movement! Our studio offers a welcoming environment for dancers of all levels...</p>

                                <!-- Box Container with 5 Boxes per Row -->
                                <div class="box-container">
                                    <!-- Boxes for each image and dance type -->
                                    <div class="box">
                                        <img src="/public/image/BALLET.jpg" alt="Ballet">
                                        <button class="view-button" onclick="showModal(1)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/BALLROOM.jpg" alt="Ballroom">
                                        <button class="view-button" onclick="showModal(2)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/BREAKDANCE.jpg" alt="Breakdance">
                                        <button class="view-button" onclick="showModal(3)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/CONTEMPORARY.jpg" alt="Contemporary">
                                        <button class="view-button" onclick="showModal(4)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/FOLKDANCE.jpg" alt="Folk Dance">
                                        <button class="view-button" onclick="showModal(5)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/HIPHOP.jpg" alt="Hip Hop">
                                        <button class="view-button" onclick="showModal(6)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/JAZZ.jpg" alt="Jazz">
                                        <button class="view-button" onclick="showModal(7)">View</button>
                                    </div>
                                    <div class="box">
                                        <img src="/public/image/SALSA.jpg" alt="Salsa">
                                        <button class="view-button" onclick="showModal(8)">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal for Displaying Information -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle">Dance Information</h2>
            <p id="modalBody">Details about the dance...</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script>
        // Open the modal when "View" button is clicked
        function showModal(boxNumber) {
            const danceInfo = [
                'Salsa: A lively dance with Latin rhythms.',
                'Ballet: A classical dance form known for its graceful movements.',
                'Hip Hop: A street dance that emerged from hip hop culture.',
                'Contemporary: A modern dance style combining elements of several genres.',
                'Folk Dance: Traditional dance forms from different cultures.',
                'Jazz: A high-energy dance style characterized by quick movements.',
                // Add more information here for other dances
            ];

            document.getElementById('modalTitle').innerText = 'Dance Information ' + boxNumber;
            document.getElementById('modalBody').innerText = danceInfo[boxNumber % danceInfo.length];

            document.getElementById('myModal').style.display = 'block';
        }

        document.querySelector('.close').onclick = function() {
            document.getElementById('myModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                document.getElementById('myModal').style.display = 'none';
            }
        }
    </script>
</body>

</html>