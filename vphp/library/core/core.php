<?php

/**
 * Author: vivi
 * Date: 2019/12/6 14:35
 */

namespace vphp;


class core
{
    //配置内容
    protected $config = [];
    public function __construct($config){
        $this->config = $config;
    }
    //运行程序
    public function run(){
        spl_autoload_register(array($this, 'loadClass'));//设置对象的自动载入

        $this->unregisterGlobals();
    }
    //设置路由
    public function route(){

    }
    //检查开发环境
    public function setReporting()
    {
        if ($this->config['app_debug'] === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors', 'On');
        }
    }
    //检测自定义全局变量并移除。因为 register_globals 已经弃用，如果
    //已经弃用的 register_globals 指令被设置为 on，那么局部变量也将
    //在脚本的全局作用域中可用。
    public function unregisterGlobals()
    {
        if (ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($array as $value) {
                foreach ($GLOBALS[$value] as $key => $var) {
                    if ($var === $GLOBALS[$key]) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
    //配置数据库
    public function setDbConfig(){
        if($this->config['db_config']){
            define('DB_HOST',$this->config['db_config']['hostname']);
            define('DB_NAME',$this->config['db_config']['database']);
            define('DB_USER',$this->config['db_config']['username']);
            define('DB_PASS',$this->config['db_config']['password']);
        }
    }
    //自动加载类
    public function loadClass($className){
        $classMap = $this->classMap();
        if(isset($classMap[$className])){
            // 包含内核文件
            $file = $classMap[$className];
        } elseif (strpos($className, '\\') !== false) {
            // 包含应用（application目录）文件
            $file = APP_PATH . str_replace('\\', '/', $className) . EXT;
            if (!is_file($file)) {
                return;
            }
        } else {
            return;
        }

        include $file;
        // 这里可以加入判断，如果名为$className的类、接口或者性状不存在，则在调试模式下抛出错误
    }
    //内核文件命名空间映射关系
    protected function classMap()
    {
        return [
            'vphp\base\Controller' => CORE_PATH . '/base/Controller.php',
            'vphp\base\Model' => CORE_PATH . '/base/Model.php',
            'vphp\base\View' => CORE_PATH . '/base/View.php',
            'vphp\db\Db' => CORE_PATH . '/db/Db.php',
            'vphp\db\Sql' => CORE_PATH . '/db/Sql.php',
        ];
    }
}