<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Dashboard_model extends Model {

    public function read(){
        return $this->db->table('dance_classes')->get_all();
    }

	
}
?>
