<?php

class Pages extends CI_Controller {

public function view($page = 'home')
{
      //判断view()的参数页面是否存在
  if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
  {
    // 页面不存在
    show_404();
  }
  
  //默认:
// http://ci.com/index.php/pages/view /

  //参数about:view($page='about')
  http://ci.com/index.php/pages/view/about/
  
  $data['title'] = ucfirst($page); // 将title中的第一个字符大写
  
  $this->load->view('templates/header', $data);
  $this->load->view('pages/'.$page, $data);
  $this->load->view('templates/footer', $data);

}
}