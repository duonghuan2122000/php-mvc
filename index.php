<?php 
    /**
     * 
     * Author: Jocelyn
     * Email: duong.huan21222000@gmail.com
     * 
     */
    
    // Dinh nghia hang Path cua file index.php
    define('PATH_ROOT', __DIR__);

    // Ham autoload class trong php
    spl_autoload_register(function(string $class_name){
        include_once PATH_ROOT.'/'.$class_name.'.php';
    });

    include_once PATH_ROOT.'/app/config/config.php';

    // load class Route trong core\http
    $router = new Core\Http\Route();
    include_once PATH_ROOT.'/app/routes.php';

    // Lay url hien tai cua trang web. Mac dinh la /
    $request_url = !empty($_GET['url']) ? '/'.$_GET['url'] : '/';

    // Lay phuong thuc hien tai cua url dang duoc goi. (GET | POST). Mac dinh la GET.
    $method_url = !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

    $router->map($request_url, $method_url);
    
?>