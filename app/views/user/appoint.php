<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Bootstrap Card UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Dance</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-2"></i>User</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div id="class-list" class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Classes will be loaded dynamically here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch classes via AJAX when the page loads
            fetchClasses();

            function fetchClasses() {
                fetch('/appointments/get_classes')
                    .then(response => response.json())
                    .then(classes => {
                        // Get the container where classes will be displayed
                        const classList = document.getElementById('class-list');
                        classList.innerHTML = ''; // Clear existing content

                        // Loop through the classes and create cards
                        classes.forEach(cls => {
                            const card = `
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">${cls.class_name}</h5>
                                            <p class="card-text mb-0">${cls.class_time}</p>
                                        </div>
                                        <p class="card-text">Instructor: ${cls.instructor_name}</p>
                                        <p class="card-text">Slots Available: ${cls.available_slots}</p>
                                        <a href="#" class="btn btn-primary">Register</a>
                                    </div>
                                </div>
                            </div>
                        `;
                            classList.innerHTML += card;
                        });
                    })
                    .catch(error => console.error('Error fetching classes:', error));
            }
        });
    </script>
</body>

</html>