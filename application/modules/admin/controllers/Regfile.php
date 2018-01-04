<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regfile extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
                
	}
        
        
        public function check()
        {
            $crud = $this->generate_crud('regfiles');
            
             $crud->set_relation('admin_id', 'admin_users', 'username');
             $crud->set_relation('lecture_id', 'lectures', 'file_name');
             $crud->where('regfiles.admin_id',$this->session->userdata('user_id'));
            //$crud->set_relation_n_n('lectures',null, 'lectures', 'lecture_id', 'id', 'file_name');
            $crud->columns('pos','lecture_id', 'str_dt', 'end_dt', 'noofplay', 'user_id', 'admin_id','reg_dt');
            
             $crud->display_as('admin_id','Admin');
             $crud->display_as('pos','Position');
             $crud->display_as('lecture_id','Lecture');
             
            $crud->unset_add();
            $crud->unset_edit();
            $this->mTitle.= 'Regfiles';
            $this->render_crud();
        }
        
        
        // Course Crud
	public function file()
        {
           
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $totalFile=count($this->input->post('checkbox1'));
                if($totalFile <= 0)
                {
                    $this->session->set_flashdata('regfile_err', 'Please select lecture form the list...!');
                    redirect('admin/regfile/file');
                }
                
                $user_id = $this->input->post('users');
                $admin_id = $this->session->userdata('user_id');
                $file_id=$this->input->post('checkbox1');
                $no_of_file = $this->input->post('noofplay');
                $str_dt = $this->input->post('str_dt');
                $end_dt = $this->input->post('end_dt');
                $reg_dt = date('Y-m-d');
                $last_updated = uniqid();
                
                // last Position Find
                    $this->db->order_by("pos", "desc");
                    $query = $this->db->get('regfiles',1);
                    
                    if(isset($query->result_array()[0]))
                    {
                        $pos=$query->result_array()[0]['pos']+0;
                    }
                    else
                    {
                        $pos=0;
                    }
                // Total File Selected
                    
                for($i=0; $i<$totalFile; $i++)
                {
                    $this->db->where("lecture_id",$file_id[$i]);
                    $this->db->where("user_id",$user_id);
                    $this->db->where("admin_id",$admin_id);
                    $query = $this->db->get('regfiles',1);
                    
                    if($query -> num_rows()!=0)
                    {
                          $id=$query->result_array()[0]['id'];
                          $data = array(
                                'lecture_id' => $file_id[$i],
                                'str_dt' => $str_dt,
                                'end_dt' => $end_dt,
                                'noofplay' => $no_of_file,
                                'last_update' => $last_updated,
                                'action' => '1',
                             );

                         $this->db->where('id', $id);
                         $this->db->update('regfiles', $data); 
                    }
                    else
                    {
                        $pos=$pos+1;
                        $data = array(
                                    'lecture_id' => $file_id[$i],
                                    'admin_id' => $admin_id,
                                    'user_id' => $user_id,
                                    'str_dt' => $str_dt,
                                    'end_dt' => $end_dt,
                                    'noofplay' => $no_of_file,
                                    'reg_dt' => $reg_dt,
                                    'last_update' => $last_updated,
                                    'pos' => $pos,
                                    'action' => '0',
                                 );

                        $result=$this->db->insert('regfiles', $data);
                    }
                }
                if($this->db->affected_rows() > 0)
                {
                    $this->session->set_flashdata('regfile_success', 'Well done! You successfully Registred Files.');
                    redirect('admin/regfile/file');
                }
            }
            else
            {
                // StyleSheets
                $this->mStylesheets['datatable']=array(
                );
                
                $this->mScripts['foot']=array(
                    'assets_dt/datatables/jquery.dataTables.min.js',
                    'assets_dt/datatables/dataTables.bootstrap.js'
                );
                $this->mViewData['message'] = $this->session->flashdata('regfile_success');
                $this->mViewData['err_message'] = $this->session->flashdata('regfile_err');
                $clients = $this->db->where('admin_id',$this->session->userdata('user_id'))->get('users');
                $this->mViewData['client'] = $clients->result();
                $courses = $this->db->where('admin_id',$this->session->userdata('user_id'))->get('courses');
                $this->mViewData['course'] = $courses->result();

                $this->mTitle='File Registration';
                $this->render('regfile/file');
            }
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
        
        
        public function get_lecture() { 
            if($this->input->post('chapter_id')!='')
            {
                $lid=$this->input->post('chapter_id');
                $this->db->where('chapter_id',$lid);
                $this->db->where('admin_id',$this->session->userdata('user_id'));
                $query=$this->db->get('lectures');
                
                foreach($query->result() as $result)
                {
                    echo '<tr id="tr'.$result->id.'">';
                    echo '<td><input type="checkbox" class="checkbox1" id="checkbox'.$result->id.'" name="checkbox1[]" value="'.$result->id.'"/></td>';
                    echo '<td>'.$result->pos.'</td>';
                    echo '<td>'.$result->file_name.'</td>';
                    echo '<td>'.$result->name.'</td>';
                    echo '</tr>';
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
        
        //function to handle callbacks
        /*
	public function dataTable() {
		$this -> load -> library('Datatable', array('model' => 'product_dt'));
		
		$jsonArray = $this -> datatable -> datatableJson();
		
        $this -> output -> set_content_type('application/json') -> set_output(json_encode($jsonArray));
		
	}*/
        
      
        
       
        
        
        
       
}
