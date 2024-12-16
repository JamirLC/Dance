<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class UserAppointment extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $userRole = $this->session->userdata('role');
        if ($userRole != 'user') {
            redirect('auth');
        }
        if (! logged_in()) {
            redirect('auth');
        }
        $this->call->model('appointments_model');
    }

    public function appoint()
    {
        $this->call->view('user/appoint');
    }

    public function getClasses()
    {
        $classes = $this->appointments_model->getClasses();
        echo json_encode($classes);
    }

    public function registerClass($class_id)
    {
        // Validate class_id
        if (!is_numeric($class_id)) {
            echo json_encode(['success' => false, 'message' => 'Invalid class ID']);
            return;
        }

        if ($this->appointments_model->checkRegistrationStatus($class_id)) {
            echo json_encode(['success' => false, 'message' => 'User already registered for this class.']);
            return;
        }

        $result = $this->appointments_model->reduceClassSlots($class_id);
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Thank you for registering!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Registration failed. No slots available.']);
        }
    }


    public function test(){
        $result = $this->appointments_model->checkRegistrationStatus();
        echo var_dump($result);
    }
}