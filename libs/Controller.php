<?php
class  Controller {
    protected $view;
    protected $folder;
    protected $query;
    protected $query_message=[];
    protected $validator;

    public  function render(){
        $pathDefaultLayout="./views/layout/defaultLayout.php";
        $pathDefaultView="./views/".$this->folder."/".$this->view.".php";
        ob_start();
        extract($this->query_message);
        require_once "$pathDefaultView";
        $dynamic_view =ob_get_clean();
        require_once "$pathDefaultLayout";
    }
}
