<?php
namespace App\Interfaces;
interface ModelInterface
{
    public function __get($key);
    public function __set($key, $value);
    public function save();
    public function update();
    public function getById($id);
    public function addNote($note);
}