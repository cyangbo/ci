<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	//使用pathinfo模式
	//http://ci.com/index.php/welcome/test
	//访问规则:
		//入口文件.php/控制器/动作	welcome是控制器,test是动作
	public function test(){
		echo "ccc";
		$this->load->view('tes');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */