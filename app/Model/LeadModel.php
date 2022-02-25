<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class LeadModel extends BaseModel implements ModelInterface {

    /**
     * Saving, creating and sending a lead to AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function save(): LeadModel
    {
        if (!empty($this->fields["name"]) || !empty($this->fields["price"])) {
            $this->fields = $this->httpClient->request("POST",UriConstants::LEAD_URI_V4, [$this->fields], $this->token);
        } else {
            throw new Exception("The \"name\" or \"price\" of the transaction cannot be empty");
        }
        return $this;
    }


    /**
     * Saving and updating the lead from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): LeadModel
    {
        if (!empty($this->fields["id"])) {
            $this->fields = $this->httpClient->request("PATCH", UriConstants::LEAD_URI_V4 . "/" . $this->fields["id"], $this->fields, $this->token);
        } else {
            throw new Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Getting a lead from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): LeadModel
    {
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::LEAD_URI_V4 . "/" . $id, [], $this->token);
        } else {
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }


    /**
     * @param NoteModel $noteModel
     * @return $this
     * @throws Exception
     */
    public function addNote(NoteModel $noteModel): LeadModel
    {
        $note = $noteModel->getFields();
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::LEAD_URI_V4 . '/' . $this->fields["id"] . '/notes', [$note], $this->token);
        }
        else {
            throw new Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Returns an array of company fields
     *
     * @return mixed
     */

//    public function addContact(ContactModel $contact): LeadModel
//    {
//        $contact = $contact->getFieldsAsArray();
//        $this->fields["_embedded"]["tags"] = [];
//        if (!empty($contact["id"])){
//            $this->fields["_embedded"]["contact"]["id"] = $contact["id"];
//            $this->fields["_embedded"]["contact"]["request_id"] = 0;
//            $this->fields["_embedded"]["contact"]["_links"] = $contact["_links"];
//        } else {
//            $this->fields["_embedded"]["contact"] = $contact;
//        }
//        return $this;
//    }


}