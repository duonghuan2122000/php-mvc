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

    // Lay url hien tai cua trang web. Mac dinh la /
    $request_url = !empty($_GET['url']) ? '/'.$_GET['url'] : '/';

    
?>