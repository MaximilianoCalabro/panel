<?php 

class QuesoTybo_Model extends CI_Model {

    public function get_tybo()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM tybo q 
									left join rel_tybo_imagenes r on q.id = r.fk_tybo 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
