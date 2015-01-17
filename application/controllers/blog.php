<?php
	//类名必须以大写字母开头
	class Blog extends CI_Controller {
	
		 function __construct()
		 {
		 	//此处的构造函数会覆盖掉这个父控制器类中的构造函数，所以我们要手动调用它。
		   //构造函数并不能返回值，但是可以用来设置一些默认的功能
		 	parent::__construct();
		 }
		
		 public function index()
		 {
		  echo 'Hello World！';
		    $data['title'] = "My Real Title";
  			$data['heading'] = "My Real Heading";
  			$data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');
  
  			$this->load->view('blogview', $data);
  			//把view的第三个参数设置成true,不输出到浏览器,而是返回给$buffer
  			$buffer = $this->load->view('blogview', $data, true);
  			echo "ccccccc/n/t";
  			echo $buffer;
  			echo "bbbbb/n/t";
		 }
		 
	    public function blog()
	    {
	        $this->load->model('blogmodel');
	
	        $data['query'] = $this->Blog->get_last_ten_entries();
	
	        $this->load->view('blog', $data);
	    }
	    
		public function comments()
		 {
		  echo '看这里！';
		 }
	}
?>