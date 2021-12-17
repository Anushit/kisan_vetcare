<?php
	class Inquiry_model extends CI_Model{

		 
		//---------------------------------------------------
		// get all inquiry for server-side datatable processing (ajax based)
		public function get_all_inquiry(){
			$wh =array();
			$SQL ='SELECT * FROM ci_inquiry';
			
			if(count($wh)>0)
			{
				$WHERE = implode(' and ',$wh);
				return $this->datatable->LoadJson($SQL,$WHERE);
			}
			else
			{
				return $this->datatable->LoadJson($SQL);
			}
		}


		//---------------------------------------------------
		// Get inquiry detial by ID
		public function get_inquiry_by_id($id){
			$query = $this->db->get_where('ci_inquiry', array('id' => $id));
			return $result = $query->row_array();
		}

		 
 
		//---------------------------------------------------
		// get inquirys for csv export
		public function get_inquirys_for_export(){
			///$this->db->where('is_admin', 0);
			$this->db->select('id, name, email, mobile, inquiry_type, subject, message, ip_address, created_at');
			$this->db->from('ci_inquiry');
			$query = $this->db->get();
			return $result = $query->result_array();
		}
		
		
		public function addgernalinquery($data){
			$this->db->insert('ci_inquiry', $data);
			return true;
			
		}


	}

?>