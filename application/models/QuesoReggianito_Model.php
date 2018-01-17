<?php 

class QuesoReggianito_Model extends CI_Model {

    public function get_reggianito()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM reggianito q 
									left join rel_reggianito_imagenes r on q.id = r.fk_reggianito 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
