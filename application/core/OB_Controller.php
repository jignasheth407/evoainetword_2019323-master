<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * OB_Controller
 * 
 * OB_Controller Controller Class
 *
 * @access  public
 * @author  Enliven Applications
 * @version 3.0
 * 
*/
class OB_Controller extends CI_Controller
{

	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @return  null
     */
	public function __construct()
	{
		// here's where we'll autoload all the site specific stuff
		// from the database... 
		parent::__construct();

		//$this->output->enable_profiler($this->config->item('enable_profiler'));
		
		$this->benchmark->mark('my_controller_start');

		$this->load->library('obcore');
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->Ref_UserEmail = $this->session->userdata('Ref_UserEmail');
		$data['Ref_UserEmail'] = $this->session->userdata('Ref_UserEmail');
		$this->Ref_UserName = $this->session->userdata('Ref_UserName');
		$this->data['evot_details'] = $this->db->get_where('value_and_bonus', array('id'=>1))->row();
		// Set default language. The user can
		// choose to overwrite session data or the
		// site owner can choose to use a different language
		if ( ! $this->session->language )
		{
			$this->obcore->set_lang();
		}

		// we use this everywhere
		$this->load->library('ion_auth');
		$this->load->model('Blog_m');
		$this->load->language('blog', $this->session->language);

		// get theme info
		$theme = $this->obcore->get_active_theme();

		// get all the settings from the db
		$settings = $this->obcore->db_to_config();

		if ($this->config->item('site_name'))
		{
			$this->template->title($this->config->item('site_name'));
		}

		// because PITassets...
		Asset::set_url(base_url());
		Asset::add_path('core', base_url('application/themes/' . $theme->path . '/'));
		$this->template->set_theme($theme->path);

		// let's set up default places for template partials.
		// all of these can be used or not as needed.
		$this->template
				->set_partial('nav', 'nav')
				->set_partial('archives', 'archives')
				->set_partial('categories', 'categories')
				->set_partial('notices', 'notices')
				->set_partial('links', 'links')
				->set_partial('social', 'social');

		$this->template
				->set('admin_nav', $this->ion_auth->get_permissions_dropdown())
				->set('lang_picker', $this->obcore->get_lang_options())
				->set('nav', $this->obcore->get_navigation())
				->set('archives_list', $this->Blog_m->get_archive())
				->set('links_list', $this->Blog_m->get_links())
				->set('categories_list', $this->Blog_m->get_categories())
				->set('social_list', $this->obcore->generate_social_links());

		$this->benchmark->mark('my_controller_end');
	}
	
	/*	Check Session Admin */
	public function checkSessionAdmin() 
	{
		$session = $this->session->all_userdata();			
		if(empty($session['admin_id']))
		{
			return false;		
		}
		if (isset($session['admin_id']))
		{
            $this->user = $session['admin_name'];
            $this->email = $session['admin_email'];
			$this->admin_id = $session['admin_id'];
			return true;
        }
	}
	
	/* load the view files with dynamic data pass from method in Backend */
	public function show_viewAdmin($view, $data = '') 
	{    
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar'); 
		$this->load->view($view, $data);
		$this->load->view('admin/layout/footer');
    }
	
	/* load the view files with dynamic data pass from method in front end without slider */
	public function show_viewFrontInner($view, $data = '') 
	{    
		$data['myobj'] = $this;
		$this->load->view('layout/header',$data);
		$this->load->view($view, $data);
		$this->load->view('layout/footer');	
    }
	
	/* Upload Image */
	public function ImageUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		//$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$filenew =  str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png | PDF | pdf';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
}


/**
 * OB_AdminController
 * 
 * OB_AdminController Controller Class
 *
 * @access  public
 * @author  Enliven Applications
 * @version 3.0
 * 
*/
class OB_AdminController extends CI_Controller
{

