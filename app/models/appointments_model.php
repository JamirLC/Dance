<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Appointments_model extends Model
{

    /**
     * Fetch all appointments
     *
     * @return array|false Array of appointments or false on failure
     */
    public function getAppointments()
    {
        return $this->db->table('appointments')->get_all(); // Fetching all records from 'appointments' table
    }

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
}
