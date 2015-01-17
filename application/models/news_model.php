<?php
class News_model extends CI_Model {

  public function __construct()
  {
  	//加载数据库
    $this->load->database();
  }
  
	public function get_news($slug = FALSE){
	  if ($slug === FALSE)
	  {
	  	//SELECT * FROM news
	    $query = $this->db->get('news');
	    
	    //该方法执行成功时将记录集作为关联数组返回
	    return $query->result_array();
	    /*
	     * 一般这样用
			* $query = $this->db->query("要执行的 SQL");
			
			foreach ($query->result_array() as $row)
			{
			   echo $row['title'];
			   echo $row['name'];
			   echo $row['body'];
			}
	     */
	    
	  }
	  
	  //SELECT * FROM news where slug=$slug;
	  $query = $this->db->get_where('news', array('slug' => $slug));
	  return $query->row_array();
	  /*
	   * 一般这样用
			$query = $this->db->query("要执行的 SQL");
			if ($query->num_rows() > 0)
			{
			   $row = $query->row_array(); 
			
			   echo $row['title'];
			   echo $row['name'];
			   echo $row['body'];
			}
	   */
	}
	
	public function set_news()
	{
		//加载辅助函数URL
	  $this->load->helper('url');
	  
	  /*
	   * url_title()
	   * 参数1:输入的标题;参数2:分隔符,默认是破折号-,可以指定其他;
	   * 参数3:是否强制小写
	   * 
	   * post()来自输入类		系统自动加载此类，不用手动加载。
	   * 方法可以确保数据是被过滤过（sanitized）的，从而保护你不被其他人恶意攻击
	   * 
	   * 下面两个相同
	   * $something = $this->input->post('something');	//这个不需要isset()验证是否存在
	   * $something = $_POST['something'];
	   * 
	   */
	  $slug = url_title($this->input->post('title'), 'dash', TRUE);
	  
	  $data = array(
	    'title' => $this->input->post('title'),
	    'slug' => $slug,
	    'text' => $this->input->post('text')
	  );
	  
	  //INSERT INTO mytable (title, content, date) VALUES ('My Title', 'My Content', 'My Date')
	  return $this->db->insert('news', $data);
	}
}