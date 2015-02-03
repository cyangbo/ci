<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Addarticle extends CI_Controller {


		public function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->library('session');
		}

		public function index() {
			$name = trim($this->input->post('name'));
			$password = trim($this->input->post('password'));
			if ($name === 'gongeek' && md5($password) === 'a80fb8f5b7c2cf7f067e1bd7ecc1aa3c') {
				$this->load->view('add_view');
				$newData = array(
					'name' => 'gongeek',
				);
				$this->session->set_userdata($newData);
			} else {
				$this->load->view('admin_view');
			}
		}

		public function add() {
			if ($this->session->userdata('name') !== 'gongeek') {
				echo '非法操作！';
				return;
			}
			$title = $this->input->post('title');
			$tag = $this->input->post('tag');
			$time = $this->input->post('time');
			$article = $this->input->post('article');
			$group = $this->input->post('group');
			$tags = '';
			if ($tag) {
				foreach ($tag as $value) {
					$tags .= $value . '-';
				}
			}

			$data = array(
				'title' => $title,
				'tag' => $tags,
				'time' => $time,
				'article' => $article,
				'groups' => $group
			);
			if (empty($title) || empty($tag) || empty($time) || empty($article) || empty($group)) {
				echo '添加失败!';
			} else {
				$this->db->insert('article', $data);
				echo '添加成功!';
			}
		}
	
	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */