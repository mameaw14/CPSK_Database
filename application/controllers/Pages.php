<?php
class pages extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('student_model');
		}

		public function index(){
				$data['student'] = $this->student_model->get_row_by_fb(get_user_id());
				$this->load->view('templates/header');
				$this->load->view('index',$data);
				$this->load->view('templates/footer');
		}

		public function view($slug){
				$this->load->view('templates/header');
				$this->load->view('pages/'.$slug);
				$this->load->view('templates/footer');
		}

}