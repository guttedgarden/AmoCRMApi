<?php
namespace App\Interfaces;
interface ModelInterface
{
    /**
     * @param $key
     * @return mixed
     */
    public function __get($key);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function __set($key, $value);

    /**
     * Saving, creating and sending a Company|Contact|Lead to AmoCRM
     *
     * @return mixed
     */
    public function save();

    /**
     * Saving and updating the Company|Contact|Lead from AmoCRM
     *
     * @return mixed
     */
    public function update();

    /**
     * Getting a Company|Contact|Lead from AmoCRM by ID
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * Adds a note to an existing Company|Contact|Lead
     *
     * @param array $note
     * @return mixed
     */
    public function addNote(array $note);

    /**
     * Returns an array of Company|Contact|Lead fields
     *
     * @return mixed
     */
    public function getFieldsAsArray();
}