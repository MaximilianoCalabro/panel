<?php 

class SeccionChesse_Model extends CI_Model {

    public function get_seccion_chesse()
	{
		$query = $this->db->query('SELECT ch.id as idche, ch.titulo, s.*, i.ruta_imagen, i.titulo_imagen FROM seccion_chesse ch 
									left join rel_chesse_quesos r on ch.id = r.fk_seccion_chesse 
									left join subquesos s on r.fk_subquesos = s.id
									left join imagenes i on s.fk_imagenes = i.id');

		return $query;
	}

	public function get_subquesos()
	{
		$query = $this->db->query('SELECT s.id as idqueso,  i.titulo_imagen, i.ruta_imagen  FROM subquesos s 
									left join rel_quesos_imagenes r on s.id = r.fk_subquesos 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}

