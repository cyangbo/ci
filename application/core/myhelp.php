<?php
/*
 * 替换核心类
 * application/core/some-class.php
 * 只要你自定义的文件名与默认的完全一样,它就会自动替换原有的类.
 * 要注意的是你自定义的类必须以CI作为前缀,例如你自己建立了Input.php类的名字必须是:
 * 
 * class CI_Input {

	}
	
	
	
	扩展核心类
	新扩展的类所在的文件必须以 MY_ 为前缀(这个选项是可配置的,下面有说明).
	$config['subclass_prefix'] = 'MY_';
	
	
	
	例如,要扩展原有的Input 类,你应该新建一个文件名为application/core/MY_Input.php, 并按如下声明你的类:
	class MY_Input extends CI_Input {

}
注意:如果你需要在类中使用构造函数,你必须在构造函数中显式继承父类构造函数:

class MY_Input extends CI_Input {

    function __construct()
    {
        parent::__construct();
    }
}
Tip:  所有在你的新类中定义的函数如果与父类中函数的命名完全一样,这些函数就能取代父类中原有的函数 (这也被称为"方法覆盖").这允许你在本质上改变CodeIgniter的核心.
如果你扩展了控制器核心类，那么也要在你的应用程序控制器的构造函数中使用这个新类。


 */

?>