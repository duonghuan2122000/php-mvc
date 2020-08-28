<?php 
    /**
     * 
     * Author: Jocelyn
     * Email: duong.huan21222000@gmail.com
     * 
     */
    namespace Core\View;

    use Exception;

    /**
     * 
     * Class Template
     * 
     */
    class Template {

        /**
         * 
         * Thu muc views
         * 
         */
        private $__directory;

        /**
         * 
         * Cac phuong thuc trong views: layout, renderSection, section, end.
         * 
         */
        // private $__methods;

        /**
         * 
         * Layout cua view
         * 
         */
        private $__layout;


        /**
         * 
         * Cac sections cua layout
         * 
         */
        private $__sections;


        /**
         * 
         * Section hien tai
         * 
         */
        private $__current_section;

        /**
         * 
         * Ham khoi tao
         * 
         * @param string $directory Thu muc views
         * 
         */
        public function __construct($directory)
        {
            $this->__setDirectory($directory);
            $this->__sections = [];
            $this->__layout = null;
            $this->__current_section = null;

        }

        /**
         * 
         * Ham set thuc muc views
         * 
         * @param string $directory Thu muc views
         * 
         */
        private function __setDirectory($directory)
        {
            if(!is_dir($directory)){
                throw new Exception("$directory is not exist");
            }
            $this->__directory = $directory;
        }

        /**
         * 
         * Ham kiem tra duong dan cua file
         * 
         * @param string $path Duong dan cua file
         * 
         * @return string 
         * 
         */
        private function __resolvePath($path)
        {
            $file = $this->__directory.'/'.$path.'.php';
            if(!file_exists($file)){
                throw new Exception("$file is not exist");
            }
            return $file;
        }

        /**
         * 
         * Ham load view
         * 
         * @param string $view_name Ten view
         * @param array $args Cac tham so can truyen qua view
         * 
         * @return string
         * 
         */
        public function render($view_name, $args)
        {
            if(is_array($args)){
                extract($args);
            }

            ob_start();

            include_once $this->__resolvePath($view_name);

            $content = ob_get_clean();

            if(empty($this->__layout)){
                return $content;
            }

            ob_clean();

            include_once $this->__resolvePath($this->__layout);

            $output = ob_get_contents();

            ob_end_clean();

            return $output;
        }

        /**
         * 
         * Include a view in a view
         * 
         * @param string $view_name Ten cua view can include
         * 
         * 
         */
        public function include($view_name)
        {
            ob_start();

            include_once $this->__resolvePath($view_name);

            $content = ob_get_contents();

            ob_end_clean();

            echo $content;
        }

        /**
         * 
         * Ham bat dau mot section
         * 
         * @param string $name Ten cua section
         * 
         */
        public function section($name)
        {
            $this->__current_section = $name;
            ob_start();
        }

        /**
         * 
         * Ham ket thuc mot section
         * 
         */
        public function end()
        {
            if(empty($this->__current_section)){
                throw new Exception("There is not a section start");
            }

            $content = ob_get_contents();
            
            ob_end_clean();

            $this->__sections[$this->__current_section] = $content;

            $this->__current_section = null;
        }

        /**
         * 
         * Ham ke thuc layout inherit trong views
         * 
         * @param string $layout Layout can ke thua
         * 
         */
        public function layout($layout)
        {
            $this->__layout = $layout;
        }

        /**
         * 
         * Ham render mot section trong file view layout
         * 
         * @param string $name Ten section can render
         * 
         * 
         */
        public function renderSection($name)
        {
            echo $this->__sections[$name];
        }
    }
?>