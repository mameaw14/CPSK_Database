<?php
class profile extends CI_Controller {

		public function __construct()
		{
				parent::__construct();
				$this->load->model('student_model');
		}

		public function index()
		{
			$fb_id = get_user_id();
			if($fb_id == null){
				show_404();
			}
			else {

				if( $this->student_model->is_user_exist() ){
					$data['student'] = $this->student_model->get_row_by_fb($fb_id);

					$this->load->view('templates/header');
					$this->load->view('profile/index', $data);
					$this->load->view('templates/footer');
				}
				else {
					$this->connect();
				}
			}
		}

		public function edit()
		{
			$fb_id = get_user_id();
			if($fb_id == null){
				show_404();
			}
			else{
				$this->load->helper('form');
				$data['student'] = $this->student_model->get_row_by_fb($fb_id);
				$data['edited'] = FALSE;

				$this->load->view('templates/header');
				$this->load->view('profile/edit', $data);
				$this->load->view('templates/footer');
			}
		}

		public function submit_edit_form()
		{
			$data_form = $this->input->post(NULL, TRUE);
			$student_id = get_user_std();
			$data['tel_no'] = preg_replace('/[^0-9.]+/', '', $data_form['tel-no']);
			$data['name_en'] = ucfirst(strtolower($data_form['name-en']));
			$data['surname_en'] = ucfirst(strtolower($data_form['surname-en']));
			$data['nickname_en'] = ucfirst(strtolower($data_form['nickname-en']));
			$data['shirt_size'] = $data_form['shirt-size'];
			$data['allergic'] = $data_form['allergic'];

			$this->student_model->edit($student_id,$data);

			$data['edited'] = TRUE;

			$this->load->view('templates/header');
			$this->load->view('profile/edit', $data);
			$this->load->view('templates/footer');
		}

		public function connect()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('std_id', 'รหัสนิสิต', 'required');
			$this->form_validation->set_rules('name', 'ชื่อจริง', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('check');
				$this->load->view('templates/footer');
			}
			else
			{
	            $data['student'] = null;
				$is_exist = $this->student_model->is_user_exist();
				if($is_exist)
				{
	                $data['error'] = "บัญชี Facebook นี้ได้ถูกใช้ผูกกับผู้ใช้อื่นไปแล้ว";
				}
				else
				{
					$data['student'] = $this->student_model->check();

					if($data['student'])
					{
						if(!$data['student']['fb'])
							{
								$student_id = $this->input->post('std_id');
								$this->student_model->edit($student_id,array('fb'=>get_user_id()));
							}
						else
							{
								$data['student'] = null;
								$data['error'] = "ผู้ใช้นี้เคยเชื่อมต่อกับ Facebook แล้ว กรุณาติดต่อ Admin";
							}
					}
					else
					{
						$data['error'] = "ข้อมูลผู้ใช้ไม่ถูกต้อง กรุณาตรวจสอบ";
					}
				}
			$this->load->view('templates/header');
			$this->load->view('check_success',$data);
			$this->load->view('templates/footer');
			}
		}
		
	}