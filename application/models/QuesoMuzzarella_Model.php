<?php 

class QuesoMuzzarella_Model extends CI_Model {

    public function get_muzzarella()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM muzzarella q 
									left join rel_muzzarella_imagenes r on q.id = r.fk_muzzarella 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
