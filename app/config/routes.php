<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

# Default route
$router->get('/', 'Auth'); // Default to Auth controller for the root route

# Home and navigation routes
$router->get('/home', 'Home');  // Home route
$router->get('/sessions', 'Home::Sessions');  // Sessions route
$router->get('/classes', 'Home::Classes');  // Classes route
$router->get('/about-us', 'Home::Aboutus');  // About Us route

# Dance class CRUD routes
$router->get('/add-class', 'Home::Class_form');  // Add class form route
$router->match('/classes/post', 'Home::Create_class', 'GET|POST');  // Create class (POST method)
$router->get('/classes/delete/{id}', 'Home::delete_class');  // Delete class by ID
$router->match('/classes/update/{id}', 'Home::update_class', 'GET|POST');  // Update class (GET and POST methods)

# Appointment routes
$router->get('/appointments', 'Appointments_controller::index');  // View all appointments
$router->get('/appointments/create', 'Appointments_controller::create');  // Create new appointment form
$router->match('/appointments/store', 'Appointments_controller::store', 'GET|POST');  // Store a new appointment (GET/POST)
$router->get('/appointments/delete/{id}', 'Appointments_controller::delete');  // Delete an appointment by ID
$router->get('/appointments/view/{id}', 'Appointments_controller::view_appointment');  // View specific appointment
$router->match('/appointments/edit/{id}', 'Appointments_controller::edit_appointment', 'GET|POST');  // Edit appointment (GET/POST)

# Calendar routes
$router->get('/calendar', 'Calendar_controller::index');  // Calendar view with appointments marked




# Auth routes (Group)
$router->group('/auth', function() use ($router) {
    $router->match('/register', 'Auth::register', ['POST', 'GET']);  // Register route
    $router->match('/login', 'Auth::login', ['POST', 'GET']);  // Login route
    $router->get('/logout', 'Auth::logout');  // Logout route
    $router->match('/password-reset', 'Auth::password_reset', ['POST', 'GET']);  // Password reset route
    $router->match('/set-new-password', 'Auth::set_new_password', ['POST', 'GET']);  // Set new password route
});
?>
