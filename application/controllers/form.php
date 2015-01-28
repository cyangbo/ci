<?php

class Form extends CI_Controller {
 
	 function index()
	 {
	  	$this->load->helper(array('form', 'url'));
	  
	  	//验证初始化函数
	  	$this->load->library('form_validation');
	  	
	  	
	  	//set_rules('表单中的name','自定义的报错时的名字','规则')
	  	/*
	  	 * 写法一:
		  	$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
	  	
	  	 */
	  	
		
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
	  	/*$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');*/
		/*
		 * 上面的代码设置了一组规则:

			用户名表单域长度不得小于5个字符以及大于12个字符。
			密码表单域必须跟密码确认表单域的数据一致。
			电子邮件表单域必须是一个有效邮件地址。
		 */
	  	
	  	/*
	  	 * 预处理数据
	  	 */
	  	$this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	    
		/*
		 * 自定义错误信息:$this->form_validation->set_message('rule', 'Error Message');
		 * 例如:$this->form_validation->set_message('required', 'Your custom message here');
		 * 如果你在错误信息中包含了 %s，它将插入显示出你在表单域中设置的别名。
		 * 所有自身的错误信息位于下面的语言文件中：language/english/form_validation_lang.php
		 */
		$this->form_validation->set_message('required', '%s 不能为空');
		//现在留空表单域提交表单会看到错误信息。 如果填充所有的表单域提交表单你会看到成功页。运行验证程序。成功返回TRUE，失败返回FALSE
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
