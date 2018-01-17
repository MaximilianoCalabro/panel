<?php 

class SeccionWho_Model extends CI_Model {

    public function get_seccion_who()
	{
		$query = $this->db->query('SELECT * FROM seccion_who');

		return $query;
	}
}
