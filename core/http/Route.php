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
        // Mang luu tru tat ca route cua ung dung
        private $__routes;

        // Ham khoi tao 
        public function __construct()
        {
            
        }

        // phuong thuc get
        public function get(string $url, $action)
        {
            $this->__request($url, $action);
        }

        // phuong thuc post
        public function post()
        {

        }

        // xu ly phuong thuc
        private function __request(string $url, $action)
        {

        }
    }
?>