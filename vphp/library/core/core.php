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
    //测自定义全局变量并移除
    
    //配置数据库
    //自动加载类
    //内核文件命名空间映射关系
}