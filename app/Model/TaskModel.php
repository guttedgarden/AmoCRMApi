<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class TaskModel extends BaseModel implements ModelInterface {

    /**
     * Saving, creating and sending a TaskModel to AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function save(): TaskModel
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["text"]) || !empty($this->fields["complete_till"])) {
            $this->fields = $this->httpClient->request("POST",UriConstants::TASK_URI, [$this->fields], $this->headers);
        } else {
            throw new Exception("The \"name\" or \"price\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Saving and updating the task from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): TaskModel
    {
        // TODO: Implement update() method.
        if(!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::TASK_URI . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new Exception("The \"name\" or \"price\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Getting a task from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): TaskModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::TASK_URI . "/" . $id, [], $this->headers);
        } else {
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }

    /**
     * Adds a note to an existing task
     *
     * @param NoteModel $note
     * @return TaskModel
     */
    public function addNote(NoteModel $noteModel): TaskModel
    {
        // TODO: Implement addNote() method.
        return $noteModel->getFields();
    }
}