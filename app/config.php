<?php

/**
 * Author: vivi
 * Date: 2019/12/6 10:53
 */

return [
    'app_debug' => true,
    'defaultController'=>'Index',
    'defaultAction'=>'index',
    'db_config' =>[
        // 数据库类型
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'        => '127.0.0.1',
        // 数据库名
        'database'        => 'vphp',
        // 用户名
        'username'        => 'root',
        // 密码
        'password'        => 'root',
        // 端口
        'hostport'        => '3306',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'to_',
    ]
];