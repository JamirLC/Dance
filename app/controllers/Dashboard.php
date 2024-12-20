<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $userRole = $this->session->userdata('role');
        if ($userRole != 'admin') {
            redirect('auth');
        }
        if (! logged_in()) {
            redirect('auth');
        }
        $this->call->model('dashboard_model');
    }

    public function read()
    {
        $data['userdata'] = $this->dashboard_model->read();
        $this->call->view('/home', $data);
    }
}
