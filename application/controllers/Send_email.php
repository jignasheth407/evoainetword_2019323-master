<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Send_email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function sendmail()
	{
		$CI =& get_instance();
        $CI->load->library('email');

        $CI->email->from('info@evoai.network', 'Evoai network');
        $CI->email->to('evoainetwork@gmail.com');
        $CI->email->subject('This is for test email');
        $CI->email->message('Email subject for test');
        $CI->email->send();
	}
}
?>