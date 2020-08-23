<?php 
    /**
     * 
     * Author: Jocelyn
     * Email: duong.huan21222000@gmail.com
     * 
     */
    namespace App\Controllers;

    class HomeController extends Controller {
        public function index()
        {
            echo $this->view('profile', ['name' => 'huan']);
        }
    }
?>