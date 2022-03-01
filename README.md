# API client for amoCRM
This package implements an API client with support for basic entities and authorization via the OAuth 2.0 protocol in amoCRM. PHP version no lower than 7.1 is required to work.
____
## Table of contents
- [Tokens](#tokens)
  + [Creating a new client](#creating-a-new-client)
  + [Getting token](#getting-token)
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
- [Company](#company)
  + [Get all companys](#get-all-companys)
  + [Get company by id](#get-company-by-id)
  + [Create new company](#create-new-company)
  + [Update company](#update-company)
  + [Add note to company](#add-note-to-company)
- [Customer](#customer)
  + [Get all customer](#get-all-customers)
  + [Get customer by id](#get-customer-by-id)
  + [Create new customer](#create-new-customer)
  + [Update customer](#update-customer)
  + [Add note to customer](#add-note-to-customer)
- [Task](#task)
  + [Get all task](#get-all-task)
  + [Get task by id](#get-task-by-id)
  + [Create new task](#create-new-task)
  + [Update task](#update-task)
- [Users](#users)
  + [Get all users](#get-all-users)
  + [Get all roles](#get-all-roles)
  + [Get user by id](#get-user-by-id)
  + [Get role by id](#get-role-by-id)

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

### Creating a new client
If a JSON file with Refresh Token exists, then the following construction is used (If no code is passed, the Refresh method will be called. If passed, the Auth method will be called.)
```php
use App\Client\AmoApiClient;

$client = new AmoApiClient(
    $subDomain,
    $client_id,
    $client_secret,
    $redirect_uri
);
```
If this is the first run, then the following construction is used
```php
use App\Client\AmoApiClient;

$client = new AmoApiClient(
    $subDomain,
    $client_id,
    $client_secret,
    $redirect_uri,
    $code
);

// OR
$client = new AmoApiClient(
    $subDomain,
    $client_id,
    $client_secret,
    $redirect_uri
);
$client->setAuthCode($code);
```

### Getting token
```php
try {
    $tokens = $client->getToken();
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
} catch (Exception $exception){
    echo $exception;
}
```
### Create new lead
```php
try{
    $lead = $client->leads()->create();
    $lead->name = "VTestNew213152224";
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
    $lead->id = 28709597;
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
    $lead = $client->leads()->create()->getById(28709597);
    $note = $lead->newNote();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note";
    print_r($lead->addNote($note));
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
    $contact->name = "APVTestNewTestContact";
    print_r($contact->save());
} catch (Exception $exception){
    echo $exception;
}
```
### Update contact
```php
try {
    $contact = $client->contacts()->create();
    $contact->id = 46102629;
    $contact->name = "APVTestNewContactUpdate!";
    print_r($contact->update());
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to contact
```php
try {
    $contact = $client->contacts()->create()->getById(46102629);
    $note = $contact->newNote();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note to ContactModel";
    print_r($contact->addNote($note));
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
    $company = $client->company()->create()->getById(46102613);
    $note = $company->newNote();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note to CompanyModel!";
    print_r($company->addNote($note));
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
    $customer->name = "!APVTestCustomer";
    print_r($customer->save()->getFieldsAsArray());
} catch (Exception $exception){
    echo $exception;
}
```
### Update customer
```php
try {
    $customer = $client->customers()->create();
    $customer->id = 187873;
    $customer->name = "APVTestCustomerUpdate!";
    print_r($customer->update());
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to customer
```php
try {
    $customer = $client->customers()->create()->getById(187873);
    $note = $customer->newNote();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "New test note to CustomerModel";
    print_r($customer->addNote($note));
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
    print_r($task);
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
    print_r($task->save());
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
    print_r($task->update());
} catch (Exception $exception){
    echo $exception;
}
```

____
## Users
### Get all users
```php
try{
    $user = $client->users()->getAllUsers([]);
    print_r($user);
} catch (Exception $exception){
    echo $exception;
}
```
### Get all roles
```php
try{
    $user = $client->users()->getAllRoles([]);
    print_r($user);
} catch (Exception $exception){
    echo $exception;
}

```
### Get user by id
```php
try{
    $user = $client->users()->create()->getUserById(123);
    print_r($user);
} catch (Exception $exception){
    echo $exception;
}

```
### Get role by id
```php
try{
    $user = $client->users()->create()->getRoleById(123);
    print_r($user);
} catch (Exception $exception){
    echo $exception;
}

```