<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_protection extends CZ_Controller{

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
            $data['page_title'] = 'Data Protection';
            $this->CoreZ_IT->_render_frontend('index', $data);
        }
        function edit(){
            if(!$this->ion_auth->logged_in())
            {
                    //redirect them to the login page
                    redirect('user/login', 'refresh');
            }
            $this->form_validation->set_rules('data_protection', 'Data Protection', 'required');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'data_protection'  => $this->input->post('data_protection')
                );
                
                $where['id'] = 1;
                $this->CoreZ_IT->update('site',$values,$where);
                $this->session->set_flashdata('message','Your Data Protection info is been updated.');
                redirect('data_protection/edit', 'refresh');
            }
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'Data Protection';
            $this->CoreZ_IT->_render_backend('edit', $data);
        }   
}