<?php 

class SeccionPlant_Model extends CI_Model {

    public function get_seccion_plant()
	{
		$query = $this->db->query('SELECT p.titulo, p.texto, i.titulo_imagen, i.ruta_imagen FROM seccion_plant p 
									left join rel_plant_imagenes r on p.id = r.fk_seccion_plant 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
