<?php 
    /**
     * 
     * Author: Jocelyn
     * Email: duong.huan21222000@gmail.com
     * 
     */
    namespace Core\Config;

    use Exception;

    class Config {
        private static $__configs = [];

        /**
         * 
         * Ham get config
         * 
         * @param string $name Ten config can lay
         * 
         * @return mixed
         */
        private static function __getConfig($name)
        {
            return isset(self::$__configs[$name]) ? self::$__configs[$name] : false;
        }

        /**
         * 
         * Ham set config
         * 
         * @param string $name Ten config can set
         * @param string $value Gia tri cua config
         * 
         * 
         */
        private static function __setConfig($name, $value)
        {
            self::$__configs[$name] = $value;
        }


        public static function __callStatic($name, $arguments)
        {
            if($name != 'config'){
                throw new Exception("Method $name is not define");
            }
            $count_args = count($arguments);
            if($count_args != 1 && $count_args != 2){
                throw new Exception("Method config parameter is not right");
            } else if($count_args == 2){
                self::__setConfig($arguments[0], $arguments[1]);
            } else {
                return self::__getConfig($arguments[0]);
            }
        }
    }
?>