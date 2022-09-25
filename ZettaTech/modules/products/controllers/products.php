<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CZ_Controller{

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
        function index($url = NULL){              
            $where = array('status' => 1);
            $data['categories'] = $this->CoreZ_IT->get_where('categories',$where)->result();
            
            $where = array( 
                'status'        => 1
            );
            $data['products'] = $this->CoreZ_IT->get_where('products', $where)->result();
            $data['page_title'] = 'Products';
            $this->CoreZ_IT->_render_frontend('index', $data);
        }
        function category($url = NULL){
            if(empty($url))
            {
                redirect('products');
            }
            $where = array('url' => $url, 'status' => 1);
            $data['category'] = $this->CoreZ_IT->get_where('categories',$where)->row();
            if(empty($data['category'])){
                $this->session->set_flashdata('message_error','Product Not Exists.');
                redirect('products');
            }
            $where = array('status' => 1);
            $data['categories'] = $this->CoreZ_IT->get_where('categories',$where)->result();
            $where = array( 
                'category_url'  => $url,
                'status'        => 1
            );
            $data['products'] = $this->CoreZ_IT->get_where('products', $where)->result();
            
            $data['page_title'] = 'Products';
            $this->CoreZ_IT->_render_frontend('category', $data);
        }
        function details($url = NULL){
            if(empty($url))
            {
                redirect('products');
            }
            $where = array('url' => $url);
            $data['product'] = $this->CoreZ_IT->get_where('products',$where)->row();
            if(empty($data['product'])){
                redirect('products');
            }
            $this->CoreZ_IT->order_by("id","desc");
            $where = array(
                'status'    =>1
            );
            $data['recents'] = $this->CoreZ_IT->get_where('products',$where,6)->result();
            $data['message'] = $this->session->flashdata('message');
            $data['message_error'] = $this->session->flashdata('message_error');                
            $data['page_title'] = 'Products';
            $this->CoreZ_IT->_render_frontend('details', $data);
        }
        function all(){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $data['products'] = $this->CoreZ_IT->get('products')->result();
                $categories = $this->CoreZ_IT->get('categories')->result();
                $data['categories'] = array();
                foreach($categories as $category){
                    $data['categories'][$category->url] = $category;
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
                
                $data['page_title'] = 'All Products';
                $this->CoreZ_IT->_render_backend('all', $data);
        }
        function add(){
                $this->form_validation->set_rules('name', 'Title', 'required');
                $this->form_validation->set_rules('subtitle', 'Sub Title', '');
                $this->form_validation->set_rules('category', 'Category', 'required');
                if ($this->form_validation->run() == true)
                {
                    $url = $this->input->post('name');
                    $values = array(
                        'url'           => $this->CoreZ_IT->url_check($url, 'products'),
                        'name'          => $this->input->post('name'),
                        'subtitle'      => $this->input->post('subtitle'),
                        'category_url'  => $this->input->post('category'),
                        'featured'      => ($this->input->post('featured') == 'featured' ? 1 : 0 ),
                        'status'        => ($this->input->post('status') == 'active' ? 1 : 0 )
                    );
                    $config['upload_path']      = './uploads/products/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '2048';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('product')){
                        $upload_data = $this->upload->data();
                        $values['image'] = $upload_data['file_name'];
                        $attributes_title = $this->input->post('attributes_title');
                        $attributes_value = $this->input->post('attributes_value');
                        $attributes = array();
                        foreach($attributes_title as $key => $att){
                            if(!empty($attributes_title[$key]) && !empty($attributes_value[$key])){
                                $attributes[] = array(
                                    'title' => $attributes_title[$key],
                                    'value' => $attributes_value[$key]
                                );
                            }
                        }
                        $values['attributes'] = json_encode($attributes);
                        $images = array();
                        if(!empty($_FILES['attached'])){
                            $attached_files = $_FILES['attached'];
                            if(!empty($attached_files['name'])){
                                foreach($attached_files['name'] as $key => $attached_file){
                                    $_FILES['images']['name']= $attached_files['name'][$key];
                                    $_FILES['images']['type']= $attached_files['type'][$key];
                                    $_FILES['images']['tmp_name']= $attached_files['tmp_name'][$key];
                                    $_FILES['images']['error']= $attached_files['error'][$key];
                                    $_FILES['images']['size']= $attached_files['size'][$key];
                                    if($this->upload->do_upload('images')){
                                        $Qfile = $this->upload->data();
                                        $images[] = $Qfile['file_name'];
                                    }
                                }
                            }
                        }
                        $values['images'] = json_encode($images);
                        $this->CoreZ_IT->insert('products', $values);
                        $this->session->set_flashdata('message','Product Successfully Added.');
                        redirect('products/all');
                    }
                    $data['message_error'] = $this->upload->display_errors();
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (!empty($data['message_error'])) ? $data['message_error'] : ((validation_errors()) ? validation_errors() : $this->session->flashdata('message_error'));
                
                $data['name'] = array(
                    'class' => 'form-control',
                    'name'  => 'name',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('name'),
                );
                $data['subtitle'] = array(
                    'class' => 'form-control',
                    'name'  => 'subtitle',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('subtitle'),
                );
                $data['status_value'] = array(
                    'active'     => 'Active',
                    'In-Active'  => 'In-Active'
                );
                $data['status_name'] = 'status';
                $data['status_selected'] = $this->form_validation->set_value('status', 'active');
                $data['featured_value'] = array(
                    'featured'   => 'Featured',
                    'Un-featured'  => 'Un-Featured'
                );
                $data['featured_name'] = 'featured';
                $data['featured_selected'] = $this->form_validation->set_value('featured', 'featured');
                $data['dropdown_class'] = 'class="form-control"';
                $data['categories'] = $this->CoreZ_IT->get('categories')->result();
                $data['page_title'] = 'Add Product';
                $this->CoreZ_IT->_render_backend('add', $data);
        }
        function edit($url = NULL){
                if(empty($url))
                {
                    redirect('products/all');
                }
                $where = array('url' => $url);
                $data['product'] = $this->CoreZ_IT->get_where('products',$where)->row();
                if(empty($data['product'])){
                    $this->session->set_flashdata('message_error','Product Not Exists.');
                    redirect('products/all');
                }
                
                $this->form_validation->set_rules('name', 'Title', 'required');
                $this->form_validation->set_rules('subtitle', 'Sub Title', '');
                $this->form_validation->set_rules('category', 'Category', 'required');
                if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'url'           => $this->CoreZ_IT->url_check($this->input->post('name'), 'products'),
                        'name'          => $this->input->post('name'),
                        'subtitle'      => $this->input->post('subtitle'),
                        'category_url'  => $this->input->post('category'),
                        'featured'      => ($this->input->post('featured') == 'featured' ? 1 : 0 ),
                        'status'        => ($this->input->post('status') == 'active' ? 1 : 0 )
                    );
                    $config['upload_path']      = './uploads/products/';
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '2048';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('photo')){
                        $upload_data = $this->upload->data();
                        $values['image'] = $upload_data['file_name'];
                    }
                    $attributes_title = $this->input->post('attributes_title');
                    $attributes_value = $this->input->post('attributes_value');
                    $attributes = array();
                    if(!empty($attributes_title)){
                        foreach($attributes_title as $key => $att){
                            if(!empty($attributes_title[$key]) && !empty($attributes_value[$key])){
                                $attributes[] = array(
                                    'title' => $attributes_title[$key],
                                    'value' => $attributes_value[$key]
                                );
                            }
                        }
                    }
                    $values['attributes'] = json_encode($attributes);
                    if(!empty($_FILES['attached'])){                        
                        $attached_files = $_FILES['attached'];
                        $images = json_decode($data['product']->images,true);
                        if(!empty($attached_files['name'])){
                            foreach($attached_files['name'] as $key => $attached_file){
                                $_FILES['images']['name']= $attached_files['name'][$key];
                                $_FILES['images']['type']= $attached_files['type'][$key];
                                $_FILES['images']['tmp_name']= $attached_files['tmp_name'][$key];
                                $_FILES['images']['error']= $attached_files['error'][$key];
                                $_FILES['images']['size']= $attached_files['size'][$key];
                                if($this->upload->do_upload('images')){
                                    $Qfile = $this->upload->data();
                                    $images[] = $Qfile['file_name'];
                                }
                            }
                        }
                        $values['images'] = json_encode($images);
                    }
                    $this->CoreZ_IT->update('products', $values, $where);
                    $this->session->set_flashdata('message','Product Successfully Updated.');
                    redirect('products/all');
                    
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                
                $data['name'] = array(
                    'class' => 'form-control',
                    'name'  => 'name',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('name', $data['product']->name),
                );
                $data['subtitle'] = array(
                    'class' => 'form-control',
                    'name'  => 'subtitle',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('subtitle', $data['product']->subtitle),
                );
                $data['status_value'] = array(
                    'active'     => 'Active',
                    'In-Active'  => 'In-Active'
                );
                $data['status_name'] = 'status';
                $data['status_selected'] = $this->form_validation->set_value('status', ($data['product']->status == 1 ? 'active' : 'In-Active'));
                $data['featured_value'] = array(
                    'featured'   => 'Featured',
                    'Un-featured'  => 'Un-Featured'
                );
                $data['featured_name'] = 'featured';
                $data['featured_selected'] = $this->form_validation->set_value('featured', ($data['product']->featured == 1 ? 'featured' : 'Un-featured'));
                $data['dropdown_class'] = 'class="form-control"';
                $data['categories'] = $this->CoreZ_IT->get('categories')->result();
                $data['page_title'] = 'Edit Product';
                $this->CoreZ_IT->_render_backend('edit', $data);
        }
        function activate($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 1
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully Activated.');
                }
                redirect('products/all', 'refresh');
	}

	function deactivate($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Category Not Exists.');
                }else{
                    $values = array(
                        'status'  => 0
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Category Successfully De-activated.');
                }
                redirect('products/all', 'refresh');
	}
        function featured($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                }else{
                    $values = array(
                        'featured'  => 1
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Product Successfully Activated.');
                }
                redirect('products/all', 'refresh');
	}

	function un_featured($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                }else{
                    $values = array(
                        'featured'  => 0
                    );
                    $this->CoreZ_IT->update('products', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Product Successfully De-activated.');
                }
                redirect('products/all', 'refresh');
	}
        function delete($url){
                $data['products'] = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
                if(empty($data['products'])){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                    redirect('products/all', 'refresh');
                }
                $path_to_file = 'uploads/products/'.$data['products']->image;
                if(file_exists($path_to_file))unlink($path_to_file);
                $this->CoreZ_IT->delete('products',array('url' => $url));
                $this->session->set_flashdata('message','Product successfully deleted.');
                redirect('products/all', 'refresh');
               
        }
        function deleteImage($url,$key){
                $data['products'] = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
                if(empty($data['products'])){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                    redirect('products/all', 'refresh');
                }
                $img = array();
                $images = json_decode($data['products']->images,true); 
                foreach($images as $k => $image){
                    if($key == $k){
                        $path_to_file = 'uploads/products/'.$image;
                        if(file_exists($path_to_file))unlink($path_to_file);
                    }else{
                        $img[] = $image;
                    }
                }
                $values = array( 'images' => json_encode($img));
                $this->CoreZ_IT->update('products', $values, array('url' => $url));
                $this->session->set_flashdata('message','Product Image deleted.');
                redirect('products/edit/'.$url, 'refresh');
               
        }
        public function enquiry($url = NULL){
		$product = $this->CoreZ_IT->get_where('products',array('url' => $url))->row();
		if(empty($product)){
                    $this->session->set_flashdata('message_error', 'Product Not Exists.');
                    redirect('products', 'refresh');
                }
                $this->form_validation->set_rules('fullname', 'Full Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('phone', 'Phone', 'required');
                $this->form_validation->set_rules('company', 'Company Name', 'required');
                $this->form_validation->set_rules('enquiry', 'Message', 'required');
                if ($this->form_validation->run() == true)
                {
                    $values = array(
                        'fullname'      => $this->input->post('fullname'),
                        'email'         => $this->input->post('email'),
                        'phone'         => $this->input->post('phone'),
                        'company'       => $this->input->post('company'),
                        'color'       => $this->input->post('color'),
                        'quantity'         => $this->input->post('quantity'),
                        'fabrics'       => $this->input->post('fabrics'),
                        'psize'       => $this->input->post('psize'),
                        'gsm'         => $this->input->post('gsm'),
                        'ppcrt'       => $this->input->post('ppcrt'),
                        'enquiry'       => $this->input->post('enquiry'),
                        'product'       => $product,
                        'time'          => time()
                    );
                    $this->load->config('ion_auth', TRUE);
                    $this->load->library(array('email'));
                    $message = $this->load->view('enquiry',$values,true);
                    $this->email->clear();
                    $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                    $this->email->to('sales@sundarbans-gmbh.de');
                    $this->email->to('iearul.abid@gmail.com');
                    $this->email->subject('Product Enquery' . ' - ' . $product->name);
                    $this->email->message($message);
                    $this->email->send();
                    $this->session->set_flashdata('message', 'Enquiry / Customize Order Successfully Submited.');
                }
                redirect('products/details/'.$url, 'refresh');
                
        }
}
