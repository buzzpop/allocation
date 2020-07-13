<?php
class DefaultController extends Controller {
    public function  __construct(){
        $this->view="presentation";
        $this->folder="default";
    }

    public function index(){
       $this->render();
    }
}