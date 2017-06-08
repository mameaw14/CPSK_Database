<?php
	class events_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function insert_row($data) {
			$this->db->insert('event', $data);
		}

		public function get_all_event() {
			$query = $this->db->get('event');
			return $query->result();
		}
	}