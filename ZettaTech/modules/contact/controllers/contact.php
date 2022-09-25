<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CZ_Controller{

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
            $data['page_title'] = 'Contact Us';
            $this->CoreZ_IT->_render_frontend('index', $data);
        } 
}