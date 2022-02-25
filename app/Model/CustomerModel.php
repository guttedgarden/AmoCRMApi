<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class CustomerModel extends BaseModel implements ModelInterface{

    /**
     * Saving, creating and sending a customer to AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function save(): CustomerModel
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::CUSTOMER_URI, [$this->fields], $this->headers);
        } else {
            throw new Exception("The \"name\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Saving and updating the customer from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): CustomerModel
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::CUSTOMER_URI . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Getting a CustomerModel from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): CustomerModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::CUSTOMER_URI . "/" . $id, [], $this->headers);
        } else{
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }

    /**
     * Adds a note to an existing customer
     *
     * @param NoteModel $noteModel
     * @return $this
     * @throws Exception
     */
    public function addNote(NoteModel $noteModel): CustomerModel
    {
        $note = $noteModel->getFields();
        // TODO: Implement addNote() method.
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::CUSTOMER_URI . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
        } else {
            throw new Exception("The \"id\", \"note_type\", \"text\" field cannot be empty for a contact");
        }
        return $this;
    }
}