	/**
     * Construct
     *
     * @access  public
     * @author  Enliven Applications
     * @version 3.0
     * 
     * @return  null
     */
	public function __construct()
	{
		parent::__construct();

		// start benchmarking...
		$this->benchmark->mark('admin_controller_start');
		
		// make sure the db is up to date
		// using automated migrations. This
		// is ONLY done in admin as it's a
		// potential security risk, so we'll
		// at least try to keep all that behind
		// a login.
		$this->load->library('migration');

        if ($this->migration->latest() === FALSE)
        {
                show_error($this->migration->error_string());
        }



		// load up the core library for
		// Evoai network
		$this->load->library('obcore');

		// if we can't find a language set
		// we'll set one now
		if ( ! $this->session->language )
		{
			$this->obcore->set_lang();
		}

		// load admin language
		$this->load->language('admin', $this->session->language);

		// we're always using this in the
		// admin area so we'll essentually autoload
		$this->load->library('ion_auth');

		// get admin theme info
		$theme = $this->obcore->get_active_theme('1');

		// get all the settings from the db
		$settings = $this->obcore->db_to_config();

		// roll the database setting into 
		// $this->config so we can use them
		if ($this->config->item('site_name'))
		{
			$this->template->title($this->config->item('site_name'));
		}


		// because PITassets...
		Asset::set_url(base_url());
		Asset::add_path('core', base_url('application/themes/' . $theme->path . '/'));
		$this->template->set_theme($theme->path);

		// set some partials
		$this->template
				->set_partial('flashdata', 'flashdata')
				->set_partial('sidebar', 'sidebar');


		// installer warning default
		$this->template->set('installer_warning', FALSE);
 
		// if we find the /installer directory exists 
		// then throw the installer_warning
		if (is_dir('./installer'))
		{
			// override the default
			$this->template->set('installer_warning', lang('installer_dir_warning_notice'));
		}

		$this->template->set('admin_nav', $this->ion_auth->get_permissions_dropdown(true));

		// end benchmarking
		$this->benchmark->mark('admin_controller_end');

		// and we're off.....
		
	}
	/* Upload Image */
	public function ImageUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		//$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$filenew =  str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png | PDF | pdf';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}		
	
	/*	Check Session Admin */
	public function checkSessionAdmin() 
	{
		$session = $this->session->all_userdata();			
		if(empty($session['admin_id']))
		{
			return false;		
		}
		if (isset($session['admin_id']))
		{
            $this->user = $session['admin_name'];
            $this->email = $session['admin_email'];
			$this->admin_id = $session['admin_id'];
			return true;
        }
	}
	
	/* load the view files with dynamic data pass from method in Backend */
	public function show_viewAdmin($view, $data = '') 
	{    
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar'); 
		$this->load->view($view, $data);
		$this->load->view('admin/layout/footer');
    }
}

class MY_Controller extends CI_Controller {

