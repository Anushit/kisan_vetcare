<?php
	class Service_model extends CI_Model{

		public function add_service($data){
			$this->db->insert('ci_services', $data);
			return true;
		}

		//---------------------------------------------------
		// get all service for server-side datatable processing (ajax based)
		public function get_all_service(){
			$wh =array();
			$SQL ='SELECT * FROM ci_services';
			
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
		// Get service detial by ID
		public function get_service_by_id($id){
			$query = $this->db->get_where('ci_services', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit service Record
		public function edit_service($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_services', $data);
			return true;
		}

		//---------------------------------------------------
		// Change service status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ci_services');
		}  
 
		//---------------------------------------------------
		// get services for csv export
		public function get_services_for_export(){
			///$this->db->where('is_admin', 0);
			$this->db->select('id, name, icon, sort_description, created_at');
			$this->db->from('ci_services');
			$query = $this->db->get();
			return $result = $query->result_array();
		}


	}

?>