<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* Name:  CoreZ IT
*
* Version: 1.0.1
*
* Author: Tanveer Ahmed Ivan
*
* Created:  07.09.2015
*
* Requirements: PHP5 or above
*
*/

class Corez_it extends CI_Model
{
	
	public function __construct(){
            date_default_timezone_set('Asia/Dacca');
        }
        public function select($select = '*', $escape = NULL){
            $this->db->select($select, $escape);
        }
        public function select_max($select = '', $alias = ''){
            $this->db->select_max($select, $alias);
        }
        public function select_min($select = '', $alias = ''){
            $this->db->select_min($select, $alias);
        }
        public function select_avg($select = '', $alias = ''){
            $this->db->select_avg($select, $alias);
        }
        public function select_sum($select = '', $alias = ''){
            $this->db->select_sum($select, $alias);
        }
        public function join($table, $cond, $type = ''){
            $this->db->join($table, $cond, $type);
        } 
        public function where($key, $value = NULL, $escape = TRUE){
            $this->db->where($key, $value, $escape);
	}
        public function or_where($key, $value = NULL, $escape = TRUE){
            $this->db->where($key, $value, $escape);
	}
        public function where_in($key = NULL, $values = NULL){
            $this->db->where_in($key, $values);
	}
        public function or_where_in($key = NULL, $values = NULL){
            $this->db->or_where_in($key, $values);
	}
        public function where_not_in($key = NULL, $values = NULL){
            $this->db->where_not_in($key, $values);
	}
        public function or_where_not_in($key = NULL, $values = NULL){
            $this->db->or_where_not_in($key, $values);
	}
        public function like($field, $match = '', $side = 'both'){
	    $this->db->like($field, $match, $side);
	}
        public function not_like($field, $match = '', $side = 'both'){
	    $this->db->not_like($field, $match, $side);
	}
        public function or_like($field, $match = '', $side = 'both'){
            $this->db->or_like($field, $match, $side);
	}
        public function or_not_like($field, $match = '', $side = 'both'){
            $this->db->or_not_like($field, $match, $side);
	}
        public function group_by($by){
            $this->db->group_by($by);
        }
        public function distinct($val = TRUE){
	    $this->db->distinct($val);
	}
        public function having($key, $value = '', $escape = TRUE){
            $this->db->having($key, $value, $escape);
	}
        public function or_having($key, $value = '', $escape = TRUE){
            $this->db->or_having($key, $value, $escape);
	}
        public function order_by($orderby, $direction = ''){
            $this->db->order_by($orderby, $direction);
        }
        public function limit($value, $offset = ''){
            $this->db->limit($value, $offset);
        }
        public function offset($offset){
            $this->db->offset($offset);
        }
        public function set($key, $value = '', $escape = TRUE){
            $this->db->set($key, $value, $escape);
        }
        public function get($table = '', $limit = null, $offset = null){
            return $result = $this->db->get($table, $limit, $offset);
        }
        
        /*
         * 
         *  function count_all_results()
         * 
         *  Changed form DB class.
         *  added where option for faster codeing.
         * 
         */        
        
        public function count_all_results($table,$where = NULL){
            if(!empty($where))$this->db->where($where);
            return $total = $this->db->count_all_results($table);
        }
        public function get_where($table = '', $where = null, $limit = null, $offset = null){
            return $result = $this->db->get_where($table, $where, $limit, $offset);
        }
        public function insert_batch($table = '', $values = NULL){
            return $result = $this->db->insert_batch($table, $values);
        }
        public function set_insert_batch($key, $value = '', $escape = TRUE){
            $this->db->set_insert_batch($key, $value, $escape);
        }
        public function insert($table, $values){
            return $result = $this->db->insert($table, $values);
        }
        public function replace($table = '', $set = NULL){
            return $result = $this->db->replace($table, $set);
        }
        public function update($table = '', $values = NULL, $where = NULL, $limit = NULL){
            return $result = $this->db->update($table, $values, $where, $limit);
        }
        public function update_batch($table = '', $values = NULL, $index = NULL){
            return $result = $this->db->update_batch($table, $values, $index);
        }
        public function set_update_batch($key, $index = '', $escape = TRUE){
            return $result = $this->db->set_update_batch($key, $index, $escape);
        }
	public function delete($table = '', $where = '', $limit = NULL, $reset_data = TRUE){
            return $result = $this->db->delete($table, $where, $limit, $reset_data);
        }
              
        

        private function makecomma($input){
            // This function is written by some anonymous person - I got it from Google
            if(strlen($input)<=2)
            { return $input; }
            $length=substr($input,0,strlen($input)-2);
            $formatted_input = $this->makecomma($length).",".substr($input,-2);
            return $formatted_input;
        }

        public function MoneyBDT($num){
            // This is my function
            $pos = strpos((string)$num, ".");
            if ($pos === false) { $decimalpart="00";}
            else { $decimalpart= substr($num, $pos+1, 2); $num = substr($num,0,$pos); }

            if(strlen($num)>3 & strlen($num) <= 12){
                        $last3digits = substr($num, -3 );
                        $numexceptlastdigits = substr($num, 0, -3 );
                        $formatted = $this->makecomma($numexceptlastdigits);
                        $stringtoreturn = $formatted.",".$last3digits ;
            }elseif(strlen($num)<=3){
                        $stringtoreturn = $num ;
            }elseif(strlen($num)>12){
                        $stringtoreturn = number_format($num, 2);
            }

            if(substr($stringtoreturn,0,2)=="-,"){$stringtoreturn = "-".substr($stringtoreturn,2 );}

            return $stringtoreturn;
        }
        
