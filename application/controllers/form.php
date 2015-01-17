<?php

class Form extends CI_Controller {
 
	 function index()
	 {
	  	$this->load->helper(array('form', 'url'));
	  
	  	//验证初始化函数
	  	$this->load->library('form_validation');
	  	
	  	
	  	//set_rules('表单中的name','自定义的报错时的名字','规则')
	  	/*
	  	 * 写法一: */
		  	$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
	  	
	  	
	  	
		
		/*
		 * 写法二:
		 * $config = array(
               array(
                     'field'   => 'username', 
                     'label'   => 'Username', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'passconf', 
                     'label'   => 'Password Confirmation', 
                     'rules'   => 'required'
                  ),   
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'required'
                  )
            );

			$this->form_validation->set_rules($config);
		 */
	  	
	  	//修改规则设置函数中的第三个参数
	  	//$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		//$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		/*
		 * 上面的代码设置了一组规则:

			用户名表单域长度不得小于5个字符以及大于12个字符。
			密码表单域必须跟密码确认表单域的数据一致。
			电子邮件表单域必须是一个有效邮件地址。
		 */
	    
		//现在留空表单域提交表单会看到错误信息。 如果填充所有的表单域提交表单你会看到成功页。
		  if ($this->form_validation->run() == FALSE)
		  {
		   $this->load->view('myform');
		  }
		  else
		  {
		   $this->load->view('formsuccess');
		  }
	 }
}
?>
