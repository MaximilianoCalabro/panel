<?php 

class Post_model extends MY_Model {
    
    public function top_post($category_id=NULL,$no=NULL,$str=null)
    {
        if(!empty($category_id)&&!empty($no) && empty($str))
        {
         $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->where('demo_blog_posts.category_id',$category_id)->limit($no)
         ->order_by('demo_blog_posts.id','desc');
        }
        else if(!empty($category_id)&&!empty($no)&&!empty($str))
        {
         $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->where('demo_blog_posts.category_id',$category_id)->limit($no,$str)
         ->order_by('demo_blog_posts.id','desc');
        }
        else if(!empty($category_id))
        {
            $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->where('demo_blog_posts.category_id',$category_id)
         ->order_by('demo_blog_posts.id','desc');
        }
        else
        {
         $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->order_by('demo_blog_posts.id','desc');
        }
        
        $result = $this->db->get();
        return $result->result();
    }
    
    public function post_view($post_url)
    {
        $this->db->select('demo_blog_posts.vcount,demo_blog_posts.id,demo_blog_posts.url,demo_blog_posts.vcount,demo_blog_posts.url,demo_blog_posts.content,admin_users.first_name as author,admin_users.about as about,admin_users.userfile as author_img,demo_blog_posts.title,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->join('admin_users', 'admin_users.id = demo_blog_posts.author_id')
         ->where('demo_blog_posts.url',$post_url);
        
        $result = $this->db->get();
        return $result->result();
    }

    public function mostp_post($no)
    {
         $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->limit($no)
         ->order_by('demo_blog_posts.vcount','desc');
         $result = $this->db->get();
        return $result->result();
       
    }
    
    public function recent_post($no)
    {
         $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->limit($no)
         ->order_by('demo_blog_posts.id','desc');
         $result = $this->db->get();
        return $result->result();
       
    }
    
    public function Tags($no)
    {
        $this->db->select('*')
            ->from('demo_blog_tags')
            ->limit($no)->order_by('demo_blog_tags.id','desc');
        
        $result = $this->db->get();
        return $result->result();
    }
    
    public function mtags()
    {
        $tags = '';
        $this->db->select('*')
            ->from('demo_blog_tags')
            ->order_by('demo_blog_tags.id','desc');
        
        $result = $this->db->get();
        foreach($result->result() as $mtag)
        {
            $tags .= ', '.$mtag->title;
        }
        return ltrim($tags, ', ');
    }
    
    public function get_category($title)
    {
        $this->db->select('*')
            ->from('demo_blog_categories')->where('title',$title);
        
        $result = $this->db->get();
        return $result->result();
    }
    
    public function post_by_catID($id,$limit,$start)
    {
         $this->db->select('demo_blog_posts.vcount,demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->where('demo_blog_categories.id',$id)
         ->limit($limit,$start)
         ->order_by('demo_blog_posts.id','desc');
         $result = $this->db->get();
        return $result->result();
    }
    
    public function count_post_by_catID($id)
    {
         $this->db->select('demo_blog_posts.content_brief,demo_blog_posts.title,demo_blog_posts.url,demo_blog_posts.publish_time,demo_blog_posts.image_url,demo_blog_categories.title as cat_title')
         ->from('demo_blog_posts')
         ->join('demo_blog_categories', 'demo_blog_categories.id = demo_blog_posts.category_id')
         ->where('demo_blog_categories.id',$id)
         ->order_by('demo_blog_posts.id','desc');
         $result = $this->db->get();
        return $result->num_rows();
    }
}