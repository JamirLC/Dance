<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Bootstrap Card UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Nunito, sans-serif;
            background-color: #f7f9fc;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include APP_DIR . 'views/templates/nav.php'; ?>

    <div class="container mt-4">
        <div class="mb-3">
            <label for="classFilter" class="form-label">Filter by Class Name</label>
            <select id="classFilter" class="form-select">
                <option value="all">All Classes</option>
            </select>
        </div>
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
                        const classFilter = document.getElementById('classFilter');

                        classList.innerHTML = '';
                        const classNames = new Set(); // To store unique class names

                        classes.forEach(cls => {
                            classNames.add(cls.class_name);
                            const card = `
                        <div class="col class-card" data-class-name="${cls.class_name}">
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

                        // Populate the dropdown filter with class names
                        classFilter.innerHTML = '<option value="all">All Classes</option>'; // Reset dropdown
                        classNames.forEach(className => {
                            const option = `<option value="${className}">${className}</option>`;
                            classFilter.innerHTML += option;
                        });

                        // Attach event listeners to all register buttons
                        document.querySelectorAll('.register-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                const classId = this.getAttribute('data-class-id');
                                registerClass(classId);
                            });
                        });

                        // Add event listener for filtering classes
                        classFilter.addEventListener('change', function() {
                            filterClasses(this.value);
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
                    .then(response => response.text())
                    .then(text => {
                        try {
                            const data = JSON.parse(text);
                            if (data.success) {
                                const slotsElement = document.getElementById(`slots-${classId}`);
                                const currentSlots = parseInt(slotsElement.textContent, 10);
                                if (!isNaN(currentSlots)) {
                                    slotsElement.textContent = Math.max(currentSlots - 1, 0);
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
                            console.error('Invalid JSON response:', text);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred. Please try again later.',
                            });
                        }
                    })
                    .catch(error => console.error('Error registering class:', error));
            }

            function filterClasses(filterValue) {
                const classCards = document.querySelectorAll('.class-card');
                classCards.forEach(card => {
                    if (filterValue === 'all' || card.getAttribute('data-class-name') === filterValue) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>

</html>