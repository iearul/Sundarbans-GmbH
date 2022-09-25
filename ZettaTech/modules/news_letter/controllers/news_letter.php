<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_letter extends CZ_Controller{

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
                
        }
        function all(){
            if(!$this->ion_auth->logged_in())
            {
                    //redirect them to the login page
                    redirect('user/login', 'refresh');
            }
            $data['subscribers'] = $this->CoreZ_IT->get('subscribers')->result();
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'All Subscribers';
            $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
            if(!$this->ion_auth->logged_in())
            {
                    //redirect them to the login page
                    redirect('user/login', 'refresh');
            }
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[subscribers.email]');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'email'             => $this->input->post('email'),
                    'url'               => $this->CoreZ_IT->url_check($this->input->post('email'), 'subscribers'),
                    'status' => ($this->input->post('status') == 'active' ? 1 : 0 )
                );
                
                $this->CoreZ_IT->insert('subscribers',$values);
                $this->session->set_flashdata('message','Subscriber Successfully Added.');
                redirect('news_letter/all','refresh');
            }
            $data['email'] = array(
                'class' => 'form-control',
                'name'  => 'email',
                'type'  => 'email',
                'value' => $this->form_validation->set_value('email'),
            );
            
            $data['status_value'] = array(
                'active'     => 'Active',
                'In-Active'  => 'In-Active'
            );
            $data['status_name'] = 'status';
            $data['status_selected'] = $this->form_validation->set_value('status', 'active');
            $data['dropdown_class'] = 'class="form-control"';
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'Add Subscriber';
            $this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($url = NULL){
            if(!$this->ion_auth->logged_in())
            {
                    redirect('user/login', 'refresh');
            }
            if(empty($url)){
                $this->session->set_flashdata('message_error','Subscriber Not Exists.');
                redirect('news_letter/all','refresh');
            }
            $where = array(
                    'url'   => $url
            );
            $data['subscriber'] = $this->CoreZ_IT->get_where('subscribers', $where)->row();
            if(empty($data['subscriber']->url)){
                $this->session->set_flashdata('message_error','Subscriber Not Exists.');
                redirect('news_letter/all','refresh');
            }
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[subscribers.email]');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'email'             => $this->input->post('email'),
                    'status'            => ($this->input->post('status') == 'active' ? 1 : 0 )
                );
                
                $this->CoreZ_IT->update('subscribers', $values, $where);
                $this->session->set_flashdata('message','Subscriber Successfully Updated.');
                redirect('news_letter/all','refresh');
            }
            $data['email'] = array(
                'class' => 'form-control',
                'name'  => 'email',
                'type'  => 'email',
                'value' => $this->form_validation->set_value('email', $data['subscriber']->email),
            );
            
            $data['status_value'] = array(
                'active'     => 'Active',
                'In-Active'  => 'In-Active'
            );
            $data['status_name'] = 'status';
            $data['status_selected'] = $this->form_validation->set_value('status', ($data['subscriber']->status == 1 ? 'active' : 'In-Active'));
            $data['dropdown_class'] = 'class="form-control"';
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'Edit Subscriber';
            $this->CoreZ_IT->_render_backend('edit', $data);
        }
        function activate($url = NULL)
	{       
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $product = $this->CoreZ_IT->get_where('subscribers',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Subscriber Not Exists.');
                }else{
                    $values = array(
                        'status'  => 1
                    );
                    $this->CoreZ_IT->update('subscribers', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Subscriber Successfully Activated.');
                }
                redirect('news_letter/all', 'refresh');
	}

	function deactivate($url = NULL)
	{
		if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $product = $this->CoreZ_IT->get_where('subscribers',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Subscriber Not Exists.');
                }else{
                    $values = array(
                        'status'  => 0
                    );
                    $this->CoreZ_IT->update('subscribers', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Subscriber Successfully De-activated.');
                }
                redirect('news_letter/all', 'refresh');
	}
        function send(){
            if(!$this->ion_auth->logged_in())
            {
                    //redirect them to the login page
                    redirect('user/login', 'refresh');
            }
            $this->form_validation->set_rules('news_letter', 'Mail', 'required');
            if ($this->form_validation->run() == true)
            {
                $values = array(
                    'news_letter'   => $this->input->post('news_letter')
                );
                
                $where['id'] = 1;
                $this->CoreZ_IT->update('site',$values,$where);
                $where = array(
                    'status' => 1
                );
                $subscribers = $this->CoreZ_IT->get_where('subscribers', $where)->result();
                foreach($subscribers as $subscribe){
                    $this->load->config('ion_auth', TRUE);
                    $this->load->library(array('email'));
                    $message = $this->input->post('news_letter');
                    $this->email->clear();
                    $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                    $this->email->to($subscribe->email);
                    $this->email->subject($this->config->item('site_title', 'ion_auth') . ' - ' . 'Newsletter');
                    $this->email->message($message);
                    $this->email->send();
                }
                $this->session->set_flashdata('message','Newsletter has been sent.');
                redirect('news_letter/send', 'refresh');
            }
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
            $data['page_title'] = 'Send News Letter';
            $this->CoreZ_IT->_render_backend('send', $data);
        }
        public function newsletterSubscribes()
        {
            
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[subscribers.email]');
                $this->form_validation->set_message('is_unique', 'This Email already exists.');
                
                if($this->form_validation->run() == TRUE)
                {
                    $values = array(
                        'email'             => $this->input->post('email'),
                        'url'               => $this->CoreZ_IT->url_check($this->input->post('email'), 'subscribers'),
                        'status'            => 1
                    );
                    
                    $saveSubscribeData = $this->CoreZ_IT->insert('subscribers',$values);
                    if($saveSubscribeData)
                    {
                        echo '<span style="color: #2CB673;">Successfully Subscribed</span>';
                    }
                    else
                    {
                        echo 'Something went wrong';
                    }
                }
                else{
                    echo '<span style="color: #a94442;">'.strip_tags(validation_errors()).'</span>  ';
                }

        }
        
}
