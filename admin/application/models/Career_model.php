<?php
	class Career_model extends CI_Model{

		public function add_career($data){
			$this->db->insert('ci_career', $data);
			return true;
		}

		//---------------------------------------------------
		// get all career for server-side datatable processing (ajax based)
		public function get_all_career(){
			$wh =array();
			$SQL ='SELECT * FROM ci_career';
			
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
		// Get career detial by ID
		public function get_career_by_id($id){
			$query = $this->db->get_where('ci_career', array('id' => $id));
			return $result = $query->row_array();
		}

		//---------------------------------------------------
		// Edit career Record
		public function edit_career($data, $id){
			$this->db->where('id', $id);
			$this->db->update('ci_career', $data);
			return true;
		}

		//---------------------------------------------------
		// Change career status
		//-----------------------------------------------------
		function change_status()
		{		
			$this->db->set('is_active', $this->input->post('status'));
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('ci_career');
		} 


		//---------------------------------------------------
		// Change Career Deleted status
		//-----------------------------------------------------
		function deleted($id)
		{		
			$this->db->set('is_deleted', 1);
			$this->db->where('id', $id);
			$this->db->update('ci_career');
		} 

 

	}

?>