<?php

/**
 * Author: vivi
 * Date: 2019/12/6 11:02
 */

// 初始化常量

define('EXT', '.php');
define('DS', DIRECTORY_SEPARATOR);
define('VPHP_PATH',__DIR__.DS);
define('LIB_PATH',VPHP_PATH.'/library'.DS);//php类
define('CORE_PATH',LIB_PATH.'/core'.DS);//php核心文件
defined('APP_PATH') or define('APP_PATH',dirname($_SERVER['SCRIPT_FILENAME']) .DS);//文件
defined('ROOT_PATH') or define('ROOT_PATH',dirname(realpath(APP_PATH)) .DS);//项目根目录
defined('CONF_PATH') or define('CONF_PATH', APP_PATH); // 配置文件目录
defined('CONF_EXT') or define('CONF_EXT', EXT); // 配置文件后缀
defined('ENV_PREFIX') or define('ENV_PREFIX', 'PHP_'); // 环境变量的配置前缀

// 环境常量
// 载入Loader类
require CORE_PATH . 'Loader.php';

// 加载环境变量配置文件
//