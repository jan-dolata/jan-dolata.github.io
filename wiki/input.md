# Inputs

## Dostępne typy pól

* text - domyślne
* number
* textarea
* info - pole z atrybutem 'readonly'
* checkbox
* datetime - wykorzystane bootstrap-datetimepicker
* autocomplete - wykorzystane jquery-ui
* select

## Usage

Aby zmienić typ użyj `$this->crudeSetup->setTypes()` w `__construct` klasy crude

```
$this->crudeSetup->setTypes('first_name', 'text');
```

lub

```
$this->crudeSetup->setTypes([
    'last_name' => 'text',
    'points' => 'number',
    'date' => 'datetime',
    'is_active' => 'checkbox'
]);
```

lub

```
$this->crudeSetup->setTypesGroup('text', ['first_name', 'last_name']);
```

lub

```
$this->crudeSetup->setTypesGroup([
    'text' => ['first_name', 'last_name'],
    'number' => 'points'
]);
```

Dla pola typu `select` dodaj opcje

```
$this->crudeSetup
    ->setTypes('status', 'select')
    ->setSelectOptions(
        'status',
        [
            ['id' => 'new', 'label' => 'New'],
            ['id' => 'public', 'label' => 'Public']
        ]
    );
```

lub

```
$this->crudeSetup
    ->setTypes('status', 'select')
    ->setSelectOptions([
        'status' => [
            ['id' => 'new', 'label' => 'New'],
            ['id' => 'public', 'label' => 'Public']
        ]
    ]);
```

Dla pola typu `autocomplete` dodaj dwie metody

```
public function autocompleteAttrName($term)
{
    return (new \App\ModelName)
        ->where('label_attr_name', 'like', '%' . $term . '%')
        ->select(
            'attr_name_in_model' as 'id',
            'label_attr_name' as 'label'
        )
        ->take(10)
        ->get();
}

public function labelAttrName($id)
{
    $label = (new \App\ModelName)
        ->where('attr_name', $id)
        ->value('label_attr_name');

    return empty($label) ? '' : $label;
}
```

Przykład:
```
public function autocompleteBookId($term)
{
    return (new \App\Book)
        ->where('title', 'like', '%' . $term . '%')
        ->select(
            'id' as 'id',
            'title' as 'label'
        )
        ->take(10)
        ->get();
}

public function labelAttrName($id)
{
    $label = (new \App\Book)
        ->where('id', $id)
        ->value('title');

    return empty($label) ? '' : $label;
}
```

