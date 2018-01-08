<?php 

class SeccionHeader_Model extends CI_Model {

    public function get_admin_user()
	{
		//$this->db->select('*');
		//$this->db->join('admin_users', $this->_table.'.id = demo_blog_posts_tags.tag_id', 'RIGHT');
		//$this->db->where('demo_blog_posts_tags.post_id', $post_id);
		//$query = $this->db->get($this->_table);
        
$query = $this->db->query('SELECT username FROM admin_users');

		return $query;
	}
}
