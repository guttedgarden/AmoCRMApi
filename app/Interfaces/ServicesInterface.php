<?php
namespace App\Interfaces;
interface ServicesInterface
{
    public function getAll($filter);
    public function getById(int $id);
    public function update(array $array);
    public function save(array $array);
    public function addNoteById (int $id, array $note);
//    public function __get($key);
//    public function __set($key, $value);
//    public function getFields();
}