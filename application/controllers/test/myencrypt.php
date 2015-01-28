<?php
/*
2015-1-18PHP
*/

class Myencrypt extends  CI_Controller{
	public function  index(){
		/*
		 * 
		 * $this->load->library 函数加载：

$this->load->library('encrypt');
一旦被加载，加密类库就可以这样使用：$this->encrypt
		 * 
		 */
		$this->load->library('encrypt');
		
		
		/*
		 * $this->encrypt->encode()执行数据加密并返回一个字符串
		 */
		
		$msg = 'My secret message';
		$encrypted_string = $this->encrypt->encode($msg);
		echo $encrypted_string;
		//V0+lry99UatI50H3OPCPKVgTLO60I+LDTxJ5IBLUtzU+5Kd96H9I0jGq3xiDjWUPbBTB7BdeSuJNjT1VxtZ6gg==
		
		
		/*
		 * $this->encrypt->decode()解密一个已加密的字符串
		 */
		$plaintext_string = $this->encrypt->decode($encrypted_string);
		
		
		
		
	}
	public function mysession(){
		
		$this->load->library('session');
		
		$sess = $this->session->userdata('item');
		var_dump($sess);
		
	}
}