<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Inquiry extends MY_Controller {

	public function __construct(){

		parent::__construct();
		auth_check(); // check login auth
		check_premissions($this->router->fetch_class(), $this->router->fetch_method());
		$this->load->model('inquiry_model', 'inquiry_model');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index(){
		$data['title'] = 'Inquirys List';

		$this->load->view('includes/_header', $data);
		$this->load->view('inquiry/inquiry_list');
		$this->load->view('includes/_footer');
	}
	
	public function datatable_json(){				   					   
		$records = $this->inquiry_model->get_all_inquiry();
		$data = array();

		$i=0;
		foreach ($records['data']  as $row) 
		{  
			if($row['inquiry_type'] == 1){ 
				$inquiry_type = 'Gernal'; 
			}elseif($row['inquiry_type'] == 2){
				$inquiry_type = 'Product'; 
			}elseif($row['inquiry_type'] == 3){
				$inquiry_type = 'Service'; 
			}
			$data[]= array(
				++$i,
				$row['name'],  
				$row['email'],
				$row['mobile'],
				'<span>'.$inquiry_type.'</span>',
				$row['subject'],
				$row['ip_address'],
				date_time($row['created_at']),
				'' 
				 
			);
		}
		$records['data']=$data;
		echo json_encode($records);						   
	}

	//-----------------------------------------------------------
	public function change_status(){   
		$this->inquiry_model->change_status();
	}


	//-----------------------------------------------------------
	public function delete($id = 0)
	{		
		$this->db->delete('ci_inquirys', array('id' => $id));
		$this->session->set_flashdata('success', 'Inquiry has been deleted successfully!');
		redirect(base_url('inquiry'));
	}
 
	
	//---------------------------------------------------------------
	//  Export Categories PDF 
	public function create_inquiry_pdf(){
		$this->load->helper('pdf_helper'); // loaded pdf helper
		$data['all_inquirys'] = $this->inquiry_model->get_inquirys_for_export();		 
		$this->load->view('inquiry/inquiry_pdf', $data);
	}

	//---------------------------------------------------------------	
	// Export data in CSV format 
	public function export_csv(){ 

	   // file name 
		$filename = 'inquirys_'.date('Y-m-d').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");

	   // get data 
		$all_inquirys = $this->inquiry_model->get_inquirys_for_export();		 

	   // file creation 
		$file = fopen('php://output', 'w');

		$header = array("ID", "Name", "Email" ,"Mobile", "Inquiry Type", "subject", "message", "ip_address", "Created Date"); 

		fputcsv($file, $header);
		foreach ($all_inquirys as $key=>$line){ 

			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	} 


}

?>