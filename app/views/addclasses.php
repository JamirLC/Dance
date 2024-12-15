<?php
include APP_DIR . 'views/templates/header.php';

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    /* General styling */
    body {
        font-family: Nunito, sans-serif;
        background-color: #f7f9fc;
        color: #333;
    }

    #app {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    /* Sidebar styling */
    #sidebar {
        background-color: #242582;
        color: #fff;
        min-height: 100vh;
    }

    #sidebar .nav-link {
        color: #bfc5d8;
        font-weight: 500;
    }

    #sidebar .nav-link.active {
        color: #fff;
        background-color: #553d67;
    }

    #sidebar .nav-link:hover {
        color: #f64c72;
    }

    #sidebar .nav-item {
        margin: 15px 0;
    }

    /* Header styling */
    .card-header {
        background-color: #f64c72;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Main content styling */
    main {
        background-color: #f9fafb;
    }

    .container {
        padding-top: 20px;
    }

    h1#users-header {
        color: #242582;
        font-weight: 600;
    }

    /* Classes page styling */
    .card-body {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        <?php
        include APP_DIR . 'views/templates/nav.php';
        ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <!-- Dashboard Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="/home">
                                    Dashboard
                                </a>
                            </li>
                            <!-- Classes Link -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'classes.php') ? 'active' : ''; ?>" href="/classes">
                                    Classes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php echo ($current_page == 'aboutus.php') ? 'active' : ''; ?>" href="/about-us">
                                    About Us
                                </a>
                            </li>
                            <!-- Logout Link -->
                            <!-- Add your logout link here if needed -->
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 pt-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="container mt-4">

                                    <h1>Add New Class</h1>

                                    <form action="<?= site_url('/classes/post'); ?>" method="POST" class="form-group" id="add-class-form">
                                        <div class="mb-3">
                                            <label for="class_name">Class Type</label>
                                            <select id="class_name" name="class_name" class="form-control" required>
                                                <option value="">Select Class Type</option>
                                                <option value="Ballet">Ballet</option>
                                                <option value="Hip Hop">Hip Hop</option>
                                                <option value="Jazz">Jazz</option>
                                                <option value="Contemporary">Contemporary</option>
                                                <option value="Tap Dance">Tap Dance</option>
                                                <option value="Salsa">Salsa</option>
                                                <option value="Ballroom">Ballroom</option>
                                                <option value="Modern">Modern</option>
                                                <option value="Breakdance">Breakdance</option>
                                                <!-- Add more dance types as needed -->
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="instructor_name">Instructor Name</label>
                                            <input type="text" id="instructor_name" name="instructor_name" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="class_time">Class Time</label>
                                            <input type="datetime-local" id="class_time" name="class_time" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="available_slots">Available Slots</label>
                                            <input type="number" id="available_slots" name="available_slots" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Class</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>