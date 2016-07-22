First steps
===

Create dir `app/Engine/Crude`.

Create model with migration.

In app/Engine/Crude directory create class for list

```php
<?php

namespace App\Engine\Crude;

use Crude;
use CrudeListInterface;
use CrudeFromModelTrait;

class ListName extends Crude implements
    CrudeListInterface
{

    use CrudeFromModelTrait;

    public function __construct()
    {
        $this->setModel(new \App\Engine\Models\ModelName);

        $this->prepareCrudeSetup();
    }

}
```

In controller action

```php
return view('viewName', [
    'crudeSetup' => [(new \App\Engine\Crude\ListName)->getCrudeSetupData()]
]);
```

In view

```
@include('CrudeCRUD::start')
```

It works.

---

If model is related to files include, add in migration

```php
$table->text('files');
```

If model is related to map, add in migration

```php
$table->double('lat', 17, 14);
$table->double('lng', 17, 14);
$table->string('address');
```

also in view add (with your google api key)

```html
<script src="https://maps.googleapis.com/maps/api/js?key={GOOGLE_API_KEY}&libraries=places" async defer></script>
```


You can change attribute names in `resources/lang/en/validation.php` files

```php
'attributes' => [
    'id' => 'id attribute name'
],
```

To add ability to store, implement interface `CrudeStoreInterface`.

Setting title, types and columns

```php
$this->crudeSetup
    ->setTitle(trans('titles.admin_district'))
    ->setTypes(['province' => 'autocomplete'])
    ->setColumn(['id', 'name', 'province', 'points', 'created_at'])
    ;
```

To turn on validation, implement interface `CrudeWithValidationInterface`, use trait `CrudeWithValidationTrait` and define validation rules

```php
$this->setValidationRules([
    'name' => 'required',
    'province' => 'required'
]);
```

To update, implement interface `CrudeUpdateInterface`.

To delete, interface `CrudeDeleteInterface`.

To join data to list or add aliases to attribute names

```php
public function prepareQuery()
{
    return $this->model
        ->select(
            'districts.id',
            'districts.name',
            'districts.province',
            'districts.points',
            'districts.created_at',
            'districts.updated_at'
        );
}
```

List example:

![/wiki/en/examples/ordered_list/1.png](/wiki/en/examples/ordered_list/1.png "List")