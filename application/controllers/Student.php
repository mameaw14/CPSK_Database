<?php
class student extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('student_model');
        }

        public function index(){
            $this->load->view('templates/header');
            $this->load->view('home');
            $this->load->view('templates/footer');
        }

        public function req(){
            $fb_id = get_user_id();
            $student = $this->student_model->get_row_by_fb($fb_id);
            if(!$student){
                show_404();
            }
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['fields'] = array(
                'student_id' => 'รหัสนิสิต',
                'gender' => 'เพศ',
                'name' => 'ชื่อ',
                'surname' => 'นามสกุล',
                'nickname' => 'ชื่อเล่น',
                'name_en' => 'ชื่อภาษาอังกฤษ',
                'surname_en' => 'นามสกุลภาษาอังกฤษ',
                'nickname_en' => 'ชื่อเล่นภาษาอังกฤษ',
                'tel_no' => 'เบอร์โทร',
                'major' => 'ภาค',
                'shirt_size' => 'ไซส์เสื้อ',
                'fb' => 'เฟสบุ๊ก',
                'allergic' => 'ข้อมูลแพ้อาหาร/ยา'
                );

            $data['years'] = array('58','57','56','55');
            $this->form_validation->set_rules('reason', 'จุดประสงค์', 'required');
            
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('request/index',$data);
                $this->load->view('templates/footer');
            }
            else{
                $data['data'] = $this->student_model->get_json($this->input->post('year'),$this->input->post('req'));
                $data['json'] = json_encode($this->student_model->get_json($this->input->post('year'),$this->input->post('req')));
                $this->load->view('templates/header');
                $this->load->view('request/download',$data);
                $this->load->view('templates/footer');
            }
        }
    }