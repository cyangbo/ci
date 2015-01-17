<?php
class Tools extends CI_Controller {

  public function message($to = 'World')
  {
    echo "Hello {$to}!".PHP_EOL;
  }
}

/*
 * 某些情况下我们会用到命令行

使用 cron 定时运行任务而不需要使用 wget 或 curl
通过检查 $this->input->is_cli_request() 让你的 cron 任务无法通过网址访问到
让交互式任务可以做设置权限、清空缓存、执行备份等操作
与其他语言进行集成。比如一个 C++ 脚本可以调用一条指令来运行你模型中的代码！
 * 
 * 
 * 
 * 
 * 我们也可以在 Mac/Linux 中打开终端，或者在 Windows 下进入“运行”输入“cmd”，并进入我们的 CodeIgniter 项目的目录。

$ cd /path/to/project;
$ php index.php tools message
如果你跟着一步步下来，你应该会看到 Hello World!。

$ php index.php tools message "John Smith"
这里我们像使用 URL 参数一样给它传递了一个参数。“John Smith”作为一个参数被传递了，并且输出也变成：Hello John Smith!。
 */
?>