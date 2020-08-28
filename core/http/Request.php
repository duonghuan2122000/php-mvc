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
     * Class Request
     * 
     */
    class Request {

        /**
         * 
         * Ham lay gia tri $_GET 
         * 
         * @param string $key Key cua $_GET can lay
         * 
         * @return string
         * 
         */
        public static function get(string $key): string
        {
            return isset($_GET[$key]) ? $_GET[$key] : '';
        }

        /**
         * 
         * Ham lay gia tri $_POST 
         * 
         * @param string $key Key cua $_POST can lay
         * 
         * @return string
         * 
         */
        public static function post(string $key): string 
        {
            return isset($_POST[$key]) ? $_POST[$key] : '';
        }
    }
?>