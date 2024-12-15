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
        background-color: #fff; /* White background for the sidebar */
        color: #333;
        min-height: 100vh;
        border-right: 1px solid #ddd;
    }

    #sidebar .nav-link {
        color: #333; /* Dark text color */
        font-size: 18px; /* Increase text size */
        display: flex;
        align-items: center;
    }

    #sidebar .nav-link.active {
        color: #1E90FF; /* Blue color for active links */
        font-weight: bold;
    }

    #sidebar .nav-link i {
        margin-right: 10px; /* Add spacing between icon and text */
        font-size: 20px; /* Set icon size */
    }

    #sidebar .nav-item {
        margin: 15px 0;
    }

    /* Logo in the sidebar */
    #sidebar .logo {
        width: 200px; /* Set the width of the logo */
        margin: 20px auto; /* Center the logo */
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
        <?php include APP_DIR.'views/templates/nav.php'; ?>

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
                        <h1 id="classes-header" class="mb-4">Dance Classes</h1>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="classes-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Class Type</th>
                                            <th>Instructor Name</th>
                                            <th>Class Time</th>
                                            <th>Available Slots</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($userdata)): ?>
                                            <?php foreach ($userdata as $usrdt): ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($usrdt['class_id']); ?></td>
                                                    <td><?= htmlspecialchars($usrdt['class_name']); ?></td>
                                                    <td><?= htmlspecialchars($usrdt['instructor_name']); ?></td>
                                                    <td><?= htmlspecialchars($usrdt['class_time']); ?></td>
                                                    <td><?= htmlspecialchars($usrdt['available_slots']); ?></td>
                                                    <td>
                                                        <!-- Update button linking to the class update form -->
                                                        <a href="<?= site_url('classes/update/' . $usrdt['class_id']); ?>" class="btn btn-warning btn-sm">Update</a>

                                                        <!-- Delete button -->
                                                        <a href="<?= site_url('classes/delete/' . $usrdt['class_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this class?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No classes found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <a href="<?= site_url('add-class'); ?>" class="btn btn-primary mt-3">Add Class</a>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#classes-table').DataTable();
        });
    </script>
</body>
</html>
