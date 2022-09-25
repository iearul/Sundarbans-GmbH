<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CZ_Controller{

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
        function all(){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['categories'] = $this->CoreZ_IT->get('categories')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'All Categories';
                $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
            $this->form_validation->set_rules('title', 'Title', 'required');
            if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'url'           => $this->CoreZ_IT->url_check($this->input->post('title'), 'categories'),
                        'title'         => $this->input->post('title'),
                        'status'        => 1
                    );
                    $url = $values['url'];
                    $this->CoreZ_IT->insert('categories', $values);
                    $this->session->set_flashdata('message', 'Category Successfully Added');                    
                }
                
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');

                $data['title'] = array(
                    'class' => 'form-control',
                    'name'  => 'title',
                    'type'  => 'text',
                );
                $data['page_title'] = 'Create Category';
                $this->CoreZ_IT->_render_backend('add', $data);
            
        }
        function edit($url){
            $data['category'] = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
                if(empty($data['category'])){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                    redirect('categories/all', 'refresh');
                }
            $this->form_validation->set_rules('title', 'Title', 'required');
            if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'title'         => $this->input->post('title'),
                        'status'        => 1
                    );
                    $this->CoreZ_IT->update('categories', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully Updated');
                    
                }
                
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');

                $data['title'] = array(
                    'class' => 'form-control',
                    'name'  => 'title',
                    'type'  => 'text',
                    'value' => $data['category']->title
                );
                $data['page_title'] = 'Create Category';
                $this->CoreZ_IT->_render_backend('edit', $data);
        }
        function activate($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $product = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 1
                    );
                    $this->CoreZ_IT->update('categories', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully Activated.');
                }
                redirect('categories/all', 'refresh');
	}

	function deactivate($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$product = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 0
                    );
                    $this->CoreZ_IT->update('categories', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully De-activated.');
                }
                redirect('categories/all', 'refresh');
	}
        function delete($url){
                $data['categories'] = $this->CoreZ_IT->get_where('categories',array('url' => $url))->row();
                if(empty($data['categories'])){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                    redirect('categories/all', 'refresh');
                }
                $data['product'] = $this->CoreZ_IT->get_where('products',array('category_url' => $url))->row();
                if(!empty($data['product']->url)){
                    $this->session->set_flashdata('message_error', 'Please Edit Products First.');
                    redirect('categories/all', 'refresh');
                }
                $this->CoreZ_IT->delete('categories',array('url' => $url));
                $this->session->set_flashdata('message','Category successfully deleted.');
                redirect('categories/all', 'refresh');
               
        }
}
