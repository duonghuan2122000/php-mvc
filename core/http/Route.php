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
         *          'action' => $action
         *      ]
         *  ]
         * </code>
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
            $route = [
                'url' => $url,
                'method' => $method,
                'action' => $action
            ];
            array_push($this->__routes, $route);
        }
    }
?>