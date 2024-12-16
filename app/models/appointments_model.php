<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Appointments_model extends Model
{

    /**
     * Fetch all appointments
     *
     * @return array|false Array of appointments or false on failure
     */
    /**
     * Create a new appointment
     *
     * @param string $name
     * @param string $email
     * @param string $appointment_date
     * @param string $appointment_time
     * @return bool True on success, false on failure
     */
    public function createAppointment($name, $email, $appointment_date, $appointment_time)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'appointment_date' => $appointment_date,
            'appointment_time' => $appointment_time
        ];
        return $this->db->table('appointments')->insert($data); // Insert the new appointment
    }

    /**
     * Delete an appointment by ID
     *
     * @param int $id Appointment ID
     * @return bool True on success, false on failure
     */
    public function deleteAppointment($id)
    {
        if (!is_numeric($id)) {
            return false;
        }
        return $this->db->table('appointments')->where('id', $id)->delete();
    }

    /**
     * Fetch appointments for displaying on the calendar
     *
     * @return array|false Array of appointment dates or false on failure
     */
    public function getAppointmentsForCalendar()
    {
        // Fetching all appointments with only the appointment date
        return $this->db->table('appointments')->select('appointment_date')->get_all();
    }

    /**
     * Fetch all classes
     *
     * @return array|false Array of classes or false on failure
     */
    public function getClasses()
    {
        return $this->db->table('dance_classes')->get_all(); // Fetching all records from 'classes' table
    }

    public function reduceClassSlots($class_id)
    {
        $class = $this->db->table('dance_classes')->where('class_id', $class_id)->get(); 

        if ($class && $class['available_slots'] > 0) {
            $updated = $this->db->table('dance_classes')->where('class_id', $class_id)->update([
                'available_slots' => $class['available_slots'] - 1
            ]);

            $appointment = array(
                'class_id' => $class_id,
                'id'=> $this->session->userdata('id'),
            );
            
            return $this->db->table('appointment')->insert($appointment);
            
        }
        return false;
    }

    public function checkRegistrationStatus($class_id) {
        $id = $this->session->userdata('id');
        $sql = "SELECT * FROM appointment WHERE id = ? AND class_id = ?";
        $query = $this->db->raw($sql, [$id, $class_id]);
        
        if ($query && $query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getAppointments() {
        $query = 'SELECT 
            u.id AS user_id, 
            u.username AS name, 
            u.email,
            dc.class_id, 
            dc.class_name, 
            dc.instructor_name, 
            dc.class_time, 
            dc.available_slots,
            a.id AS appointment_id
        FROM 
            appointment a
        LEFT JOIN 
            users u ON a.id = u.id 
        LEFT JOIN 
            dance_classes dc ON a.class_id = dc.class_id;
        ';

        return $this->db->raw($query);
    }

}