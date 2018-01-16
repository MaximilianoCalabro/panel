<?php 

class SeccionPlant_Model extends CI_Model {

    public function get_seccion_plant()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
		$query = $this->db->query('SELECT p.titulo, p.texto, i.titulo_imagen, i.ruta_imagen FROM seccion_plant p 
									left join rel_plant_imagenes r on p.id = r.fk_seccion_plant 
									left join imagenes i on r.fk_imagenes = i.id');

		return $query;
	}
}
