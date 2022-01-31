<?php

namespace App\Model;

class Lead{

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
     * @throws \Exception
     */
    public function getFields()
    {
        if (!empty($this->fields["name"]) || !empty($this->fields["price"])) {
            return $this->fields;
        } else {
            throw new \Exception('The name or price of the transaction cannot be empty');
        }
    }
}