<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    
    public function __construct()
    {
        parent::__construct();
    }

    function getUser($id) {
        return $this->db->table('users')->where('id', $id)->get();
    }

}
?>