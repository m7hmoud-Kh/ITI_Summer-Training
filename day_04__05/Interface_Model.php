<?php

interface Model
{
    public function store($data);
    public function retrive();
    public function update($data);
    public function delete($id);
}

