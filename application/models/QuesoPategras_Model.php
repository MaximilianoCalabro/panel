<?php 

class QuesoPategras_Model extends CI_Model {

    public function get_pategras()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM pategras q 
									left join rel_pategras_imagenes r on q.id = r.fk_pategras
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
