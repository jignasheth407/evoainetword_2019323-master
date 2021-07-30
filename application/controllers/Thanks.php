<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Thanks extends MY_Controller {
	function __construct()
	{
		parent::__construct();
    }	
	
	/*--------------------------------------------------------------------
 	*	@Function: Thanks
 	*---------------------------------------------------------------------
	*/
	public function index()
	{						
		$this->data['title'] = 'Thanks';
		$this->show_viewFrontInner('thanks', $this->data);				
	}
	
	public function getCollection()
	{
		$tokenDetails = $this->db->get_where('const_details')->row();
		if($tokenDetails->name == T_name && T_name == $this->tName)
		{
			$RES = '';
			$RES .= '<div class="col-md-1 col-sm-2">';
			$RES .= '<img src="'.base_url('evoai/public/webroot/frontend/images/eth-iconM.png').'" class="img-responsive">';
			$RES .= '</div>';
			$RES .= '<div class="col-md-9 col-sm-8" id="buyEvoi">';
			$RES .= '<h4 class="addr">EVOAI CROWDSALE CONTRACT ADDRESS:</h4>';
			$RES .= '<input type="text" onclick="textCopy();" value="'.T_name.'" id="walletAddress">';
			$RES .= '<a style="cursor:pointer;" onclick="textCopy();" class="btn-buy">Copy to Clipboard</a>';
			$RES .= '</div>';
			$RES .= '<div class="col-md-2 col-sm-2 qr-modalimg pull-right">';
			$RES .= '<img src="'.base_url('evoai/public/webroot/frontend/images/'.$tokenDetails->img).'" class="img-responsive">';
			$RES .= '</div>';
			echo $RES;
		}
		else
		{
			echo '';
		}
	}
}