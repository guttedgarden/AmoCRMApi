<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Client\AmoApiClient;
use App\Constants\NoteConstants;
use App\Constants\TaskConstants;
use App\Model\CompanyModel;
use App\Model\ContactModel;
use App\Model\LeadModel;
use App\Model\NoteModel;
use App\Oauth\AmoOauth;
use App\Services\ContactServices;

$subDomain = "dlatestov";
$client_id = "b73e40b3-23dc-40ff-ac18-3876df9ec720";
$client_secret = "pSkyAXszupCWhTYp10XEyl6wexCJu59wDgrxr1j93aaEoEghY1rTxz37nLwjt3Pw";
$code = "def50200903c3282aed6108b7681e6ea987844b9a280ea9fb5a0e6dbe56c20842e138400e66b9dfd060f041fd41b2ca52d115fdbaddcb273fac548132c59f346daef853bd9a0ffac6e6401185fa9702975d388f5d1eea774dc2edba725196619f19b2950586e82d73cd368ee9a499506e3fdcbb599734fa196cb367f17aecc21418b3970578dc22853cb86e5a1db311de00226074669fc59ddce733b6ff0b9136739952bea94e96a41d80c2565cc0d9a9c35510913309bd9bf8e4616aa728b446eac81a556b658e316a8e8a17803239f28bc902b9baba507fef5789f8337ae3dde0bb1c9911f612d4c5e2310fc5a070c1103c1ac91155061c7f4395ef401f9a45ece674c1c304efdbef4f011a7a79952254f2194979e8a97f338915d9096bab9ef9f364ba97a47febb0d858e3d56448425a3afa456c72230a1063d86bb7f8978907d75eabd196c11b11197fc7ab6f7ae1fa89a52f03c88e833dc302e75d1d5ad7a13c8b349022aa37e5bc21d65a43c751a6f52ea978dbbd1fb578dad60797d4019031490ed2841c19ac8476443b502c02373a49e51ff3e478e7367be4cce75675a9f8fa4ea4f9f7855e0ebdefd17d64467f269fdb1cb939d5f678e";
$redirect_uri = "https://example.com";
$pathToConfig = "config.json";

$client = new AmoApiClient(
    $subDomain,
    $client_id,
    $client_secret,
    $code,
    $redirect_uri,
    $pathToConfig);

//Создание токена и его рефреш
try {
    $tokens = $client->getToken();
    //print_r($tokens);
    echo PHP_EOL . PHP_EOL;
} catch (Exception $exception){
    echo $exception;
}

//Новая версия создания сделки
//try{
//    $lead = $client->leads()->create();
//    $lead->name = "APVTestNew32";
//    $lead->price = 321;
//    print_r($lead->save());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия обновления сделки
//try {
//    $lead = $client->leads()->create();
//    $lead->id = 28643682;
//    $lead->name = "APVTestUpdate32";
//    $lead->price = 123;
//    print_r($lead->update());
//} catch (Exception $exception){
//    echo $exception;
//}

////Новая версия получения лида по id
//try {
//    $lead = $client->leads()->create()->getById(28643682);
//    print_r($lead->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

////Новая версия добавления примечания лиду
//try {
//    $lead = $client->leads()->create()->getById(28643682);
//    $note = new NoteModel();
//    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
//    $note->text = "New test note";
//    print_r($lead->addNote($note->getFields()));
//} catch (Exception $exception){
//    echo $exception;
//}


//Новая версия создания компании
//try{
//    $company = $client->company()->create();
//    $company->name = "APVTestNewCompany";
//    print_r($company->save());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия обновления компании
//try {
//    $company = $client->company()->create();
//    $company->id = 46050853;
//    $company->name = "APVTestNewCompanyUpdate";
//    print_r($company->update());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия получения компании по id
//try {
//    $company = $client->company()->create()->getById(46050853);
//    print_r($company->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

////Новая версия добавления примечания компании
//try {
//    $company = $client->company()->create()->getById(46050853);
//    $note = new NoteModel();
//    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
//    $note->text = "New test note to CompanyModel";
//    print_r($company->addNote($note->getFields()));
//} catch (Exception $exception){
//    echo $exception;
//}



//Новая версия создания контакта
//try{
//    $contact = $client->contacts()->create();
//    $contact->name = "APVTestNewTestContact";
//    print_r($contact->save());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия обновления контакта
//try {
//    $contact = $client->contacts()->create();
//    $contact->id = 46050921;
//    $contact->name = "APVTestNewContactUpdate";
//    print_r($contact->update());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия получения компании по id
//try {
//    $contact = $client->contacts()->create()->getById(46050921);
//    print_r($contact->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия добавления примечания компании
//try {
//    $contact = $client->contacts()->create()->getById(46050921);
//    $note = new NoteModel();
//    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
//    $note->text = "New test note to ContactModel";
//    print_r($contact->addNote($note->getFields()));
//} catch (Exception $exception){
//    echo $exception;
//}



//Новая версия получения всех задач
//try{
//    $task = $client->task();
//    print_r($task->getAll([]));
//}catch (Exception $exception){
//    echo $exception;
//}

//Новая версия получения задачи по id
//try {
//    $task = $client->task()->create()->getById(46510275);
//    print_r($task->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия создания задачи
//try{
//    $task = $client->task()->create();
//    $task->task_type_id = TaskConstants::TASK_TYPE_CONTACT;
//    $task->text = "Test task for 28643682";
//    $task->entity_id = 28643682;
//    $task->entity_type = "leads";
//    $task->complete_till = time() + 3600;
//    print_r($task->save()->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия обновления задачи 50989199
//try {
//    $task = $client->task()->create()->getById(50989199);
//    $task->task_type_id = TaskConstants::TASK_TYPE_MEETING;
//    $task->text = "Update task for 28643682";
//    print_r($task->update()->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия получения всех покупателей
//try{
//    $customer = $client->customers();
//    print_r($customer->getAll([]));
//}catch (Exception $exception){
//    echo $exception;
//}

//Новая версия получения покупателей по id
//try {
//    $customer = $client->customers()->create()->getById(183665);
//    print_r($customer->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия создания покупателя
//try{
//    $customer = $client->customers()->create();
//    $customer->name = "APVTestCustomer";
//    print_r($customer->save()->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия обновления покупателя
//try {
//    $customer = $client->customers()->create();
//    $customer->id = 187447;
//    $customer->name = "APVTestCustomerUpdate";
//    print_r($customer->update()->getFieldsAsArray());
//} catch (Exception $exception){
//    echo $exception;
//}

//Новая версия добавления примечания покупателю
//try {
//    $customer = $client->customers()->create()->getById(187447);
//    $note = new NoteModel();
//    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
//    $note->text = "New test note to CustomerModel";
//    print_r($customer->addNote($note->getFields()));
//} catch (Exception $exception){
//    echo $exception;
//}

//try {
//    $lead = $client->leads()->create()->getById(28643682);
//    $contact = $client->contacts()->create();
//    $contact->name = "test contact";
//    $lead = $lead->addContact($contact->getFieldsAsArray());
//    print_r($lead->update());
//} catch (Exception $exception){
//    echo $exception;
//}

try{
    $lead = $client->leads()->create();
    $lead->name = "APVTestLeadWithContact";
    $lead->price = 321;
    $contact = $client->contacts()->create();
    $contact->name = "ООО Копыта и Рога";
    print_r($lead->addContact($contact->getFieldsAsArray())->save());
} catch (Exception $exception){
    echo $exception;
}
