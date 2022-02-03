# API client for amoCRM
This package implements an API client with support for basic entities and authorization via the OAuth 2.0 protocol in amoCRM. PHP version no lower than 7.1 is required to work.
____
## Table of contents
- [Tokens](#tokens)
  + [Getting a token is done in the following way](#getting-a-token-is-done-in-the-following-way)
  + [Getting access_token and refresh_token is done using this code](#getting-access_token-and-refresh_token-is-done-using-this-code)
- [Leads](#leads)
  + [Get all leads](#get-all-leads)
  + [Get lead by id](#get-lead-by-id)
  + [Create new lead](#create-new-lead)
  + [Update lead](#update-lead)
  + [Add note to lead](#add-note-to-lead)
- [Contact](#contact)
  + [Get all contacts](#get-all-contacts)
  + [Get contact by id](#get-contact-by-id)
  + [Create new contact](#create-new-contact)
  + [Update contact](#update-contact)
  + [Add note to contact](#add-note-to-contact)
- [Company]($company)
  + [Get all companys](#get-all-companys)
  + [Get company by id](#get-company-by-id)
  + [Create new company](#create-new-company)
  + [Update company](#update-company)
  + [Add note to company](#add-note-to-company)
- [Customer]($customer)
  + [Get all customer](#get-all-customer)
  + [Get customer by id](#get-customer-by-id)
  + [Create new customer](#create-new-customer)
  + [Update customer](#update-customer)
  + [Add note to customer](#add-note-to-customer)
- [Task]($task)
  + [Get all task](#get-all-task)
  + [Get task by id](#get-task-by-id)
  + [Create new task](#create-new-task)
  + [Update task](#update-task)
____
## Examples
### Tokens
JSON file with tokens is stored in the location specified by the user. The JSON file itself is the following structure:
```json
{
  "access_token": ...,
  "refresh_token": ...,
  "token_type": ...,
  "begin_in": ...,
  "expires_in": ...,
}
```

### Getting a token is done in the following way
```php
use App\Client\AmoApiClient;

$client = new AmoApiClient(
    $subDomain,
    $client_id,
    $client_secret,
    $code,
    $redirect_uri,
    $pathToConfig);
```
### Getting access_token and refresh_token is done using this code
```php
try {
    $tokens = $client->getToken();
    echo PHP_EOL . PHP_EOL;
} catch (Exception $exception){
    echo $exception;
}
```
____
## Leads
### Get all leads
```php
try{
    $leads = $client->leads()->getAll([]);
    print_r($leads);
} catch (Exception $exception){
    echo $exception;
}
```
### Get lead by id
```php
try {
    $lead = $client->leads()->create()->getById(28643682);
    print_r($lead);
} catch (Exception $exception){
    echo $exception;
}
```
### Create new lead
```php
try{
    $lead = $client->leads()->create();
    $lead->name = "APVTestNew32";
    $lead->price = 321;
    print_r($lead->save());
} catch (Exception $exception){
    echo $exception;
}
```
### Update lead
```php
try {
    $lead = $client->leads()->create();
    $lead->id = 28643682;
    $lead->name = "APVTestUpdate32";
    $lead->price = 123;
    print_r($lead->update());
} catch (Exception $exception){
    echo $exception;
}

```

### Add note to lead
```php
try {
    $lead = $client->leads()->create()->getById(28643682);
    $note = new Note();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note";
    print_r($lead->addNote($note->getFields()));
} catch (Exception $exception){
    echo $exception;
}
```

____
## Contact
### Get all contacts
```php
try{
    $contact = $client->contacts()->getAll([]);
    print_r($contact);
}catch (Exception $exception){
    echo $exception;
}
```
### Get contact by id
```php
try {
    $contact = $client->contacts()->create()->getById(46050921);
    print_r($contact->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```
### Create new contact
```php
try{
    $contact = $client->contacts()->create();
    $contact->name = "APVTestNewContact";
    print_r($contact->save());
} catch (Exception $exception){
    echo $exception;
}
```
### Update contact
```php
try {
    $contact = $client->contacts()->create();
    $contact->id = 46050921;
    $contact->name = "APVTestNewContactUpdate";
    print_r($contact->update());
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to contact
```php
try {
    $contact = $client->contacts()->create()->getById(46050921);
    $note = new Note();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note to ContactModel";
    print_r($contact->addNote($note->getFields()));
} catch (Exception $exception){
    echo $exception;
}
```
____
## Company
### Get all companys
```php
try{
    $company = $client->company()->getAll([]);
    print_r($company);
}catch (Exception $exception){
    echo $exception;
}
```
### Get company by id
```php
try {
    $company = $client->company()->create()->getById(46050853);
    print_r($company->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```
### Create new company
```php
try{
    $company = $client->company()->create();
    $company->name = "APVTestNewCompany";
    print_r($company->save());
} catch (Exception $exception){
    echo $exception;
}
```
### Update company
```php
try {
    $company = $client->company()->create();
    $company->id = 46050853;
    $company->name = "APVTestNewCompanyUpdate";
    print_r($company->update());
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to company
```php
try {
    $company = $client->company()->create()->getById(46050853);
    $note = new Note();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note to CompanyModel";
    print_r($company->addNote($note->getFields()));
} catch (Exception $exception){
    echo $exception;
}
```
## Customer
### Get all customers
```php
try{
    $customer = $client->customers();
    print_r($customer->getAll([]));
}catch (Exception $exception){
    echo $exception;
}
```
### Get customer by id
```php
try {
    $customer = $client->customers()->create()->getById(183665);
    print_r($customer->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```
### Create new customer
```php
try{
    $customer = $client->customers()->create();
    $customer->name = "APVTestCustomer";
    print_r($customer->save()->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```
### Update customer
```php
try {
    $customer = $client->customers()->create();
    $customer->id = 187447;
    $customer->name = "APVTestCustomerUpdate";
    print_r($customer->update()->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to customer
```php
try {
    $customer = $client->customers()->create()->getById(187447);
    $note = new Note();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note to CustomerModel";
    print_r($customer->addNote($note->getFields()));
} catch (Exception $exception){
    echo $exception;
}

```
____
## Task
### Get all Task
```php
try{
$task = $client->task();
print_r($task->getAll([]));
}catch (Exception $exception){
echo $exception;
}
```
### Get task by id
```php
try {
    $task = $client->task()->create()->getById(46510275);
    print_r($task->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```

### Create new task
```php
try{
    $task = $client->task()->create();
    $task->task_type_id = TaskConstants::TASK_TYPE_CONTACT;
    $task->text = "Test task for 28643682";
    $task->entity_id = 28643682;
    $task->entity_type = "leads";
    $task->complete_till = time() + 3600;
    print_r($task->save()->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```

### Update task
```php
try {
    $task = $client->task()->create()->getById(50989199);
    $task->task_type_id = TaskConstants::TASK_TYPE_MEETING;
    $task->text = "Update task for 28643682";
    print_r($task->update()->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```