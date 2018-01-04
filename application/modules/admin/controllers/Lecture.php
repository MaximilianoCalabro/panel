<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_builder');
                
                
	}
        // Course Crud
	public function index()
        {
            $crud = $this->generate_crud('lectures');
            if($this->session->userdata('user_id')==1)
            {
                //$crud->where('admin_id',$this->session->userdata('user_id'));
            }
            else 
            {
                $crud->where('lectures.admin_id',$this->session->userdata('user_id'));
            }
            
            $crud->columns('file_name','name','admin_id','pos','chapter_id','uploaded_at','last_update');
            $crud->display_as('admin_id','Admin');
            $crud->display_as('chapter_id','Chapter');
            $crud->display_as('name','Orignal Name');
            $crud->set_relation('chapter_id', 'chapters', 'chapter');
            $crud->set_relation('admin_id', 'admin_users', 'username');
            $crud->field_type('name', 'readonly');
            $crud->field_type('chapter_id', 'readonly');
            $crud->field_type('admin_id', 'readonly');
            $crud->field_type('uploaded_at', 'readonly');
            
            
            $crud->unset_add();
            
            $crud->callback_edit_field('last_update', function () {
                    return '<input name="last_update" type="text" value="'.uniqid().'" readonly />';
                });
            $crud->callback_before_insert(array($this,'chapter_callback'));
            $this->mTitle = 'Lectures';
            $this->render_crud();
            
             
        }
        
        function chapter_callback($post_array)
        {
            
            
            $post_array['last_update'] = $post_array['last_update'];
            return $post_array;
        }
        
        public function get_chapter() { 
            if($this->input->post('subject_id')!='')
            {
                $sid=$this->input->post('subject_id');
                $this->db->where('subject_id',$sid);
                $this->db->where('admin_id',$this->session->userdata('user_id'));
                $query=$this->db->get('chapters');
                
                foreach($query->result() as $result)
                {
                    echo '<option value="'.$result->id.'">'.$result->chapter.'</option>';
                }
            }
        }
        
        public function get_subject() {
            
            if($this->input->post('course_id')!='')
            {
                $cid=$this->input->post('course_id');
                $this->db->where('course_id',$cid);
                $this->db->where('admin_id',$this->session->userdata('user_id'));
                $query=$this->db->get('subjects');
                
                foreach($query->result() as $result)
                {
                    echo '<option value="'.$result->id.'">'.$result->subject.'</option>';
                }
            }
        }
        
        function delete_selection()
        {
           $id_array = array();
           $selection = $this->input->post("selection", TRUE);
           $id_array = explode("|", $selection);

           foreach($id_array as $item):
                  if($item != ''):
                  //DELETE ROW
                  $this->db->where('id', $item);
                  $this->db->delete('lectures');
                  endif;
           endforeach; 
        }
        
        public function upload1()
        {
			
            $arr = $this->input->post('files');
            $chapter=$this->input->post('chapter');
                
            $this->db->order_by("id", "desc");
            $query = $this->db->get('lectures',1);
                    
            if(isset($query->result_array()[0]))
            {
                $pos=$query->result_array()[0]['pos']+0;
            }
            else
            {
                $pos=0;
            }
            
            foreach($arr as $r)
            { 
                        $name = preg_replace('/\s+/', '', $r);
                        $pos=$pos+1;
                        $data = array(
                            'file_name' => $this->input->post('file_name').'_'.$pos ,
                            'name' => $name,
                            'chapter_id' => $chapter,
                            'pos' => $pos,
                            'last_update' => uniqid(),
                            'admin_id' => $this->session->userdata('user_id')
                         );
                         
                        $result=$this->db->insert('lectures', $data);
                        
                    }
                    if($result)
                    {
                           echo true; 
                            
                    }
            
            
        }
        
        public function upload()
        {
            echo $this->input->post('files');
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $total_file = count($_FILES['upload_file']['name']);
                $chapter=$this->input->post('chapter');
                
                    $this->db->order_by("id", "desc");
                    $query = $this->db->get('lectures',1);
                    
                    if(isset($query->result_array()[0]))
                    {
                        $pos=$query->result_array()[0]['pos']+0;
                    }
                    else
                    {
                        $pos=0;
                    }
                    for($i=0; $i<$total_file; $i++)
                    {
                        $name = preg_replace('/\s+/', '', $_FILES['upload_file']['name'][$i]);
                        $pos=$pos+1;
                        $data = array(
                            'file_name' => $this->input->post('file_name').'_'.$pos ,
                            'name' => $name,
                            'chapter_id' => $chapter,
                            'pos' => $pos,
                            'last_update' => uniqid(),
                            'admin_id' => $this->session->userdata('user_id')
                         );
                         
                        $result=$this->db->insert('lectures', $data);
                        
                    }
                    if($result)
                    {
                            
                            $this->session->set_flashdata('upload_success', 'Well done! You successfully Uploaded Files.');
                           
                            redirect('admin/lecture/upload');
                    }
            }
            else
            {
                $this->mViewData['message'] = $this->session->flashdata('upload_success');
		$courses = $this->db->where('admin_id',$this->session->userdata('user_id'))->get('courses');
		$this->mViewData['course'] = $courses->result();
		$this->mTitle.= 'Upload Lectures';
		$this->render('lecture/upload');
            }
            
             
        }

}
