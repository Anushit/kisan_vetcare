<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Subadmin extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		check_premissions($this->router->fetch_class(), $this->router->fetch_method());
		$this->load->model('subadmin_model', 'subadmin_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){

		$data['title'] = 'User List';

		$this->load->view('includes/_header', $data);
		$this->load->view('subadmin/user_list');
		$this->load->view('includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->subadmin_model->get_all_subadmin();
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			$status = ($row['is_active'] == 1)? 'checked': '';
			$data[]= array(
				++$i,
				$row['username'],
				$row['email'],
				$row['mobile_no'],
				date_time($row['created_at']),	
				'<input class="tgl_checkbox tgl-ios" 
				data-id="'.$row['admin_id'].'" 
				id="cb_'.$row['admin_id'].'"
				type="checkbox"  
				'.$status.'><label for="cb_'.$row['admin_id'].'"></label>',		

				'<a title="Edit" class="update btn btn-sm btn-warning" href="'.base_url('subadmin/edit/'.$row['admin_id']).'"> <i class="fa fa-pencil-square-o"></i></a>
				<a title="Delete" class="delete btn btn-sm btn-danger" href='.base_url("subadmin/delete/".$row['admin_id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> <i class="fa fa-trash-o"></i></a>'
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	//-----------------------------------------------------------
	public function change_status(){   

		$this->subadmin_model->change_status();
	}

	//-----------------------------------------------------------
	public function add(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[ci_admin.username]');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[ci_admin.email]');
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);
				$data['user'] = array( 					
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'), 
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'password' =>  $this->input->post('password'),
					'is_active' => $this->input->post('status'),
				);
				$this->session->set_flashdata('errors', $data['errors']);
				$this->load->view('includes/_header');
				$this->load->view('subadmin/user_add', $data);
				$this->load->view('includes/_footer'); 
			}
			else{
				$data = array(
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'), 
					'mobile_no' => $this->input->post('mobile_no'),
					'address' => $this->input->post('address'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->subadmin_model->add_user($data);
				if($result){
					$this->session->set_flashdata('success', 'User has been added successfully!');
					redirect(base_url('subadmin'));
				}
			}
		}
		else{

			$data['title'] = 'Add User';

			$this->load->view('includes/_header', $data);
			$this->load->view('subadmin/user_add');
			$this->load->view('includes/_footer');
		}
		
	}

	//-----------------------------------------------------------
	public function edit($id = 0){

		if($this->input->post('submit')){
			$original_value = $this->subadmin_model->get_user_by_id($id);
			if($this->input->post('username') != $original_value['username']) {
			   $uis_unique =  '|is_unique[ci_admin.username]';
			} else {
			   $uis_unique =  '';
			}
			if($this->input->post('email') != $original_value['email']) {
			   $eis_unique =  '|is_unique[ci_admin.email]';
			} else {
			   $eis_unique =  '';
			}
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean'.$uis_unique);
			$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required'.$eis_unique);
			$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) { 
				$data = array(
					'errors' => validation_errors()
				);
				$data['user'] = array(
					'admin_id' => $id,
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'), 
					'email' => $this->input->post('email'),
					'mobile_no' => $this->input->post('mobile_no'),
					'password' =>  $this->input->post('password'),
					'is_active' => $this->input->post('status'),
				); 
				$this->session->set_flashdata('errors', $data['errors']);
				$this->load->view('includes/_header');
				$this->load->view('subadmin/user_edit', $data);
				$this->load->view('includes/_footer');  
			}
			else{
				$data = array(
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'), 
					'mobile_no' => $this->input->post('mobile_no'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_active' => $this->input->post('status'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->subadmin_model->edit_user($data, $id);
				if($result){
					$this->session->set_flashdata('success', 'User has been updated successfully!');
					redirect(base_url('subadmin'));
				}
			}
		}
		else{
			$data['title'] = 'Edit User';
			$data['user'] = $this->subadmin_model->get_user_by_id($id);
			
			$this->load->view('includes/_header', $data);
			$this->load->view('subadmin/user_edit', $data);
			$this->load->view('includes/_footer');
		}
	}

	//-----------------------------------------------------------
	public function delete($id = 0)
	{		
		$this->db->delete('ci_admin', array('admin_id' => $id));
		$this->session->set_flashdata('success', 'Subadmin has been deleted successfully!');
		redirect(base_url('subadmin'));
	}

	//---------------------------------------------------------------
	//  Export subadmin PDF 
	public function create_subadmin_pdf(){

		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_subadmin'] = $this->subadmin_model->get_subadmin_for_export();
		$this->load->view('subadmin/subadmin_pdf', $data);
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_csv(){ 

	   // file name 
		$filename = 'subadmin_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$user_data = $this->subadmin_model->get_subadmin_for_export();

	   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date"); 

		fputcsv($file, $header);
		foreach ($user_data as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}


}


	?>