<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserAppointment extends Controller {
    
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
    }
}
?>