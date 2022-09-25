<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 CoreZ IT.
         * @author      Tanveer Agmed Ivan
         * @version 	1.0.1
         * 
	 */
        function __construct()
	{
        }
        function index(){
            $data['page_title'] = 'About Us';
            $this->CoreZ_IT->_render_frontend('index', $data);
        }
        function edit(){
            if(!$this->ion_auth->logged_in())
            {
                    //redirect them to the login page
                    redirect('user/login', 'refresh');
            }
            $this->form_validation->set_rules('introduction', 'Introduction', 'required');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'introduction'  => $this->input->post('introduction')
                );
                
                $where['id'] = 1;
                $this->CoreZ_IT->update('site',$values,$where);
                $this->session->set_flashdata('message','Your About Us is been updated.');
                redirect('about/edit', 'refresh');
            }
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'About Us';
            $this->CoreZ_IT->_render_backend('about/edit', $data);
        }   
}