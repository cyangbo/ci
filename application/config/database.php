<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'test';
$active_record = TRUE;

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'ccmiu';
$db['default']['database'] = 'discuz';
$db['default']['dbdriver'] = 'mysql';	//数据库类型。如：mysql、postgres、odbc 等。必须为小写字母。
$db['default']['dbprefix'] = '';	//当运行Active Record查询时数据表的前缀,它允许在一个数据库上安装多个CodeIgniter程序.
$db['default']['pconnect'] = TRUE;	//TRUE/FALSE (boolean) - 使用持续连接.
$db['default']['db_debug'] = TRUE;	//TRUE/FALSE (boolean) - 显示数据库错误信息.
$db['default']['cache_on'] = FALSE;	//TRUE/FALSE (boolean) - 数据库查询缓存是否开启，详情请见数据库缓存类。
$db['default']['cachedir'] = '';	//数据库查询缓存目录所在的服务器绝对路径。
$db['default']['char_set'] = 'utf8';	
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';		//替换默认的dbprefix表前缀，该项设置对于分布式应用是非常有用的，你可以在查询中使用由最终用户定制的表前缀。
$db['default']['autoinit'] = TRUE;	//当数据库类库(database library)被载入的时候是否需要自动连接数据库，如果设置为FALSE，将在首次查询前进行连接。
$db['default']['stricton'] = FALSE;//TRUE/FALSE (boolean) - 是否强制使用 "Strict Mode" 连接, 在开发程序时，使用 strict SQL 是一个好习惯。
$db['default']['port'] = 3306;

$db['test']['hostname'] = 'localhost';
$db['test']['username'] = 'root';
$db['test']['password'] = 'ccmiu';
$db['test']['database'] = 'ci';
$db['test']['dbdriver'] = 'mysql';
$db['test']['dbprefix'] = '';
$db['test']['pconnect'] = TRUE;
$db['test']['db_debug'] = FALSE;
$db['test']['cache_on'] = FALSE;
$db['test']['cachedir'] = '';
$db['test']['char_set'] = 'utf8';
$db['test']['dbcollat'] = 'utf8_general_ci';
$db['test']['swap_pre'] = '';
$db['test']['autoinit'] = TRUE;
$db['test']['stricton'] = FALSE;
$db['default']['port'] = 3306;


/* End of file database.php */
/* Location: ./application/config/database.php */