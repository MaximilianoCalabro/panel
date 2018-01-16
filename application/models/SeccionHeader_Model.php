<?php 

class SeccionHeader_Model extends CI_Model {

    public function get_seccion_header()
	{
		$query = $this->db->query('SELECT h.titulo, i.titulo_imagen, i.ruta_imagen FROM seccion_header h, imagenes i, rel_header_imagenes r 
                                    WHERE h.id = r.fk_seccion_header 
                                    and r.fk_imagenes = i.id');
		return $query;
	}
}