        public function TimeDifference($date){
            
            $diff = $date - time();
            if($diff < 1){
                return $value = array('int'=>0,'string'=>'minutes');
            }
            $temp = $diff/86400; 
            $days = floor($temp); 
            if($days > 1){
                return $value = array('int'=>$days,'string'=>'days'); 
            }
            $temp=24*($temp-$days); 
            $hours = floor($temp); 
            if($hours > 1){
                return $value = array('int'=>$hours,'string'=>'hours'); 
            }
            $temp = 60*($temp-$hours); 
            $minutes = floor($temp); 
            if($minutes > 1){
                return $value = array('int'=>$minutes,'string'=>'minutes');
            }
            return $value = array('int'=>1,'string'=>'minute'); 
        }
        
        public function plural( $count, $text ) { 
            $count = floor($count);
            return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
        }
 
        public function ago( $date ) {
            $interval = time() - $date;
            if ( ($interval/(60*60*24*365)) >= 1 ) return $this->plural( $interval/(60*60*24*365), 'year' );
            if ( ($interval/(60*60*24*30)) >= 1 ) return $this->plural( $interval/(60*60*24*30), 'month' );
            if ( ($interval/(60*60*24)) >= 1 ) return $this->plural( $interval/(60*60*24), 'day' );
            if ( ($interval/(60*60)) >= 1 ) return $this->plural( $interval/(60*60), 'hour' );
            if ( ($interval/(60)) >= 1 ) return $this->plural( $interval/(60), 'minute' );
            return $this->plural( $interval, 'second' );
        }
        
        public function getUrlFriendlyString($str){
                $str = preg_replace("/[-]+/", "-", preg_replace("/[^a-z0-9-]/", "", strtolower( str_replace(" ", "-", $str))));
                return $str;
        }
        
        public function url_check($url = '', $table){
                if (empty($url))
                {
                        return FALSE;
                }
                $url = $this->getUrlFriendlyString($url);
                $original_url = $url;
                for($i = 1; $this->db->where('url', $url)->count_all_results($table) > 0; $i++)$url = $original_url.'-'. $i;
                return $url;
        }
        
        public function _render_backend($view, $data=null, $render=false){

		$viewdata = (empty($data)) ? $data: $data;
                $viewdata['site'] = $this->get('site')->row();
                $viewdata['controller'] = $this->uri->segment(1, 'dashboard');
                $viewdata['method'] = $this->uri->segment(2, 'index');
                $viewdata['user'] = $this->ion_auth->user()->row();
                $view_html = $this->load->view('backend/header', $viewdata, $render);
		$view_html .= $this->load->view($view);
                $view_html .= $this->load->view('backend/footer');

		if (!$render) return $view_html;
	}
        public function _render_frontend($view, $data=null, $render=false){

		$viewdata = (empty($data)) ? $data: $data;
                $viewdata['site'] = $this->get('site')->row();
                $viewdata['controller'] = $this->uri->segment(1, 'home');
                $viewdata['method'] = $this->uri->segment(2, 'index');
                $viewdata['parameter'] = $this->uri->segment(3, 'index');
                $viewdata['user'] = $this->ion_auth->user()->row();
                $view_html = $this->load->view('frontend/header', $viewdata, $render);
		$view_html .= $this->load->view($view);
                $view_html .= $this->load->view('frontend/footer');

		if (!$render) return $view_html;
	}
        public function send_sms($phone, $text){
                $postUrl = "http://api.bulksms.icombd.com/api/sendsms/xml";
                // XML-formatted data
                $xmlString =
                '<SMS>
                <authentification>
                <username>iearul.abid</username>
                <password>lO8HqYRl</password>
                </authentification>
                <message>
                <sender>CoreZ IT</sender>
                <text>'.$text.'</text>
                </message>
                <recipients>
                <gsm>88'.$phone.'</gsm>
                </recipients>
                </SMS>';
                // previously formatted XML data becomes value of 'XML" POST variable
                $fields = "XML=" . urlencode($xmlString);
                // in this example, POST request was made using PHP's CURL
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $postUrl);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                // response of the POST request
                $res = curl_exec($ch);
                curl_close($ch);
                // write out the response
                //echo $response;

        }
        function random_string($qtd){ 
            $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZabcdefghijklmnopqrstuvwxyz0123456789'; 
            $QuantidadeCaracteres = strlen($Caracteres); 
            $QuantidadeCaracteres--; 

            $Hash=NULL; 
                for($x=1;$x<=$qtd;$x++){ 
                    $Posicao = rand(0,$QuantidadeCaracteres); 
                    $Hash .= substr($Caracteres,$Posicao,1); 
                } 

            return $Hash; 
        }
        public function textToHTML($str){
                $order   = array("  ");
                $replace = '&nbsp;&nbsp;';
                $str = str_replace($order, $replace, $str);
                $order   = array("\r\n", "\n", "\r");
                $replace = '<br />';
                $str = str_replace($order, $replace, $str);
                $order   = array("\t");
                $replace = '&nbsp;&nbsp;&nbsp;&nbsp;';
                $newstr = str_replace($order, $replace, $str);
                return $newstr;
        }
}
