<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Classes_model extends Model {

    // =========================
    // DANCE CLASS MANAGEMENT
    // =========================

    /**
     * Fetch all dance classes
     *
     * @return array|false Array of classes or false on failure
     */
    public function read() {
        return $this->db->table('dance_classes')->get_all();
    }

    /**
     * Create a new dance class
     *
     * @param string $class_name
     * @param string $instructor_name
     * @param string $class_time
     * @param int $available_slots
     * @return bool True on success, false on failure
     */
    public function create($class_name, $instructor_name, $class_time, $available_slots) {
        $data = [
            'class_name' => $class_name,
            'instructor_name' => $instructor_name,
            'class_time' => $class_time,
            'available_slots' => $available_slots
        ];
        return $this->db->table('dance_classes')->insert($data);
    }

    /**
     * Get all dance classes
     *
     * @return array|false Array of classes or false on failure
     */
    public function getClasses() {
        return $this->read();
    }

    /**
     * Delete a dance class by ID
     *
     * @param int $id ID of the class to delete
     * @return bool True on success, false on failure
     */
    public function delete($id) {
        if (!is_numeric($id)) {
            return false;
        }
        return $this->db->table('dance_classes')->where('class_id', $id)->delete();
    }

    /**
     * Fetch a specific dance class by ID
     *
     * @param int $id Class ID
     * @return array|false Class data or false if not found
     */
    public function get_class_by_id($id) {
        $result = $this->db->table('dance_classes')->where('class_id', $id)->get();
        return $result ? $result : false; // Ensure we return false if class not found
    }

    /**
     * Update dance class information
     *
     * @param array $data Updated class data
     * @param int $id Class ID to update
     * @return bool True on success, false on failure
     */
    public function update_dance_classes($data, $id) {
        $bind = array(
            'class_id' => $data['class_id'],
            'class_name' => $data['class_name'],
            'instructor_name' => $data['instructor_name'],
            'class_time' => $data['class_time'],
            'available_slots' => $data['available_slots']
        );
        return $this->db->table('dance_classes')->where('class_id', $id)->update($bind);
    }

   
}
?>