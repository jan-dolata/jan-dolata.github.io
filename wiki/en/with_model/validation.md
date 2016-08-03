Validation
===

To turn on validation, implement interface `CrudeWithValidationInterface` (or `CrudeCRUDWithValidationInterface`).

Use trait `CrudeWithValidationTrait`.

Validation rules define in crude class construct.

[Laravel 5.2 available validation rules](https://laravel.com/docs/5.2/validation#available-validation-rules)

```php
<?php

namespace App\Engine\Crude;

class ListName extends \Crude implements \CrudeCRUDWithValidationInterface
{
    use \CrudeFromModelTrait;
    use \CrudeWithValidationTrait;

    public function __construct()
    {
        $this->setModel(new \App\Engine\Models\ModelName);

        $this->prepareCrudeSetup();

        $this->setValidationRules([
            'name' => 'required',
            'email' => 'required|email'
        ]);
    }

}
```

If you need to pass the attributes of the model:

```php
    $this->setValidationRules([
        'number_a' => 'max:{$number_b}',
        'number_b' => 'min:{$number_a}'
    ]);
```

Example:

Rule for unique value (for store and update):

```php
    $this->setValidationRules([
        'attr' => 'unique:table,attr,{$id}'
    ]);
```

Rule for unique pairs of values:

```php
    $this->setValidationRules([
        'attr_1' => 'unique:table,attr_1,{$id},id,attr_2,{$attr_2}'
    ]);
```

