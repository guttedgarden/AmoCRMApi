<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class CompanyModel extends BaseModel implements ModelInterface {

    /**
     * Saving, creating and sending a company to AmoCRM
     * @return $this
     * @throws GuzzleException
     */
    public function save(): CompanyModel
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::COMPANY_URI, [$this->fields]);
        } else {
            throw new Exception("The \"name\" or \"price\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Saving and updating the company from AmoCRM
     *
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function update(): CompanyModel
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::COMPANY_URI . "/" . $this->fields["id"], $this->fields);
        } else {
            throw new Exception("The field \"id\" cannot be empty for the company");
        }
        return $this;
    }

    /**
     * Getting a company from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function getById(int $id): CompanyModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::COMPANY_URI . "/" . $id);
        } else {
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }

    /**
     * Adds a note to an existing company
     *
     * @param NoteModel $noteModel
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function addNote(NoteModel $noteModel): CompanyModel
    {
        // TODO: Implement addNote() method.
        $note = $noteModel->getFields();
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::COMPANY_URI . '/' . $this->fields["id"] . '/notes', [$note]);
        } else {
            throw new Exception("The \"id\", \"note_type\", \"text\" field cannot be empty for a company");
        }
        return $this;
    }

}