# API client for amoCRM
This package implements an API client with support for basic entities and authorization via the OAuth 2.0 protocol in amoCRM. PHP version no lower than 7.4 is required to work.
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
try{
    $lead = $client->leads()->getById(id);
    print_r($lead);
} catch (Exception $exception){
    echo $exception;
}
```
### Create new lead
```php
try{
    $lead = new Lead();
    $lead->name = "testAmoAPI";
    $lead->price = 123;
    $lead = $client->leads()->save($lead->getFields());
    print_r($lead);
} catch (Exception $exception){
    echo $exception;
}
```
### Update lead
```php
try{
    $lead = new Lead();
    $lead->id = 28636104;
    $lead->name = "testAPVA1pi123";
    $lead->price = 123;
    $lead = $client->leads()->save($lead->getFields());
    print_r($lead);
} catch (Exception $exception){
    echo $exception;
}
```

### Add note to lead
```php
try{
    $note = new Note();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "TestNoteAPV";
    $note = $client->leads()->addNoteById(28641946, $note->getFields());
    print_r($note);
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
try{
    $contact = $client->contacts()->getById(46014081);
    print_r($contact);
} catch (Exception $exception){

}
```
### Create new contact
```php
try{
    $contact = new Contact();
    $contact->name = "Test Contact APV";
    print_r($client->contacts()->save($contact->getFields()));
} catch (Exception $exception){
    echo $exception;
}
```
### Update contact
```php
try {
    $contact = new Contact();
    $contact->id = 46046788;
    $contact->name = "UpdateAPVApi";
    $contact = $client->contacts()->update($contact->getFields());
    print_r($contact);
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to contact
```php
try{
    $note = new Note();
    $note->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $note->text = "TestContactNote";
    $note = $client->contacts()->addNoteById(46046788, $note->getFields());
    print_r($note);
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
try{
    $company = $client->company()->getById(46001739);
    print_r($company);
} catch (Exception $exception){
    echo $exception;
}
```
### Create new company
```php
try{
    $company = new Company();
    $company->name = "Test Company APV";
    print_r($client->company()->save($company->getFields()));
} catch (Exception $exception){
    echo $exception;
}
```
### Update company
```php
try{
    $company = new Company();
    $company->id = 46047244;
    $company->name = "Test Company APVUpdate12";
    $company = $client->company()->update($company->getFields());
    print_r($company);
} catch (Exception $exception){
    echo $exception;
}
```
### Add note to company
```php
try{
    $company = new Company();
    $company->note_type = NoteConstants::NOTE_TYPE_COMMON;
    $company->text = "TestCompanyNoteAPV";
    $company = $client->company()->addNoteById(46047268, $company->getFields());
    print_r($company);
} catch (Exception $exception){
    echo $exception;
}
```
