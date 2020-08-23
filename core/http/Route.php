<?php 
    /**
     * 
     * Author: Jocelyn
     * Email: duong.huan21222000@gmail.com
     * 
     */
    
    namespace Core\Http;

    /**
     * 
     * Class Route chua moi route cua ung dung va tat ca phuong thuc goi route
     * 
     */
    class Route {

        /**
         * 
         * - Mang luu tru tat ca route cua ung dung
         * - Moi route se gom url, method va action
         *  
         * <code>
         *  [
         *      ...,
         *      [
         *          'url' => $url,
         *          'method' => 'GET|POST',
         *          'action' => $action,
         *          'params' => $params
         *      ]
         *  ]
         * </code>
         * 
         */
        private $__routes;

        // Ham khoi tao 
        public function __construct()
        {
            $this->__routes = [];
        }

        /**
         * 
         * Phuong thuc get
         * 
         * @param string $url Url can so khop
         * @param string|callable $action Hanh dong khi goi den url Co the la mot function hoac mot phuong thuc trong controller
         * 
         * @return void
         * 
         */
        public function get(string $url, $action)
        {
            $this->__request($url, 'GET', $action);
        }

        /**
         * 
         * Phuong thuc post
         * 
         * @param string $url Url can so khop
         * @param string|callable $action Hanh dong khi goi den url Co the la mot function hoac mot phuong thuc trong controller
         * 
         * @return void
         * 
         */
        public function post(string $url, $action)
        {
            $this->__request($url, 'POST', $action);
        }

        /**
         * 
         * Xu ly phuong thuc
         * 
         * @param string $url Url can so khop
         * @param string $method method cua route. GET hoac POST
         * @param string|callable $action Hanh dong khi goi den url Co the la mot function hoac mot phuong thuc trong controller
         * 
         * @return void
         * 
         */
        private function __request(string $url, string $method, $action)
        {
            // kiem tra xem URL co chua param khong. VD: post/{id}
            if (preg_match_all('/({([a-zA-Z]+)})/', $url, $params)) {
                $url = preg_replace('/({([a-zA-Z]+)})/', '(.+)', $url);
            }

            // Thay the tat ca cac ki tu / bang ky tu \/ (regex) trong URL.
            $url = str_replace('/', '\/', $url);

            $route = [
                'url' => $url,
                'method' => $method,
                'action' => $action,
                'params' => $params[2]
            ];
            array_push($this->__routes, $route);
        }

        /**
         * 
         * Ham xu ly khi mot url duoc goi den server
         * 
         * @param string $url Url duoc goi
         * @param string $method Phuong thuc url duoc goi
         * 
         * @return mixed
         * 
         */
        public function map(string $url, string $method)
        {
            // lap qua cac route trong ung dung, kiem tra co chua url duoc goi khong
            foreach ($this->__routes as $route) {
                
                // neu route co $method
                if($route['method'] == $method){

                    // kiem tra route hien tai co phai la url dang duoc goi
                    $reg = '/^'.$route['url'].'$/';
                    if(preg_match($reg, $url, $params)){
                        array_shift($params);
                        $this->__call_action_route($route['action'], $params);
                    }
                    
                }
            }
        }

        /**
         * 
         * Ham goi action trong route
         * 
         * @param string|callable $action Hanh dong khi goi den url Co the la mot function hoac mot phuong thuc trong controller
         * @param array $params Cac tham so khi URL co tham so 
         * 
         * @return 
         * 
         */
        private function __call_action_route($action, $params)
        {
            // Neu $action la mot callback (mot ham).
            if(is_callable($action)){
                call_user_func_array($action, $params);
                return;
            }

            // Neu $action la mot phuong thuc cua controller. 'HomeController@index'.
            if(is_string($action)){
                $action = explode('@', $action);
                $controller_name = 'App\\Controllers\\'.$action[0];
                $controller = new $controller_name();
                call_user_func_array([$controller, $action[1]], $params);

                return;
            }
        }
    }
?>