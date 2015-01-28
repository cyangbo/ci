<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015-1-19PHP
*/
class M_user extends CI_Model{
	var $table='users';	//定义表,后面可以多出使用,如果要改表名,改这里一个地方就好
	var $max_idle_time = 300;// allowed idle time in secs, 300 secs = 5 minute
	
	function __construct(){
		parent::__construct();
	}
	
	//添加新用户
	function save($user_data){
		$this->db->insert($this->table,$user_data);
		$this->db->update($this->table,$user_data);
		return $this->db->affected_rows();
	}
	
	//更新用户
	function update($user_data){
		if(isset($user_data['id'])){
			$this->db->where('id',$user_data['id']);
			$this->db->update($this->table,$user_data);
			return $this->db->affected_rows();
		}
		return false;
	}
	
	//根据用户名取得用户信息
	function get_by_username($username){
		$query = $this->db->get_where($this->table,array('username'=>$username),1);
		if($query->num_rows() > 0) {
			return $query->row_array();
			//var_dump($query->row_array());
		}
		return false;
	}
	
	//设置登录的session
	function allow_pass($user_data){
		
		//添加自定义的 Session 数据:$this->session->set_userdata($array);
		$this->session->set_userdata(
			array(
				'last_activity'=>time(),
				'logged_in'=>'yes',
				'user' => $user_data
			)
		);
	}
	
	//检查用户是否登录了并更新session
	function is_logged_in(){
		//取得 Session 数据:$this->session->userdata('item');
		$last_activity = $this->session->userdata('last_activity');
		$logged_in= $this->session->userdata('logged_in');
		$user = $this->session->userdata('user');
		
		if( ($logged_in == 'yes')
			&& ((time() - $last_activity) < $this->max_idle_time ) ){
				$this->allow_pass($user);
				return true;
		}else{
			$this->remove_pass();
			return false;
		}
	}
	
	//删除session记录
	function remove_pass(){
		$array_items = array(
			'last_activity'=>'',
			'logged_in'=>'',
			'user'=>''
		);
		//删除session
		$this->session->unset_userdata($array_items);
	}
	
	//检查邮箱是否存在
	function email_exists($email){
		$query = $this->db->get_where($this->table,array('email'=>$email));
		if($query->num_rows() > 0)return true;
		return FALSE;
	}
	
	//检查用户名是否存在
	function username_exists($username){
		$query = $this->db->get_where($this->table,array('username'=>$username));
		if($query->num_rows() > 0) return  TRUE;
		return FALSE;
	}
	
	// 生成hash加密密码
	function hash_password( $password ) {
		$salt = $this->generate_salt();
		return $salt.'.'.md5( $salt.$password);
	}
	
	// Check if password is valid
	function check_password( $password, $hashed_password ) {
		list($salt, $hash) = explode('.', $hashed_password);
		$hashed2 = $salt.'.'.md5( $salt.$password);
		return ($hashed_password == $hashed2);
	}
	
	// create salt for password hashing
	private function generate_salt( $length = 10 ) {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $i = 0;
        $salt = "";
        while ($i < $length) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
        }
        return $salt;
	}
	
	
	

	
}