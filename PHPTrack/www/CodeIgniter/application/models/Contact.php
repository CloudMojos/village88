<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Model {
    function add_contact($contact) {
        $query = "INSERT INTO contacts (name, contact_number) VALUES (?,?)";
        $values = array($contact['name'], $contact['contact_number']); 
        return $this->db->query($query, $values);
    }

    function get_all_contacts() {
        return $this->db->query("SELECT * FROM contacts")->result_array();
    }

    function get_contact_by_id($id) {
        return $this->db->query("SELECT * FROM contacts WHERE contact_id = ?", array($id))->row_array();
    }

    function delete_contact($id) {
        $query = "DELETE FROM contacts WHERE contact_id = ?;";
        return $this->db->query($query, $id);
    }

    function edit_contact_by_id($id, $new_contact) {
        $query = "UPDATE contacts SET name = ?, contact_number = ? WHERE contact_id = ?";
        $values = array($new_contact['name'], $new_contact['contact_number'], $id);
        return $this->db->query($query, $values);
    }
}
?>