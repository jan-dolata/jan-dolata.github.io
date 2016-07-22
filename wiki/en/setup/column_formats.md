Column format
===

## Types

* text - default - 20 characters of string or length of array
* longtext - show all string value
* link
* bool - Yes / No
* files - list of files (json attribute with file paths and names)

## Usage

To change column format use `$this->crudeSetup->setColumnFormat()` in crude `__construct`

```php
$this->crudeSetup->setColumnFormat('first_name', 'longtext');
```

or

```php
$this->crudeSetup->setColumnFormat([
    'first_name' => 'longtext',
    'last_name' => 'longtext',
    'is_admin' => 'bool'
]);
```

or (for link)

```php
->setColumnFormat([
    'first_name' => [
        'type' => 'link',
        'url' => route('user_profile'),  // url
        'attr' => 'id'                   // attr to create full url (url/id)
    ]
])
```
