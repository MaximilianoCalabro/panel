<?php 

class SeccionImageLocation_Model extends CI_Model {

    public function get_seccion_imgloc()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
		$query = $this->db->query('SELECT h.nombre, i.titulo_imagen, i.ruta_imagen FROM seccion_imgloc h, imagenes i, rel_location_imagenes r 
                                    WHERE h.id = r.fk_seccion_imgloc 
                                    and r.fk_imagenes = i.id');

		return $query;
	}
}
