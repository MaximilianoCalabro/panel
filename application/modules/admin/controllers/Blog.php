<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
                
                
	}
        // Course Crud
	public function category()
        {
           
            $crud = $this->generate_crud('demo_blog_categories');
            $crud->columns('id','title');
            $this->mTitle = 'Category';
            $this->render_crud();
            
             
        }
        // Course Crud
	public function tag()
        {
           
            $crud = $this->generate_crud('demo_blog_tags');
            $crud->columns('id','title');
            $this->mTitle = 'Tags';
            $this->render_crud();
            
             
        }
        // Course Crud
	public function blog()
        {
           
            $crud = $this->generate_crud('demo_blog_posts');
            
            $crud->columns('id','title','tags','image_url','vcount');
            //$crud->display_as('admin_id','Admin','Last Update');
            //$crud->fields('course','admin_id','last_update');
            $crud->set_relation('category_id', 'demo_blog_categories', 'title');
            $crud->set_relation('author_id', 'admin_users', 'username');
            $crud->set_field_upload('image_url','assets/uploads/demo/blog_posts');
            $crud->set_relation_n_n('tags', 'demo_blog_posts_tags', 'demo_blog_tags', 'post_id', 'tag_id', 'title');
		
            //$crud->set_rules('course','Course Name','required');
            //$crud->set_rules('last_update','Last Update','required');
            //$crud->set_rules('admin_id','Admin ID','required');
            
            
            $this->mTitle = 'Blog Post';
            $this->render_crud();
            
             
        }
        function course_callback($post_array)
        {
            $post_array['course']=$post_array['course'];
            $post_array['admin_id'] = $post_array['admin_id'];
            $post_array['last_update'] = $post_array['last_update'];
            return $post_array;
        }
        
        
        // Subjects crud
        public function subject()
        {
            $crud = $this->generate_crud('subjects');
            if($this->session->userdata('user_id')==1)
            {
                //$crud->where('admin_id',$this->session->userdata('user_id'));
            }
            else 
            {
                $crud->where('subjects.admin_id',$this->session->userdata('user_id'));
            }
            
            $crud->columns('subject','course_id');
            $crud->display_as('course_id','Course');
            $crud->display_as('admin_id','Admin');
            
            
            //$crud->fields('course','course_id','admin_id');
            $crud->set_relation('course_id', 'courses', 'course');
            $crud->set_relation('admin_id', 'admin_users', 'username');
            
            
            
            $crud->set_rules('subject','subject Name','required');
            $crud->set_rules('last_update','Last Update','required');
            $crud->set_rules('course_id','Course','required');
            $crud->set_rules('admin_id','Admin','required');
            
            if($this->session->userdata('user_id')==1)
            {
                
            }
            else
            {
                
                $crud->callback_add_field('admin_id', function () {
                    return '<select id="admin_id" name="admin_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option value="">--select--</option>
                        <option selected value="'.$this->session->userdata('user_id').'">'.$this->session->userdata('username').'</option>
                        
                        </select>';
                });
                $crud->callback_edit_field('admin_id', function () {
                   return '<select id="admin_id" name="admin_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option  value="">--select--</option>
                        
                            
                        <option selected value="'.$this->session->userdata('user_id').'">'.$this->session->userdata('username').'</option>
                        
                        </select>';
                });
                
                 $crud->callback_add_field('last_update', function () {
                    return '<input name="last_update" type="text" value="'.uniqid().'" readonly /><br>'
                            . '<i style="color:red;">auto generated field plz refresh if its blank!!!</i>';
                });
                
                $crud->callback_edit_field('last_update', function () {
                    return '<input name="last_update" type="text" value="'.uniqid().'" readonly /><br>'
                            . '<i style="color:red;">auto generated field plz refresh if its blank!!!</i>';
                });
                
                $crud->callback_add_field('course_id', function () {
                    
                    $query=$this->db->where('admin_id',$this->session->userdata('user_id'))->get('courses');
        
                    $rest='';
                    foreach($query->result() as $result)
                    {
                        $rest.='<option value="'.$result->id.'">'.$result->course.'</option>';
                    }
                    
                    return '<select id="course_id" name="course_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option selected value="">--select--</option>'.$rest.'</select>';
                });
                
                $crud->callback_edit_field('course_id', function () {
                    $query=$this->db->where('admin_id',$this->session->userdata('user_id'))->get('courses');
                    $query1=$this->db->where('id',$this->uri->segment(5))->get('subjects');
                    $crnt_course_id = $query1->result_array()[0]['course_id'];
                    $rest='';
                    
                    foreach($query->result() as $result)
                    {
                        if($crnt_course_id==$result->id)
                        {
                            $rest.='<option selected value="'.$result->id.'">'.$result->course.'</option>';
                        }
                        else
                        {
                            $rest.='<option value="'.$result->id.'">'.$result->course.'</option>';
                        }
                    }
                    
                    return '<select id="course_id" name="course_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option  value="">--select--</option>'.$rest.'</select>';
         
                });
                
                
                $crud->callback_before_insert(array($this,'subject_callback'));
            }
            
            
            
            
            $this->mTitle = 'Subjects';
            $this->render_crud();
        }
        
        function subject_callback($post_array)
        {
            $post_array['subject']=$post_array['subject'];
            $post_array['course_id'] = $post_array['course_id'];
            $post_array['admin_id'] = $post_array['admin_id'];
            $post_array['last_update'] = $post_array['last_update'];
            return $post_array;
        }
       
        // Chapters crud
        public function chapter() {
            
            $crud = $this->generate_crud('chapters');
            if($this->session->userdata('user_id')==1)
            {
                //$crud->where('admin_id',$this->session->userdata('user_id'));
            }
            else 
            {
                $crud->where('chapters.admin_id',$this->session->userdata('user_id'));
            }
            
            $crud->columns('chapter','subject_id');
            $crud->display_as('subject_id','subject');
            $crud->display_as('admin_id','Admin');
            
            
            //$crud->fields('course','course_id','admin_id');
            $crud->set_relation('subject_id', 'subjects', 'subject');
            $crud->set_relation('admin_id', 'admin_users', 'username');
            
            $crud->set_rules('chapter','chapter Name','required');
            $crud->set_rules('last_update','Last Update','required');
            $crud->set_rules('subject_id','Subject','required');
            $crud->set_rules('admin_id','Admin','required');
            
            if($this->session->userdata('user_id')==1)
            {
                
            }
            else
            {
            // Add Field Admin
            $crud->callback_add_field('admin_id', function () {
                    return '<select id="admin_id" name="admin_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option  value="">--select--</option>
                        <option selected value="'.$this->session->userdata('user_id').'">'.$this->session->userdata('username').'</option>
                        
                        </select>';
                });
             $crud->callback_add_field('last_update', function () {
                    return '<input name="last_update" type="text" value="'.uniqid().'" readonly /><br>'
                            . '<i style="color:red;">auto generated field plz refresh if its blank!!!</i>';
                });
                
                $crud->callback_edit_field('last_update', function () {
                    return '<input name="last_update" type="text" value="'.uniqid().'" readonly /><br>'
                            . '<i style="color:red;">auto generated field plz refresh if its blank!!!</i>';
                });
            // Edit Field Admin
            $crud->callback_edit_field('admin_id', function () {
                   return '<select id="admin_id" name="admin_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option  value="">--select--</option>
                        
                            
                        <option selected value="'.$this->session->userdata('user_id').'">'.$this->session->userdata('username').'</option>
                        
                        </select>';
            });
            
            // Add Field Subject  
            $crud->callback_add_field('subject_id', function () {
                    
                    $query=$this->db->where('admin_id',$this->session->userdata('user_id'))->get('subjects');
        
                    $rest='';
                    foreach($query->result() as $result)
                    {
                        $rest.='<option value="'.$result->id.'">'.$result->subject.'</option>';
                    }
                    
                    return '<select id="subject_id" name="subject_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option selected value="">--select--</option>'.$rest.'</select>';
            });
            
            $crud->callback_edit_field('subject_id', function () {
                $query=$this->db->where('admin_id',$this->session->userdata('user_id'))->get('subjects');
                $query1=$this->db->where('id',$this->uri->segment(5))->get('chapters');
                //var_dump($query1->result());exit;
                $crnt_course_id = $query1->result_array()[0]['subject_id'];
                
                    $rest='';
                    
                    foreach($query->result() as $result)
                    {
                        if($crnt_course_id==$result->id)
                        {
                            $rest.='<option selected value="'.$result->id.'">'.$result->subject.'</option>';
                        }
                        else
                        {
                            $rest.='<option value="'.$result->id.'">'.$result->subject.'</option>';
                        }
                    }
                    
                    return '<select id="subject_id" name="subject_id" class="chosen-select chzn-done" data-placeholder="Select Course" style="width: 300px; ">
                        <option  value="">--select--</option>'.$rest.'</select>';
         
                });
            
            
            $crud->callback_before_insert(array($this,'chapter_callback'));
           
            }
            
                
                
                
            $this->mTitle = 'Chapters';
            $this->render_crud();
        }
        
         function chapter_callback($post_array)
        {
            $post_array['chapter']=$post_array['chapter'];
            $post_array['subject_id'] = $post_array['subject_id'];
            $post_array['admin_id'] = $post_array['admin_id'];
            $post_array['last_update'] = $post_array['last_update'];
            return $post_array;
        }
        

}
