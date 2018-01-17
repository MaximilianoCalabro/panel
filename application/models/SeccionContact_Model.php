<?php 

class SeccionContact_Model extends CI_Model {

    public function get_seccion_contact()
	{
		$query = $this->db->query('SELECT * FROM seccion_contact');

		return $query;
	}
}
