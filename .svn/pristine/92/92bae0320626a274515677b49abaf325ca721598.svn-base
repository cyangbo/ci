<?php
class News extends CI_Controller {

	//__construct方法是父级类 (CI_Controller) 的构造函数，并调用了数据模型
	//这样这个控制器中的其他方法就能使用那个数据模型了
  public function __construct()
  {
    parent::__construct();
    $this->load->model('news_model');
  }
  
  /*
   * 控制层--调用数据模型model--模型层加载数据库,数据处理方法--控制层得到模型处理好的数据,传输到视图层展示
   */

  public function index()
  {
  	//启动缓存,保存1000分钟
  	//由于CI存储缓存文件的方式，只有通过 view 文件的输出才能被缓存。
  	//注意: 这样做并不能让缓存文件立即消失，它将会自动过期并被删除。如果你想立即删除那些文件，就必须自己动手了。
  	//$this->output->cache(1000);
  	
  	//激活分析器	调试你的应用程序
  	//注意开启缓存的话,要先删除缓存文件
  	$this->output->enable_profiler(TRUE);
  	
  	//通过model层的get_news()方法来获取数据
    $data['news'] = $this->news_model->get_news();
    
	$data['title'] = 'News archive';

  	$this->load->view('templates/header', $data);
  	$this->load->view('news/index', $data);
  	$this->load->view('templates/footer');
  }

  public function view($slug)
  {
  	  
  	//$this->output->cache(1000);
  	
    $data['news_item'] = $this->news_model->get_news($slug);
    
    if (empty($data['news_item']))
  	{
   	 show_404();
  	}

  	$data['title'] = $data['news_item']['title'];

  	$this->load->view('templates/header', $data);
  	$this->load->view('news/view', $data);
  	$this->load->view('templates/footer');
    
  }
  
  
	public function create()
	{
		//载入表单辅助函数,form辅助函数文件的名字(不带.php后缀 和"helper" 部分)
		//在system/helpers中能够找到form_helper.php文件,就是调用这个
		/*
		 * 一次载入多个辅助函数
		 * $this->load->helper( array('helper1', 'helper2', 'helper3') );
		 * 
		 */
	  $this->load->helper('form');
	  //载入这个form表单辅助函数后,在对应的view层就可以使用对应的方法
	  
	  
	  
	  //载入表单验证了类
	  /*
	   * 格式$this->load->library('class name');
	   * class name是你想要使用的类名
	   */
	  $this->load->library('form_validation');
	  
	  $data['title'] = 'Create a news item';
	  
	  $this->form_validation->set_rules('title', 'Title', 'required');
	  $this->form_validation->set_rules('text', 'text', 'required');
	  
	  if ($this->form_validation->run() === FALSE)
	  {
	    $this->load->view('templates/header', $data);  
	    $this->load->view('news/create');
	    $this->load->view('templates/footer');
	    
	  }
	  else
	  {
	    $this->news_model->set_news();
	    $this->load->view('news/success');
	  }
	}
  
}