<?php 

class QuesoPortSalut_Model extends CI_Model {

    public function get_port_salut()
	{
		$query = $this->db->query('SELECT q.titulo, q.texto, i.titulo_imagen, i.ruta_imagen FROM port_salut q 
									left join rel_port_salut_imagenes r on q.id = r.fk_port_salud
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
