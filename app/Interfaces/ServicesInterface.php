<?php

namespace App\Interfaces;

interface ServicesInterface
{
    /**
     * Returns all CompanyModel's|ContactModel's|LeadModel's as array
     *
     * @param array $filter
     * @return mixed
     */
    public function getAll(array $filter = []);

    /**
     * Creates a new instance of the CompanyModel|ContactModel|LeadModel class
     *
     * @return mixed
     */
    public function create();
}