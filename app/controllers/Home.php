<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Home extends Controller {

    public function __construct() {
        parent::__construct();
        $userRole = $this->session->userdata('role');
        if ($userRole != 'admin') {
            redirect('auth');
        }
        if (! logged_in()) {
            redirect('auth');
        }
        // Load required models
        $this->call->model('dashboard_model');
        $this->call->model('classes_model');
        $this->call->model('appointments_model');  // Load the appointments model
    }

    // =========================
    // DANCE CLASS FEATURES
    // =========================

    public function index() {
        $data['userdata'] = $this->dashboard_model->read();
        $this->call->view('homepage', $data);
    }


    public function aboutus() {
        $this->call->view('aboutus',);
    }

    public function classes() {
        $data["userdata"] = $this->classes_model->getClasses();
        $this->call->view('classes', $data);
    }

    public function class_form() {
        $this->call->view('addclasses');
    }

    public function create_class() {
        $class_name = $this->io->post('class_name');
        $instructor_name = $this->io->post('instructor_name');
        $class_time = $this->io->post('class_time');
        $available_slots = $this->io->post('available_slots');
        
        if ($class_name && $instructor_name && $class_time && $available_slots) {
            if ($this->classes_model->create($class_name, $instructor_name, $class_time, $available_slots)) {
                redirect('/classes', ['success' => 'Class added successfully!']);
            } else {
                redirect('/add-class', ['error' => 'Failed to add class. Please try again.']);
            }
        } else {
            redirect('/add-class', ['error' => 'All fields are required!']);
        }
    }


    function getClass($id){
        $class['class']= $this->classes_model->get_class_by_id($id);
        if (!$class) {
            redirect('/classes', ['error' => 'Class not found.']);
        }
        $this->call->view('templates/updateclass', $class);
    }

    public function update_class($id) {
        if ($this->io->post()) {
            $class_name = $this->io->post('class_name');
            $instructor_name = $this->io->post('instructor_name');
            $class_time = $this->io->post('class_time');
            $available_slots = $this->io->post('available_slots');
    
            if ($this->classes_model->update_dance_classes([
                'class_id' => $id,
                'class_name' => $class_name,
                'instructor_name' => $instructor_name,
                'class_time' => $class_time,
                'available_slots' => $available_slots
            ], $id)) {
                redirect('/classes', ['success' => 'Class updated successfully!']);
            } else {
                redirect('/classes', ['error' => 'Failed to update class.']);
            }
        }
        redirect('/classes');
    }

    
    public function delete_class($id) {
        if ($this->classes_model->delete($id)) {
            redirect('/classes', ['success' => 'Class deleted successfully!']);
        } else {
            redirect('/classes', ['error' => 'Failed to delete class. Please try again.']);
        }
    }

   
    
}
?>