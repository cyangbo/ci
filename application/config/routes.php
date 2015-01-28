<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//CodeIgniter由上而下读取路由规则然后将请求路由至第一个匹配的规则
//每一个规则都是可以用两种定义方式： 通配符(wildcards) 或者 正则表达式(Regular Expressions)（左侧）映射到一个由斜线分隔的控制器和方法名（右侧）
//数组的键包含着被匹配的URI,而数组的值包含着路由将被重定向的目的地
//两种通配符类型:
/*
:num 将匹配一个只包含有数字的segment(段).
:any 将匹配任何字符(可以是多个segment段).可以匹配多个值，如：
$route['product/(:num)'] = "catalog/product_lookup";
$route['product/(:any)'] = "catalog/product_lookup/$1/$2/$3/$4/$5";        //将整条url上的每一个参数全部传递给catalog控制器下的 product_lookup方法。
 */
/*
这个可以应用
$route['product/(:num)'] = "catalog/product_lookup_by_id/$1";
当“product”作为 URL 中第一个分段时，如果第二分段是数字，则将被重定向到“catalog”类，并传递所匹配的内容到“product_lookup_by_id”方法中。
 */
$route['default_controller'] = "blog";
$route['404_override'] = '';
$route['register'] = 'login/register';
$route['logout'] = 'login/logout';
//$route['news/(:any)'] = 'news/view/$1';

/*
$route['myclass'] = 'myclass';
$route['products/shoes'] = 'products/shoes';
$route['blog'] = 'blog';
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['form'] = 'form';
$route['default_controller'] = "pages/view";
$route['(:any)'] = 'pages/view/$1';
*/
//$route['news'] = 'news';

//$route['404_override'] = 'pages/view/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */