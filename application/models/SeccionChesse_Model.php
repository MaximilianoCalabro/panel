<?php 

class SeccionChesse_Model extends CI_Model {

    public function get_seccion_chesse()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);

		$query = $this->db->query('SELECT ch.titulo, i.titulo_imagen, i.ruta_imagen FROM seccion_chesse ch 
									left join rel_chesse_imagenes r on ch.id = r.fk_seccion_chesse 
									left join imagenes i on r.fk_imagenes = i.id');


		return $query;
	}
}
