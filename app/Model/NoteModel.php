<?php

namespace App\Model;

class NoteModel{

    private $fields;

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->fields[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->fields[$key] = $value;
    }

    /**
     * Returns an array of note fields
     *
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }
}