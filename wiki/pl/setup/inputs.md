Inputy (pola formularza)
===

## Typy

* text - domyślny
* number
* textarea
* info - text z 'readonly'
* checkbox
* datetime - wykorzystuje bootstrap-datetimepicker
* autocomplete - wykorzystuje jquery-ui
* select
* json
* markdown - pod polem wyświetla się podgląd

## Użytkowanie

Do powiązania pól i typów przygotowano metodę `setTypes` i `setTypesGroup`, którą powinno się dodać w konstruktorze.

```php
$this->crudeSetup->setTypes('first_name', 'text');
// lub
$this->crudeSetup->setTypes([
    'last_name' => 'text',
    'points' => 'number',
    'date' => 'datetime',
    'is_active' => 'checkbox'
]);
// lub
$this->crudeSetup->setTypesGroup('text', ['first_name', 'last_name']);
// lub
$this->crudeSetup->setTypesGroup([
    'text' => ['first_name', 'last_name'],
    'number' => 'points'
]);
```

Dla pól z typem `select` dodaj opcje

```php
$this->crudeSetup
    ->setTypes('status', 'select')
    ->setSelectOptions('status', [
        ['id' => 'new', 'label' => 'Nowy'],
        ['id' => 'public', 'label' => 'Publiczny']
    ]);
// lub
$this->crudeSetup
    ->setTypes('status', 'select')
    ->setSelectOptions([
        'status' => [
            ['id' => 'new', 'label' => 'Nowy'],
            ['id' => 'public', 'label' => 'Publiczny']
        ]
    ]);
```

Dla pól z typem `autocomplete` potrzebne będzie dodanie dwóch metod

```php
public function autocompleteAttrName($term)
{
    return (new \App\ModelName)
        ->where('label_attr_name', 'like', '%' . $term . '%')
        ->select(
            'atrybut_w_modelu as id',
            'etykieta_atrybutu as label'
        )
        ->take(10)
        ->get();
}

public function labelAttrName($id)
{
    $label = (new \App\ModelName)
        ->where('atrybut_w_modelu', $id)
        ->value('etykieta_atrybutu');

    return empty($label) ? '' : $label;
}
```

Dla pól z typem `datetime` możesz dodać opcje

```php
$this->crudeSetup
    ->setDateTimePickerOptions('format', 'YYYY-MM-DD');
// lub
$this->crudeSetup
    ->setSelectOptions([
        'format' => 'YYYY-MM-DD',
        'defaultDate' => '2016-11-30'
    ]);
```

Domyślne ustwaienia to

```
'language' => 'pl',
'format' => 'YYYY-MM-DD hh:mm:00',
'pickerPosition' => "bottom-left",
'pickSeconds' => true,
'icons' => [
    'time'  => "fa fa-clock-o",
    'date'  => "fa fa-calendar",
    'up'    => "fa fa-arrow-up",
    'down'  => "fa fa-arrow-down"
]
```
