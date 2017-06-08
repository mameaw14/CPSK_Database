<?php
	class student_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function get_row_by_fb($fb_id = null){
			if($fb_id)
			{
				$query = $this->db->get_where('student',array('fb' => $fb_id ));
				return $query->row_array();
			}

			return null;
		}

		public function get_row($student_id = null){
			if($student_id)
			{
				$query = $this->db->get_where('student',array('student_id' => $student_id ));
				return $query->row_array();
			}

			return null;
		}

		public function get_fromid($student_id,$field){
			$query = $this->get_row($student_id);
			return $query[$field];
		}

		public function get_fromfbid($fb_id,$field){
			$query = $this->get_row_by_fb($fb_id);
			return $query[$field];
		}

		public function check(){
			$student_id = $this->input->post('std_id');
			$name = $this->input->post('name');
			$student_item = $this->get_row($student_id);
			if($student_item && $student_item['name'] == $name){
				return $student_item;
			}

			return null;
		}

		public function edit($student_id, $data){
			$this->db->where('student_id',$student_id);
			$this->db->update('student',$data);
		}

		public function is_user_exist(){
			$fb_id = get_user_id();
			if($this->db->get_where('student',array('fb' => $fb_id) )->num_rows() > 0 ){
				return TRUE;
			}
			return FALSE;
		}

		public function get_json($list,$req_data){
			$select = $req_data[0];
			array_shift($req_data);
			foreach ($req_data as $str) {
				$select = $select.', '.$str;
			}

			$this->db->select($select);

    		$this->db->like('student_id',$list[0],'after');
    		array_shift($list);
			foreach ($list as $prefix) {
    			$this->db->or_like('student_id',$prefix,'after');
			}

			$query = $this->db->get('student');

			return $query->result();
		}
	}