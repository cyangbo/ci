<?php

	class User extends CI_Controller{
		public function index(){
			//http://ci.com/index.php/user/index
			//这个网址可以访问,U大小写都可以
			echo "user--index";
		}
		public  function test(){
			echo "test";
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