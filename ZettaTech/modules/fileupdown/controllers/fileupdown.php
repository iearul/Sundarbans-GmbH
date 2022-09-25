<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileupdown extends CZ_Controller {
    
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
        
        /*
         * index() read Excel Files
         * For xlsx file use Excel2007
         * For xls  file use Excel5
         */
        
        public function download_attached($url = NULL){ 
            if(empty($url)){
                $this->session->set_flashdata('message_error', 'File not Exists.');
                redirect('','refresh');
            }
            $file = $this->CoreZ_IT->get_where('attached', array('url' => $url))->row();
            if(empty($file)){
                $this->session->set_flashdata('message_error', 'File not Exists.');
                redirect('','refresh');
            }
            if(file_exists("uploads/attached/".$file->file)){
                $this->load->helper('download');
                $data = file_get_contents(base_url()."uploads/attached/".$file->file);
                $name = $file->title.$file->file_ext;
                force_download($name, $data);
            }else{
                $this->session->set_flashdata('message_error', 'File not Exists.');
                redirect('','refresh');
            }
            
        }
}