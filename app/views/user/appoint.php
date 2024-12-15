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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchClasses();

            function fetchClasses() {
                fetch('/appointments/get_classes')
                    .then(response => response.json())
                    .then(classes => {
                        const classList = document.getElementById('class-list');
                        classList.innerHTML = '';

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
                                    <p class="card-text">Slots Available: <span id="slots-${cls.class_id}">${cls.available_slots}</span></p>
                                    <button class="btn btn-primary register-btn" data-class-id="${cls.class_id}">Register</button>
                                </div>
                            </div>
                        </div>`;
                            classList.innerHTML += card;
                        });

                        // Attach event listeners to all register buttons
                        document.querySelectorAll('.register-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                const classId = this.getAttribute('data-class-id');
                                registerClass(classId);
                            });
                        });
                    })
                    .catch(error => console.error('Error fetching classes:', error));
            }

            function registerClass(classId) {
                fetch(`/appointments/register_class/${classId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.text()) // Get raw response
                    .then(text => {
                        try {
                            const data = JSON.parse(text); // Parse JSON if valid
                            if (data.success) {
                                // Update the slots available dynamically
                                const slotsElement = document.getElementById(`slots-${classId}`);
                                const currentSlots = parseInt(slotsElement.textContent, 10);
                                if (!isNaN(currentSlots)) {
                                    slotsElement.textContent = Math.max(currentSlots - 1, 0); // Decrease by 1, minimum 0
                                }

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Registered!',
                                    text: data.message,
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops!',
                                    text: data.message,
                                });
                            }
                        } catch (err) {
                            console.error('Invalid JSON response:', text); // Log invalid response
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again later.',
                            });
                        }
                    })
                    .catch(error => console.error('Error registering class:', error));
            }
        });
    </script>


</body>

</html>