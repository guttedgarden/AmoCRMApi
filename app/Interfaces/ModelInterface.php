<?php
namespace App\Interfaces;
use App\Model\NoteModel;

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
     * Saving, creating and sending a CompanyModel|ContactModel|LeadModel to AmoCRM
     *
     * @return mixed
     */
    public function save();

    /**
     * Saving and updating the CompanyModel|ContactModel|LeadModel from AmoCRM
     *
     * @return mixed
     */
    public function update();

    /**
     * Getting a CompanyModel|ContactModel|LeadModel from AmoCRM by ID
     *
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * Adds a note to an existing CompanyModel|ContactModel|LeadModel
     *
     * @param array $note
     * @return mixed
     */
    public function addNote(NoteModel $note);

    /**
     * Returns an array of CompanyModel|ContactModel|LeadModel fields
     *
     * @return mixed
     */
    public function getFieldsAsArray();
}