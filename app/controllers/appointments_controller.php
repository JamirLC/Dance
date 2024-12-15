<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Appointments_controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('appointments_model'); // Load the Appointments model
    }

    // Display all appointments
    public function index() {
        // Fetch all appointments from the model
        $data['appointments'] = $this->appointments_model->getAppointments();
        
        // Pass data to the view
        $this->call->view('appointments/index', $data); 
    }

    // Show appointment creation form
    public function create() {
        // Render the view for creating a new appointment
        $this->call->view('appointments/create');
    }

    // Create a new appointment
    public function store() {
        // Get POST data from the form submission
        $name = $this->io->post('name');
        $email = $this->io->post('email');
        $appointment_date = $this->io->post('appointment_date');
        $appointment_time = $this->io->post('appointment_time');

        // Validate if all fields are provided
        if (empty($name) || empty($email) || empty($appointment_date) || empty($appointment_time)) {
            // Redirect back to create form with error message if validation fails
            redirect('/appointments/create', ['error' => 'All fields are required!']);
        }

        // Attempt to create the appointment via the model
        $appointment_created = $this->appointments_model->createAppointment($name, $email, $appointment_date, $appointment_time);

        // Check if the appointment was successfully created
        if ($appointment_created) {
            // Redirect to appointments list with success message
            redirect('/appointments', ['success' => 'Appointment created successfully!']);
        } else {
            // Redirect back to create form with error message if creation fails
            redirect('/appointments/create', ['error' => 'Failed to create appointment.']);
        }
    }

    // Delete an appointment
    public function delete($id) {
        // Check if the appointment ID is numeric before proceeding
        if (is_numeric($id)) {
            // Call the model to delete the appointment
            $appointment_deleted = $this->appointments_model->deleteAppointment($id);

            if ($appointment_deleted) {
                // Redirect to appointments list with success message
                redirect('/appointments', ['success' => 'Appointment deleted successfully!']);
            } else {
                // Redirect to appointments list with error message if deletion fails
                redirect('/appointments', ['error' => 'Failed to delete appointment.']);
            }
        } else {
            // If ID is invalid, redirect with error message
            redirect('/appointments', ['error' => 'Invalid appointment ID.']);
        }
    }

    // Dashboard with the calendar displaying all appointments
    public function dashboard() {
        // Fetch all appointments for the calendar
        $appointments = $this->appointments_model->getAppointmentsForCalendar();

        // Organize the appointments by date for easier calendar display
        $data['appointments'] = [];
        foreach ($appointments as $appointment) {
            $data['appointments'][] = $appointment->appointment_date; // Store only the dates
        }

        // Pass the data to the view for the calendar
        $this->call->view('dashboard/index', $data);
    }
}
?>