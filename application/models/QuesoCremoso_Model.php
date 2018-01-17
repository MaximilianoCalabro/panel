<?php 

class QuesoCremoso_Model extends CI_Model {

    public function get_cremoso()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM cremoso q 
									left join rel_cremoso_imagenes r on q.id = r.fk_cremoso 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
