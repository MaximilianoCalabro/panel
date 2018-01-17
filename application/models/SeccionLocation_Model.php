<?php 

class SeccionLocation_Model extends CI_Model {

    public function get_seccion_location()
	{
		$query = $this->db->query('SELECT l.titulo, l.texto, i.titulo_imagen, i.ruta_imagen FROM seccion_location l 
									left join rel_location_imagenes r on l.id = r.fk_seccion_location 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
