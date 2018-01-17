<?php 

class QuesoSardo_Model extends CI_Model {

    public function get_sardo()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM sardo q 
									left join rel_sardo_imagenes r on q.id = r.fk_sardo 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
