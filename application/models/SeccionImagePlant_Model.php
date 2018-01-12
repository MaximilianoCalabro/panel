<?php 

class SeccionImagePlant_Model extends CI_Model {

    public function get_seccion_imgplant()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
		$query = $this->db->query('SELECT h.nombre, i.titulo_imagen, i.ruta_imagen FROM seccion_imgplant h, imagenes i, rel_plant_imagenes r 
                                    WHERE h.id = r.fk_seccion_imgplant 
                                    and r.fk_imagenes = i.id');

		return $query;
	}
}
