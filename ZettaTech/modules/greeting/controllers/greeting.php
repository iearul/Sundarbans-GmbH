<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Greeting extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 CoreZ IT.
         * @author      Tanveer Agmed Ivan
         * @version 	1.0.1
         * 
	 */
        function __construct()
	{
		parent::__construct();
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
        }
        function index(){
            $this->form_validation->set_rules('greeting', 'Greeting', 'required');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'greeting'   => $this->input->post('greeting')
                );
                
                $where['id'] = 1;
                $this->CoreZ_IT->update('site',$values,$where);
                $this->session->set_flashdata('message','Your Settings has been updated.');
                redirect('greeting', 'refresh');
            }
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'Greeting';
            $this->CoreZ_IT->_render_backend('index', $data);
        }   
}