Pierwsze kroki
===

Dodaj katalog `app/Engine/Crude`.

Dodaj nowy model wraz z migracją.
W katalogu `app/Engine/Crude` dodaj klasę definiującą nowa listę

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

W akcji w kontrolerze dodaj

```php
return view('viewName', [
    'crudeSetup' => [(new \App\Engine\Crude\ListName)->getCrudeSetupData()]
]);
```

A w samym widoku

```
@include('CrudeCRUD::start')
```

To działa!

---

Ustaw nazwy atrybutów w pliku `resources/lang/en/validation.php`

```php
'attributes' => [
    'id' => 'Id',
    'name' => 'Nazwa',
    ...
],
```

Ustaw tytuł i kolumny

```php
$this->crudeSetup
    ->setTitle(trans('titles.admin_district'))
    ->setColumn(['id', 'name', 'province', 'points', 'created_at'])
    ;
```

Włącz walidację dodając interface `CrudeWithValidationInterface`,
trait `CrudeWithValidationTrait` i ustalając reguły.

```php
$this->setValidationRules([
    'name' => 'required',
    'province' => 'required'
]);
```

Do uruchomienia akcji dodawania nowego elementu listy, wystarczy dodać interface `CrudeStoreInterface`. Aby umożliwić edycję, dodaj interface `CrudeUpdateInterface`. A w przypadku usuwania, interface `CrudeDeleteInterface`. Potrzebne metody znajdują się w trait `CrudeFromModelTrait`. Więcej w odpowiednich fragmentach tej dokumentacji.

Dodaj kwerę do ładowania danych listy

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

Przykład prostej listy:

![/wiki/en/examples/ordered_list/1.png](/wiki/en/examples/ordered_list/1.png "List")
