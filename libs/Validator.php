<?php
class Validator{
    private  $errors=[];

    public function getErrors(){
        return $this->errors;
    }
    public function isLenght($field,$key,$msg=""){
        if (strlen($field)>3){
            $this->errors[$key]=$msg;
        }
    }
    public function isNumeric($field,$key,$msg=""){
        if (!is_numeric($field)){
            $this->errors[$key]=$msg;
        }
    }
    public function  isValid(){
        return count($this->errors)==0;
    }

    public function  isVide($field, $key, $msg="Ce champs est obligatoire"){
       if ($field==""){
           $this->errors[$key]=$msg;
       }
    }

}