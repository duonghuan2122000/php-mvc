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

use Core\Config\Config;
use Core\View\Template;

    class BaseController {

        /**
         * Bien dinh nghia views engine cua ung dung
         * Su dung plates engine. Repository: https://github.com/thephpleague/plates
         */
        private $__template;

        public function __construct()
        {
            $this->__template = new Template(PATH_ROOT.'/app/views');
        }

        /**
         * 
         * Ham load view
         * 
         * @param string $view_name Ten file view
         * @param array $args Cac gia tri can truyen tu controller toi view.
         * 
         * @return string
         */
        protected function view(string $view_name, $args)
        {
            try {
                //code...
                return $this->__template->render($view_name, $args);
            } catch (\Throwable $th) {
                echo 'Error';
                if(Config::config('DEBUG')){
                    echo '<pre>';
                    echo strval($th);
                    echo '</pre>';
                }
            }
            
        }
    }
?>