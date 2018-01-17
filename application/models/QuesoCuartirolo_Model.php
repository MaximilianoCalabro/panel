<?php 

class QuesoCuartirolo_Model extends CI_Model {

    public function get_cuartirolo()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM cuartirolo q 
									left join rel_cuartirolo_imagenes r on q.id = r.fk_cuartirolo 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
