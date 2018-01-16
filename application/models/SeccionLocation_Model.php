<?php 

class SeccionLocation_Model extends CI_Model {

    public function get_seccion_location()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
		$query = $this->db->query('SELECT l.titulo, l.texto, i.titulo_imagen, i.ruta_imagen FROM seccion_location l 
									left join rel_location_imagenes r on l.id = r.fk_seccion_location 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
