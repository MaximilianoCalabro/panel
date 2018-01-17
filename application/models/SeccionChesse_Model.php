<?php 

class SeccionChesse_Model extends CI_Model {

    public function get_seccion_chesse()
	{
		$query = $this->db->query('SELECT ch.titulo, i.titulo_imagen, i.ruta_imagen FROM seccion_chesse ch 
									left join rel_chesse_imagenes r on ch.id = r.fk_seccion_chesse 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
