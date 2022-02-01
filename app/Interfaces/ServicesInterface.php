<?php
namespace App\Interfaces;
interface ServicesInterface
{
    /**
     * Returns all Company's|Contact's|Lead's as array
     *
     * @param array $filter
     * @return mixed
     */
    public function getAll(array $filter);

    /**
     * Creates a new instance of the Company|Contact|Lead class
     *
     * @return mixed
     */
    public function create();
}