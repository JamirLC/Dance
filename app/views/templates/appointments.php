<?php
include APP_DIR.'views/templates/header.php';

// Get the current page name to highlight the active link
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    /* General Styling */
    body {
        font-family: 'Arial', sans-serif;
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

    /* Card Header Styling */
    .card-header {
        background-color: #f64c72;
        color: #fff;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Main Content Styling */
    main {
        background-color: #f9fafb;
    }

    .container {
        padding-top: 20px;
    }

    h1#appointments-header {
        color: #242582;
        font-weight: 600;
    }

    /* Card Body Styling */
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
        <?php include APP_DIR.'views/templates/nav.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link <?= ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="/home">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($current_page == 'classes.php') ? 'active' : ''; ?>" href="/classes">
                                    Classes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($current_page == 'appointments.php') ? 'active' : ''; ?>" href="/appointments">
                                    Schedules
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($current_page == 'session.php') ? 'active' : ''; ?>" href="/sessions">
                                    Sessions
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($current_page == 'aboutus.php') ? 'active' : ''; ?>" href="/about-us">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3 pt-3">
                    <div class="container">
                        <h1 id="appointments-header" class="mb-4">Schedules</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="appointments-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($appointments)): ?>
                                            <?php foreach ($appointments as $appointment): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($appointment['name']); ?></td>
                                                    <td><?= htmlspecialchars($appointment['email']); ?></td>
                                                    <td><?= htmlspecialchars($appointment['appointment_date']); ?></td>
                                                    <td><?= htmlspecialchars($appointment['appointment_time']); ?></td>
                                                    <td>
                                                        <a href="<?= site_url('appointments/delete/' . $appointment['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No appointments found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <a href="<?= site_url('appointments/create'); ?>" class="btn btn-primary mt-3">Create Schedule</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#appointments-table').DataTable();
        });
    </script>
</body>
</html>
