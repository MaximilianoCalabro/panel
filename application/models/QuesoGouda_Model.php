<?php 

class QuesoGouda_Model extends CI_Model {

    public function get_gouda()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM gouda q 
									left join rel_gouda_imagenes r on q.id = r.fk_gouda 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
