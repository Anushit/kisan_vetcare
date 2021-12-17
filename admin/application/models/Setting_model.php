<?php
class Setting_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	/*public function update_general_setting($data){
		$this->db->where('id', 1);
		$this->db->update('ci_general_settings', $data);
		return true;

	}*/

	//-----------------------------------------------------
	public function get_general_settings($type=NULL){
		if($type!=NULL){
			$this->db->where('setting_type', $type);
		}
        $query = $this->db->get('ci_general_settings'); 
        return $query->result_array();
	}

	public function get_permission_settings($type=NULL){
		if($type!=NULL){
			$this->db->where('name', $type);
		}
        $query = $this->db->get('ci_modules'); 
        return $query->result_array();
	}


	public function get_general_parent_settings(){
		return array(
		'type'=>array(
			'1'=>"basic", 
			'2'=>"email", 
			'3'=>"social", 
			'4'=>"reCAPTCHA",
			'5'=>"sms" 
		),
		'name'=>array(
			'1'=>"General Setting", 
			'2'=>"Email Setting", 
			'3'=>"Social Setting", 
			'4'=>"Google reCAPTCHA", 
			'5'=>"SMS Setting"
		) );
	}

	
}
?>