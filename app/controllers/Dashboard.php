<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Dashboard extends Controller {

    public function __construct(){
        parent:: __construct();
        $this->call->model('dashboard_model');
    }

    public function read(){
        $data['userdata'] = $this->dashboard_model->read();
        $this->call->view('/home', $data);

    }

    
    

	
}
?>
