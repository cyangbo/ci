<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
2015-1-19PHP
*/
class Msql extends CI_Controller{
	function  __construct(){
		parent::__construct();
		$this->load->database();
		
	}
	public function index(){
		
		echo "hello";
		
		$query = $this->db->query('SELECT * FROM users');

		echo "</br>";
		//多结果标准查询（对象形式）
		foreach ($query->result() as $row)
		{
		    echo $row->username;
		    echo $row->password;
		    echo $row->email;
		}
		
		echo "</br>";
		
		//多结果标准查询（数组形式）
		foreach ($query->result_array() as $row)
		{
		    echo $row['username'];
		    echo $row['password'];
		    echo $row['email'];
		}
		
		//num_rows()测试查询结果
		echo 'Total Results: ' . $query->num_rows();
	}
	
	public function active_record(){
		echo "</br>";
		echo "active_record model";
		echo "</br>";
		//获取一个表的所有信息
		$query = $this->db->get('users');
		foreach ($query->result() as $row)
		{
		    echo $row->username;
		    echo "</br>";
		}
		
		//$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
		$query = $this->db->get_where('users', array('id' => 1));
		foreach ($query->result() as $row)
		{
		    echo $row->username;
		    echo $row->email;
		    echo $row->fullname;
		}
		///返回一个包含字段名称的数组
		foreach ($query->list_fields() as $field)
		{
			echo "</br>";
		   echo $field;
		}
		
		
	}
}