	var $userid='' ; 
	var $usermenu=array() ; 
	var $base_url = ''; // The page we are linking to
    var $prefix = ''; // A custom prefix added to the path.
    var $suffix = ''; // A custom suffix added to the path.
    var $total_rows = 3; // Total number of items (database results)
    var $per_page = 1; // Max number of items you want shown per page
    var $num_links = 1; // Number of "digit" links to show before/after the currently viewed page
    var $cur_page = 1; // The current page being viewed
    var $use_page_numbers = FALSE; // Use page number for segment instead of offset
    var $first_link = '&lsaquo; First';
    var $next_link = 'Next... →';
    var $prev_link = '← pre';
    var $last_link = 'Last &rsaquo;';
    var $uri_segment = 4;
    var $full_tag_open = '';
    var $full_tag_close = '';
    var $first_tag_open = '';
    var $first_tag_close = '&nbsp;';
    var $last_tag_open = '<li>';
    var $last_tag_close = '</li>';
    var $first_url = ''; // Alternative URL for the First Page.
    var $cur_tag_open = '<li class="active"><a href="#">';
    var $cur_tag_close = '</a></li>';
    var $next_tag_open = '<li>';
    var $next_tag_close = '</li>';
    var $prev_tag_open = '<li>';
    var $prev_tag_close = '</li>';
    var $num_tag_open = '<li>';
    var $num_tag_close = '</li>';
    var $page_query_string = FALSE;
    var $query_string_segment = 'per_page';
    var $display_pages = TRUE;
    var $anchor_class = '';
		
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->load->model('admin/Comman_model');
		$this->load->model('Front_model');
		$this->data['session'] = $this->session->all_userdata();
		$session_res = $this->session->all_userdata();
		$this->data['admin_id'] = $session_res->admin_id;
		date_default_timezone_set("Asia/Kolkata"); 
		$this->Ref_UserID = $this->session->userdata('Ref_UserID');
		$this->Ref_UserEmail = $this->session->userdata('Ref_UserEmail');
		$this->Ref_UserName = $this->session->userdata('Ref_UserName');
		$this->data['evot_details'] = $this->db->get_where('value_and_bonus', array('id'=>1))->row();
		$this->tName = '0x5824d62f4f3c875c906f4e16d488bed05a87a2ea';
	}
	
	/* load the view files with dynamic data pass from method in Backend */
	public function show_viewAdmin($view, $data = '') 
	{    
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/sidebar'); 
		$this->load->view($view, $data);
		$this->load->view('admin/layout/footer');
    }
		
	/* load the view files with dynamic data pass from method in Frontend */
	public function show_viewFront($view, $data = '') 
	{    
		$data['myobj'] = $this;
		$this->load->view('layout/header',$data);
		$this->load->view('layout/slider',$data);
		$this->load->view($view, $data);
		$this->load->view('layout/footer');		
    }
	
	/* load the view files with dynamic data pass from method in front end without slider */
	public function show_viewFrontInner($view, $data = '') 
	{    
		$data['myobj'] = $this;
		$this->load->view('layout/header',$data);
		$this->load->view($view, $data);
		$this->load->view('layout/footer');	
    }
	
	/*	Check Session Admin */
	public function checkSessionAdmin() 
	{
		$session = $this->session->all_userdata();			
		if(empty($session['admin_id']))
		{
			return false;		
		}
		if (isset($session['admin_id']))
		{
            $this->user = $session['admin_name'];
            $this->email = $session['admin_email'];
			$this->admin_id = $session['admin_id'];
			return true;
        }
	}
	/*********** Check Frant Session ***************/
	function checkfrantSession(){
 		$s = $this->session->all_userdata();
	 	$id=@$s['Ref_UserID'];
	 	if(@$id!= ""){ 
			$user_result = $this->db->get_where('users', array('id'=>$id))->row();
			$this->session->set_userdata('Ref_ethAddress', $user_result->eth_address);
			$this->session->set_userdata('Ref_beta_role', $user_result->beta_role);
			$this->session->set_userdata('Ref_super_role', $user_result->super_role);
			return true;			
		}
		else
		{
			return false;
		}
	}
	
	/* Yahoo mail */
	public function send_yahoo_mail($emailt, $subject, $message)
	{
		$this->load->library('email');
		$this->email->from('info@evoai.network', "Evoai network");
		$this->email->to($emailt);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();	
	}
	
	/*	Mail Send */
	public function send_mail($email, $subject, $message)	
	{
		$url = 'https://api.sendgrid.com/';
        $user = 'evoai';
		$pass = 'canuhodl2019';
        $params = array(
			'api_user'  => $user,
			'api_key'   => $pass,
			'to'        => $email,
			'subject'   => $subject,
			'html'      => $message,
			'from'      => 'evoainetwork@evoai.network',
        );
        $request =  $url.'api/mail.send.json';
        // Generate curl request
        $session = curl_init($request);
        // Tell curl to use HTTP POST
        curl_setopt ($session, CURLOPT_POST, true);
        // Tell curl that this is the body of the POST
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        // Tell curl not to return headers, but do return the response
        curl_setopt($session, CURLOPT_HEADER, false);
        // Tell PHP not to use SSLv3 (instead opting for TLS)
        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // obtain response
        $response = curl_exec($session);

        curl_close($session);

        // print everything out
        return $response;
		
		/*
		$CI =& get_instance();
        $CI->load->library('email');
		$CI->email->set_mailtype("html");
        $CI->email->from('info@evoai.network', 'Evoai network');
        $CI->email->to($email);
        $CI->email->subject($subject);
        $CI->email->message($message);
        return $CI->email->send();				
		*/
		/*
		$config = array(	
			'protocol' => 'SMTP',			
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1'	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from('info@evoai.network', "Evoai network");	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		return $this->email->send();	
		*/
	}

	public function getRandomToken($str, $id)
	{
		$rand_str = str_shuffle(rand().'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'.$id.round(microtime(true)*1000));
		$rand_val = rand(1,40);								  
		$pass_val = substr($rand_str, $rand_val, $str); 
		return $pass_val;
	}

	public function getRandomTokenSpecialCharacter($str, $id)
	{
		$rand_str = str_shuffle(rand().'ABCDEFGHIJKLMNOPQRSTUVWXYZ*$@&()+=#-abcdefghijklmnopqrstuvwxyz'.$id.round(microtime(true)*1000));
		$rand_val = rand(1,40);								  
		$pass_val = substr($rand_str, $rand_val, $str); 
		return $pass_val;
	}

	function sign_value($number) 
	{ 
		return ( $number > 0 ) ? 1 : ( ( $number < 0 ) ? -1 : 0 ); 
	} 

	function valueInRound($number) 
	{ 
		$val = explode('.', $number);
		if(!empty($val[1]))
		{
			$x = '';
			$n_val = strlen($val[1]);
			for ($i=0; $i<8 ; $i++) 
			{ 
				if($i >= $n_val)
				{
					$x = $x.'0';
				}
			}
				$n_val = $val[0].'.'.$val[1].$x;
		}
		else
		{
			if(!empty($val[0]))
			{
				$n_val = $val[0].'.00000000';
			}
			else
			{

			$n_val = '0.00000000';
			}
		}

		return $n_val;
	} 
	
	public function send_mail_to_user($email, $subject, $message, $sender_email, $sender_name)	
	{		
		$config = array(	
			'protocol' => 'SMTP',			
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1'	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from($sender_email, $sender_name);	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		return $this->email->send();
	}
	
	public function send_mail_attached($email, $subject, $message, $attach)	
	{		
		$config = array(	
			'protocol' => 'SMTP',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,	
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',			
			'wordwrap' => TRUE,				
			'charset'  => 'utf-8',			
			'priority' => '1'	
		);	
		$this->load->library('email',$config);	
		$this->email->set_newline("\n");	
		$this->email->from('info@evoai.network', "Evoai network");	
		$this->email->to($email);  	
		$this->email->subject($subject);	
		$this->email->message($message);
		$this->email->attach($attach);
		return $this->email->send();
	}
	
	/* Upload Image */
	public function ImageUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		//$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$filenew =  str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png | PDF | pdf';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
	
	/* PDF file Upload */
	public function PDFUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		$filenew =  date('d-M-y').'('.str_replace($filename,$name,$filename).')'.rand(). "." .$extension;  	
		$config['file_name'] = $filename;
		$config['upload_path'] = $imagePath;
		$config['allowed_types'] = 'pdf';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filename);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();				
			$imageName = $data['file_name'];			
			return $imageName;
		}		
	}
	
	/* Video Upload	*/
	public function VideoUpload($filename, $name, $imagePath, $fieldName)
	{
		$temp = explode(".",$filename);
		$extension = end($temp);
		$filenew =  date('d-M-Y').'_'.str_replace($filename,$name,$filename).'_'.rand(). "." .$extension;  		
		$config['file_name'] = $filenew;
		$config['upload_path'] = $imagePath;
		//$config['allowed_types'] = 'GIF | gif | JPE | jpe | JPEG | jpeg | JPG | jpg | PNG | png';
		$this->upload->initialize($config);
		$this->upload->set_allowed_types('*');
		$this->upload->set_filename($config['upload_path'],$filenew);
		
		if(!$this->upload->do_upload($fieldName))
		{
			$data = array('msg' => $this->upload->display_errors());
		}
		else 
		{ 
			$data = $this->upload->data();	
			$imageName = $data['file_name'];			
			return $imageName;
		}	
	}
}
