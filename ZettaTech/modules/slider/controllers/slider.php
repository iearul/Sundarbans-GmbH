<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 Parallaxlogic Infotech.
         * @copyright   Tanveer Agmed Ivan
         * @version 	1.0.0
         * 
	 */
        function __construct()
	{
            if (!$this->ion_auth->logged_in())
            {
                    // redirect them to the login page
                    redirect('user/login', 'refresh');
            }
        }
        function index(){
            
            $data['sliders'] = $this->CoreZ_IT->get('sliders')->result();
            $data['page_title'] = 'Sliders';
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');
            $this->CoreZ_IT->_render_backend('index', $data);
        }
        function add(){
                $config['upload_path']      = './uploads/sliders/';
                $config['allowed_types']    = 'jpg|png';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('slider')){
                    $upload_data = $this->upload->data();
                    $values['name'] = $upload_data['file_name'];
                    $values['title1'] = $this->input->post('title1');
                    $values['title2'] = $this->input->post('title2');
                    $values['link'] = $this->input->post('link');
                    $this->CoreZ_IT->insert('sliders', $values);
                    $this->session->set_flashdata('message','Slider successfully added.');
                    redirect('slider', 'refresh');
                }
                $data['title1'] = array(
					'name' => 'title1',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['title2'] = array(
					'name' => 'title2',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['link'] = array(
					'name' => 'link',
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Add Slider';
		$this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($id){
                $data['slider'] = $this->CoreZ_IT->get_where('sliders',array('id' => $id))->row();
                if(empty($data['slider'])){
                    $this->session->set_flashdata('message_error', 'Slider Not Exists.');
                    redirect('slider', 'refresh');
                }
                $config['upload_path']      = './uploads/sliders/';
                $config['allowed_types']    = 'jpg|png';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->load->library('upload', $config);
                $this->form_validation->set_rules('title1', 'Title', '');
                if ($this->upload->do_upload('slider')){
                    $upload_data = $this->upload->data();
                    $values['name'] = $upload_data['file_name'];
                    $values['title1'] = $this->input->post('title1');
                    $values['title2'] = $this->input->post('title2');
                    $values['link'] = $this->input->post('link');
                    $this->CoreZ_IT->update('sliders', $values, array('id' => $id));
                    $path_to_file = 'uploads/sliders/'.$data['slider']->name;
                    if(file_exists($path_to_file))unlink($path_to_file);
                    $this->session->set_flashdata('message','Slider successfully updated!');
                    redirect('slider', 'refresh');
                }else if($this->form_validation->run() == true){
                    $values['title1'] = $this->input->post('title1');
                    $values['title2'] = $this->input->post('title2');
                    $values['link'] = $this->input->post('link');
                    $this->CoreZ_IT->update('sliders', $values, array('id' => $id));
                    $this->session->set_flashdata('message','Slider successfully updated!');
                    redirect('slider', 'refresh');
                }
                $data['title1'] = array(
					'name' => 'title1',
                                        'value' => $data['slider']->title1,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['title2'] = array(
					'name' => 'title2',
                                        'value' => $data['slider']->title2,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['link'] = array(
					'name' => 'link',
                                        'value' => $data['slider']->link,
					'class' => 'form-control',
					'type' => 'text'
				);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
		$data['page_title'] = 'Edit Slider';
		$this->CoreZ_IT->_render_backend('edit', $data);
        }
        function delete($id){
                $data['slider'] = $this->CoreZ_IT->get_where('sliders',array('id' => $id))->row();
                if(empty($data['slider'])){
                    $this->session->set_flashdata('message_error', 'Slider Not Exists.');
                    redirect('slider', 'refresh');
                }
                $path_to_file = 'uploads/sliders/'.$data['slider']->name;
                if(file_exists($path_to_file))unlink($path_to_file);
                $this->CoreZ_IT->delete('sliders',array('id' => $id));
                $this->session->set_flashdata('message','Slider successfully deleted.');
                redirect('slider', 'refresh');
               
        }
}

/* End of file home.php */
/* Location: pi/modules/fileupload/controllers/home.php */