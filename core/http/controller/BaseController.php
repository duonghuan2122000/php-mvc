<?php 
    /**
     * 
     * Author: Jocelyn
     * Email: duong.huan21222000@gmail.com
     * 
     * Khong duoc xoa file controller nay
     * 
     */
    namespace Core\Http\Controller;
    use Core\View\Engine;
    
    class BaseController {

        /**
         * Bien dinh nghia views engine cua ung dung
         * Su dung plates engine. Repository: https://github.com/thephpleague/plates
         */
        private $__template;

        public function __construct()
        {
            $this->__template = new Engine(PATH_ROOT.'/app/views');
        }

        /**
         * 
         * Ham load view
         * 
         * @param string $view_name Ten file view
         * @param array $args Mang gia tri can truyen tu controller toi view.
         * 
         * @return string
         */
        protected function view(string $view_name, $args)
        {
            return $this->__template->render($view_name, $args);
        }
    }
?>