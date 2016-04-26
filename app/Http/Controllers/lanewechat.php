<?php
namespace LaneWeChat;

session_start();
//引入配置文件
include_once app_path().'/Libs/LaneWeChat/config.php';
//引入自动载入函数
include_once app_path().'/Libs/LaneWeChat/autoloader.php';
//调用自动载入函数
AutoLoader::register();