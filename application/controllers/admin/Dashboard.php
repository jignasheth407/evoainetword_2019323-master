<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();		
	}
	
	/* Dashboard Show */
	public function index()
	{		
		if($this->checkSessionAdmin())
		{	
			$this->data['valueBonus_details'] = $this->db->get_where('value_and_bonus', array('id'=>1))->row();
			$this->show_viewAdmin('admin/dashboard', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
    }
	
	public function notPermitted()
	{
		if($this->checkSessionAdmin())
		{			
			$this->show_viewAdmin('admin/dashboard_2', $this->data);
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/* User bonus stored */
	public function coinTransaction()
	{ 
		$userList = $this->db->get_where('users', array('eth_address !='=> '', 'user_referenced_code !='=> '', 'user_referenced_code !='=> 0))->result();
		$userbalance = '';
		?>			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<?php
		foreach($userList as $res)
		{		
			?>
				<script>
					var eth_add = '<?= $res->eth_address ?>';																					
					var web3 = new Web3(new Web3.providers.HttpProvider("https://mainnet.infura.io/v3/baf22b6c2cd84003aa418a653eacecfa"));
					if(eth_add > 0)
					{
						var tokenAddress = "0x5dE805154A24Cb824Ea70F9025527f35FaCD73a1";
						var walletAddress = "<?= $res->eth_address ?>";
						
						// The minimum ABI to get ERC20 Token balance
						var minABI = [
						  // balanceOf
						  {
							"constant":true,
							"inputs":[{"name":"_owner","type":"address"}],
							"name":"balanceOf",
							"outputs":[{"name":"balance","type":"uint256"}],
							"type":"function"
						  },
						  // decimals
						  {
							"constant":true,
							"inputs":[],
							"name":"decimals",
							"outputs":[{"name":"","type":"uint8"}],
							"type":"function"
						  }
						];

						// Get ERC20 Token contract instance
						var contract = web3.eth.contract(minABI).at(tokenAddress);

						// Call balanceOf function
						contract.balanceOf(walletAddress, (error, balance) => {
						  // Get decimals
							contract.decimals((error, decimals) => {
								// calculate a balance
								balance = balance.div(10**decimals);
								var user_balance = balance.toString();
								var dataString = 'user_id='+<?= $res->id ?>+'&current_value='+user_balance;
								$.ajax({
									url: '<?php echo base_url()?>admin/dashboard/currentTransaction',
									type: 'POST',
									data: dataString,
									success: function(responce){
									}
								});
							});
						});																						
					}
				</script>
			<?php
		}
	}
	
	/**
	| currentTransaction
	*/
	public function currentTransaction()
	{
		$Bonus_details = $this->db->get_where('value_and_bonus', array('id'=>1))->row();
		$userID = $this->input->post('user_id');
		$current_value = $this->input->post('current_value');
		/*$referenced_code = $this->input->post('referenced_code');*/
		$userLastTransaction = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction', array('user_id'=>$userID))->row();
		$old_value = 0;
		$bonus_value = 0;
		if($userLastTransaction->old_value > 0)
		{
			$old_value = $userLastTransaction->old_value;
			$calculate_bonus = $current_value - $old_value;
			if($calculate_bonus > 0)
			{
				$bonus_value = ($calculate_bonus * $Bonus_details->bonus / 100);
			}
			else
			{
				$bonus_value = 0;
			}
		}
		else
		{
			$bonus_value = ($current_value * $Bonus_details->bonus / 100);
		}
		
		$userReferancedCode = $this->db->get_where('users', array('id' => $userID))->row();
		$postData['user_id'] = $userID;
		$postData['current_value'] = $current_value;
		$postData['old_value'] = $current_value;
		$postData['bonus_value'] = $bonus_value;
		$postData['paid_value'] = 0;
		$postData['referenced_code'] = $userReferancedCode->user_referenced_code;
		$postData['time'] = time();
		$postData['update_time'] = strtotime('+24 hour');
		$this->db->insert('user_coin_transaction', $postData);
		echo $this->db->insert_id();
	}
	
	/**
	| User amount update
	*/
	public function tokenPaidStatus()
	{
		$SendToken_details = $this->db->get_where('token_send')->result();
		if($SendToken_details)
		{
			foreach($SendToken_details as $res)
			{
				$user_details = $this->db->get_where('users', array('eth_address'=> $res->to_address))->row();
				$coinTransaction_details = $this->db->order_by('id', 'desc')->get_where('user_coin_transaction', array('referenced_code'=>$user_details->user_referral_code, 'paid_value'=>0))->row();
				
				if($res->amount > 0)
				{
					$postdata['paid_value'] = $res->amount;
					$this->db->where('id', $coinTransaction_details->id);				
					$this->db->where('user_id', $coinTransaction_details->user_id);				
					//$this->db->where('time', $coinTransaction_details->time);	
					$this->db->update('user_coin_transaction', $postdata);
				}
			}
		}
	}	
}

/* End of file */?>