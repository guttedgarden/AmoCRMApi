<?php

namespace App\Model;

class Contact{

    private $fields;

    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->fields[$key];
    }

    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->fields[$key] = $value;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        if (!empty($this->fields["name"])) {
            return $this->fields;
        } else {
            throw new \Exception('The contact must have a "name" field');
        }
    }
}