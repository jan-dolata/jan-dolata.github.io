Walidowanie modeli przed zapisem
===

Aktywowanie opcji następuje po dodaniu interfacu `CrudeWithValidationInterface` (lub `CrudeCRUDWithValidationInterface`).

Dodaj trait `CrudeWithValidationTrait` i ustaw reguły walidacji w konstruktorze klasy.

[Laravel 5.2 dostępne reguły](https://laravel.com/docs/5.2/validation#available-validation-rules)

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

Aby przekazać atrybuty (podesłane do api przy zapisie) do reguł:

```php
    $this->setValidationRules([
        'number_a' => 'max:{$number_b}',
        'number_b' => 'min:{$number_a}'
    ]);
```

Przykład:

Reguła sprawdzająca unikatowość (również dla edycji):

```php
    $this->setValidationRules([
        'attr' => 'unique:table,attr,{$id}'
    ]);
```

Reguła sprawdzająca unikatowość pary atrybutów:

```php
    $this->setValidationRules([
        'attr_1' => 'unique:table,attr_1,{$id},id,attr_2,{$attr_2}'
    ]);
```
