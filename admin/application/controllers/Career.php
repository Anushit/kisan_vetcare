<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Career extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		check_premissions($this->router->fetch_class(), $this->router->fetch_method());
		$this->load->model('career_model', 'career_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){

		$data['title'] = 'Career List';

		$this->load->view('includes/_header', $data);
		$this->load->view('career/career_list');
		$this->load->view('includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->career_model->get_all_career();
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['is_active'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['name'],
				$row['opening_date'],
				$row['qualification'],
				$row['experince'],
				$row['description'],
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['id'].'" 
				id="cb_'.$row['id'].'"
				type="checkbox" '.$status.'><label for="cb_'.$row['id'].'"></label>',		

				'<a title="View" class="view btn btn-sm btn-info" href="'.base_url('career/edit/'.$row['id']).'"> <i class="fa fa-eye"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("career/delete/".$row['id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'

				 
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	//-----------------------------------------------------------
	public function change_status(){   

		$this->career_model->change_status();
	}

	//-----------------------------------------------------------
	public function add(){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('name', 'Career Name', 'trim|required');
			$this->form_validation->set_rules('type', 'Career Type', 'trim|required');
			$this->form_validation->set_rules('opening_date', 'Opening date', 'trim|required');
			$this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
			$this->form_validation->set_rules('experince', 'Experince', 'trim|required'); 
			$this->form_validation->set_rules('description', 'Description', 'trim|required'); 
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$data['career'] = array(
					'name' => $this->input->post('name'),
					'type' => $this->input->post('type'),
					'opening_date' => $this->input->post('opening_date'),
					'qualification' => $this->input->post('qualification'),
					'experince' => $this->input->post('experince'),
					'description' => $this->input->post('description'),
					'is_active' => $this->input->post('status') 
				); 
				$this->session->set_flashdata('errors', $data['errors']);
				$this->load->view('includes/_header');
				$this->load->view('career/career_add', $data);
				$this->load->view('includes/_footer');
			}
			else{
				$data = array(
					'name' => $this->input->post('name'),
					'type' => $this->input->post('type'),
					'opening_date' => $this->input->post('opening_date'),
					'qualification' => $this->input->post('qualification'),
					'experince' => $this->input->post('experince'),
					'description' => $this->input->post('description'),
					'is_active' => $this->input->post('status'),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->career_model->add_career($data);
				if($result){
					$this->session->set_flashdata('success', 'Career has been added successfully!');
					redirect(base_url('career'));
				}
			}
		}
		else{

			$data['title'] = 'Add Career';

			$this->load->view('includes/_header', $data);
			$this->load->view('career/career_add');
			$this->load->view('includes/_footer');
		}
		
	}

	//-----------------------------------------------------------
	public function edit($id = 0){

		if($this->input->post('submit')){
			$this->form_validation->set_rules('name', 'Career Name', 'trim|required');
			$this->form_validation->set_rules('type', 'Career Type', 'trim|required');
			$this->form_validation->set_rules('opening_date', 'Opening date', 'trim|required');
			$this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
			$this->form_validation->set_rules('experince', 'Experince', 'trim|required'); 
			$this->form_validation->set_rules('description', 'Description', 'trim|required'); 
			$this->form_validation->set_rules('status', 'Status', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				///$data['career'] = $this->career_model->get_career_by_id($id);
				$data = array(
					'errors' => validation_errors()
				);
				$data['career'] = array(
					'id' => $id,
					'name' => $this->input->post('name'),
					'type' => $this->input->post('type'),
					'opening_date' => $this->input->post('opening_date'),
					'qualification' => $this->input->post('qualification'),
					'experince' => $this->input->post('experince'),
					'description' => $this->input->post('description'),
					'is_active' => $this->input->post('status') 
				); 
				$this->session->set_flashdata('errors', $data['errors']);
				$this->load->view('includes/_header');
				$this->load->view('career/career_add', $data);
				$this->load->view('includes/_footer');
			}
			else{
				$data = array(
					'name' => $this->input->post('name'),
					'type' => $this->input->post('type'),
					'opening_date' => $this->input->post('opening_date'),
					'qualification' => $this->input->post('qualification'),
					'experince' => $this->input->post('experince'),
					'description' => $this->input->post('description'),
					'is_active' => $this->input->post('status'),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->career_model->edit_career($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'Career has been updated successfully!');
					redirect(base_url('career'));
				}
			}
		}
		else{
			$data['title'] = 'Edit Career';
			$data['career'] = $this->career_model->get_career_by_id($id);
			
			$this->load->view('includes/_header', $data);
			$this->load->view('career/career_edit', $data);
			$this->load->view('includes/_footer');
		}
	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{		
		///$this->db->delete('ci_career', array('id' => $id));
		$result = $this->career_model->deleted($id);
		$this->session->set_flashdata('success', 'Career Page has been deleted successfully!');
		redirect(base_url('career'));
	}
}

?>