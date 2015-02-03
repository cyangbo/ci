<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Index extends CI_Controller {
/*
 * CMS
 */

		public function __construct() {
			parent::__construct();
			$this->load->model('article_model');
		}

		public function index() {
			$result = $this->article_model->get_article(0);
			$data = array('articles' => $result, 'page' => 0, 'ca' => 'page');
			$this->load->view('index_view', $data);
		}

		public function jswz($page = 0) {
			$result = $this->article_model->get_jswz($page);
			$data = array('articles' => $result, 'page' => $page, 'ca' => 'jswz');
			$this->load->view('index_view', $data);
		}

		public function sbzt($page = 0) {
			$result = $this->article_model->get_sbzt($page);
			$data = array('articles' => $result, 'page' => $page, 'ca' => 'sbzt');
			$this->load->view('index_view', $data);
		}

		public function page($page = 0) {
			$result = $this->article_model->get_article($page);
			$data = array('articles' => $result, 'page' => $page, 'ca' => 'page');
			$this->load->view('index_view', $data);
		}

		public function searchByTag($tag, $page = 0) {
			$result = $this->article_model->get_title_by_tag($tag, $page);
			$data = array('articles' => $result, 'page' => $page, 'ca' => "searchByTag/$tag",
				'tag' => $tag);
			$this->load->view('index_view', $data);
		}

		//搜索
		public function search($title='', $page = 0) {
			if (empty($title)) {
				$title = $this->input->post('search');
			}
			$result = $this->article_model->get_article_by_title($title, $page);
			$data = array('articles' => $result, 'page' => $page, 'ca' => "search/$title",
				'search' => $title);
			$this->load->view('index_view', $data);
		}
	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */