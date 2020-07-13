<?php

interface IDao{

    public function add($obj);
    public function update($obj);
    public function recoverAll();
}