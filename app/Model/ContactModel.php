<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class ContactModel extends BaseModel implements ModelInterface {

    /**
     * Saving, creating and sending a contact to AmoCRM
     *
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function save(): ContactModel
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::CONTACT_URI_V4, [$this->fields]);
        } else {
            throw new Exception("The \"name\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Saving and updating the contact from AmoCRM
     *
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function update(): ContactModel
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::CONTACT_URI_V4 . "/" . $this->fields["id"], $this->fields);
        } else {
            throw new Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Getting a contact from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function getById(int $id): ContactModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::CONTACT_URI_V4 . "/" . $id);
        } else{
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }

    /**
     * Adds a note to an existing contact
     *
     * @param NoteModel $noteModel
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function addNote(NoteModel $noteModel): ContactModel
    {
        // TODO: Implement addNote() method.
        $note = $noteModel->getFields();
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::CONTACT_URI_V4 . '/' . $this->fields["id"] . '/notes', [$note]);
        } else {
            throw new Exception("The \"id\", \"note_type\", \"text\" field cannot be empty for a contact");
        }
        return $this;
    }


}