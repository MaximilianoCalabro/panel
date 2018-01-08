<?php 

class SeccionChesse_Model extends CI_Model {

    public function get_seccion_chesse()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
		$query = $this->db->query('SELECT titulo FROM seccion_chesse');
		$query = $this->db->query('SELECT nombre FROM seccion_chesse');
		$query = $this->db->query('SELECT imagen FROM seccion_chesse');

		return $query;
	}
}
