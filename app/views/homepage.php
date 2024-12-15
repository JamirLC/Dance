<?php
include APP_DIR . 'views/templates/header.php';

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
    /* General Styling */
    body {
        font-family: Nunito, sans-serif;
        background-color: #f7f9fc;
        color: #333;
    }

    /* Main app container */
    #app {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Sidebar Styling */
    #sidebar {
        background-color: #fff;
        /* Set sidebar background color to white */
        color: #333;
        min-height: 100vh;
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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #sidebar {
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        main {
            margin-top: 60px;
        }
    }
</style>

<body>
    <div id="app">
        <?php include APP_DIR . 'views/templates/nav.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">
                        <!-- Logo Image -->
                        <div class="text-center">
                            <img src="/public/image/dance.png" alt="Dance Studio Logo" class="logo">
                        </div>

                        <!-- Sidebar Links -->
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
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 pt-3">
                    <div class="container">
                        <h1 id="classes-header" class="mb-4">Class Data Visualization</h1>
                        <div id="chart-container">
                            <canvas id="classesChart"></canvas>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Example PHP data to JS (Replace with actual data from $userdata)
        const classData = <?= json_encode($userdata); ?>;

        // Prepare data for Chart.js
        const labels = [...new Set(classData.map(item => item.instructor_name))]; // Unique Instructor Names
        const datasets = classData.map((item, index) => ({
            label: item.class_name,
            data: labels.map(label => label === item.instructor_name ? item.available_slots : 0),
            backgroundColor: `hsl(${(index * 60) % 360}, 70%, 50%)`, // Unique color for each class
            borderColor: `hsl(${(index * 60) % 360}, 70%, 40%)`,
            borderWidth: 5
        }));

        // Chart configuration
        const config = {
            type: 'bar',
            data: {
                labels: labels, // Instructor names as X-axis labels
                datasets: datasets // Class data as datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Available Slots'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Instructor Names'
                        }
                    }
                },
                elements: {
                    bar: {
                        barPercentage: 0.8, // Adjust bar thickness (default is 0.9)
                        categoryPercentage: 0.9 // Adjust spacing between bars (default is 0.8)
                    }
                }
            }
        };

        // Render the chart
        const ctx = document.getElementById('classesChart').getContext('2d');
        const classesChart = new Chart(ctx, config);
    </script>
</body>

</html>