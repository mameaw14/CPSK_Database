<?php
class events extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('events_model');
        }

        public function index(){
            $this->load->view('templates/header');
            $this->load->view('home');
            $this->load->view('templates/footer');
        }


        public function add(){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['fields'] = array(
                'event_name' => 'ชื่อกิจกรรม',
                'event_desc' => 'รายละเอียดกิจกรรม',
                'additional_field_enabled' => 'ต้องการขอข้อมูลเพิ่มเติมจากผู้เข้าร่วมหรือไม่?',
                'additional_field_text' => 'ข้อความถึงผู้เข้าร่วม'
                );

            $this->form_validation->set_rules('event_name', 'ชื่อกิจกรรม', 'required');
            
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('events/add',$data);
                $this->load->view('templates/footer');
            }
            else{
                $data['add'] = $this->input->post();
                $data['add']['created_by'] = get_user_std();
                if($data['add']['additional_field_enabled']=='on') $data['add']['additional_field_enabled'] = TRUE;
                else $data['add']['additional_field_enabled'] = FALSE;
                
                $this->events_model->insert_row($data['add']);

                $this->load->view('templates/header');
                $this->load->view('events/add_successful');
                $this->load->view('templates/footer');
            }
        }
    }