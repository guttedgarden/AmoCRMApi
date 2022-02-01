<?php
namespace App\Interfaces;
interface ServicesInterface
{
    public function getAll($filter);
    public function create();
}