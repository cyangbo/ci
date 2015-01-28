<?php

	class User extends CI_Controller{
		public function index(){
			//http://ci.com/index.php/user/index
			//这个网址可以访问,U大小写都可以
			echo "user--index";
			
			$list=array(
				array('id'=>1,'name'=>'jack','email'=>'cc@qq.com'),
				array('id'=>2,'name'=>'jack2','email'=>'cc2@qq.com'),
				array('id'=>3,'name'=>'jack3','email'=>'cc3@qq.com'),
				array('id'=>4,'name'=>'jack4','email'=>'cc4@qq.com'),
			);
			
			//$this->load->vars('title','这是标题');
			$data['title']='这是标题';
			$data['list']=$list;
			$this->load->view('user/index',$data);
		}
		public  function test(){
			echo "test";
		}
		
		public function showusers(){
			
			$this->load->database();
			//$this->
		}
		
	}
	
	/*extends
	 * 控制器特点:
	 * 1.不需要加后缀
	 * 2.文件名全部小写	例如:user.php
	 * 3.所有控制器,直接或者间接继承CI_Controller
	 * 
	 * 
	 */