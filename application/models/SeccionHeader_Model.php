<?php 

class SeccionHeader_Model extends CI_Model {

    public function get_seccion_header()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
		$query = $this->db->query('SELECT h.nombre, i.titulo_imagen, i.ruta_imagen FROM seccion_header h, imagenes i, rel_header_imagenes r 
                                    WHERE r.fk_imagenes = i.id
                                    and h.id = r.fk_seccion_header ');

		return $query;
	}
}
