<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015-1-19PHP
*/
class Login extends CI_Controller{
	var $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('form_validation');
		
	}
	
	public function index(){
		//检查是否登录,如果已经登录,就直接转向admin	如果没登录没有session就执行后面代码
		if($this->m_user->is_logged_in()){
			//URL辅助类,通过发送HTTP头，命令客户端转向到您指定的URL
			redirect('admin');
		}
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
	
			if (($user = $this->m_user->get_by_username($username))!=0) {
				//var_dump($user);
				if ($this->m_user->check_password( $password, $user['password'] )) {
					$this->m_user->allow_pass( $user );
					redirect('admin');
				} else { $this->data['login_error'] = '密码不正确'; }
			} else { $this->data['login_error'] = '用户名不存在'; }
			
			
		}
		
		$this->load->view('login/v_login',$this->data);
		
	}
	
	//注册
	public function register(){
		if($this->m_user->is_logged_in()){
			redirect('admin');
		}
		
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		//is_unique[users.username]	查找数据库中的users表的username
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');
		
		if ($this->form_validation->run()) {
		$user = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'fullname' => $this->input->post('fullname'),
			'password' => $this->m_user->hash_password( $this->input->post('password') )
		);
		if ( $this->m_user->save($user) ) {
			$this->data['register_success'] = 'Registration successful. <a href="'.site_url('login').'">Click here to login</a>.';
		} else { $this->data['register_error'] = 'Saving data failed. Contact administrator.'; }
		}
		$this->load->view('login/v_register', $this->data);
	}
	
	//不能访问返回信息
	public function noaccess(){
		$this->data['login_error'] = '你没有访问权限,或者登录过期,请重新登录!';
		$this->load->view('login/v_login',$this->data);
	}
	
	
	// route /logout -- check settings in /application/config/routes.php
	public function logout() {
		$this->m_user->remove_pass();
		$this->data['login_success'] = 'You have been logged out. Thank you.';
		$this->load->view('login/v_login', $this->data);
	}
}