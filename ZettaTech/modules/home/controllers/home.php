<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CZ_Controller{

	/**
         * 
         * @copyright	Copyright (c) 2015 CoreZ IT.
         * @copyright   Tanveer Agmed Ivan
         * @version 	1.0.0
         * 
	 */
        function __construct()
	{
		
        }
        function index(){
            $data['sliders'] = $this->CoreZ_IT->get('sliders')->result();
            $where = array(
                'featured'  => 1,
                'status'    =>1
            );
            $data['products'] = $this->CoreZ_IT->get_where('products', $where)->result();
            $this->CoreZ_IT->order_by("id","desc");
            $where = array(
                'status'    =>1
            );
            $data['recents'] = $this->CoreZ_IT->get_where('products',$where,6)->result();
            $categories = $this->CoreZ_IT->get_where('categories', $where)->result();
            $data['categories'] = array();
            foreach($categories as $category){
                $data['categories'][$category->url] = $category;
            }
            $data['page_title'] = 'Home';
            $this->CoreZ_IT->_render_frontend('index', $data);
        }
        
}  

/* End of file home.php */
/* Location: pi/modules/fileupload/controllers/home.php */