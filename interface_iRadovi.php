<?php

interface iRadovi{
    //CRUD
    public function create($data);
    public function delete();
    public function update($data);
    public function read();
    public function save($data);
}

?>