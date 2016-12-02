Przygotowanie listy (nadpisywanie prepareQuery)
===

W metodzie `prepareQuery` możesz nadpisać domyślne zapytanie, dodać „joiny”, filtry i aliasy attrybutów. Metoda musi zwracać zapytanie sql.

Przykład:
```php
public function prepareQuery()
{
    return $this->model->where('status', 'active')->select('id');
}
```

Możesz też poprawiać elementy kolekcji zwracanej przez api (już po wywołaniu zapytania przez api).
Wystarczy nadpisać odpowiednio:
- `formatCollection($collection)`,
- `formatModel($model)`.

Przykład:
```php
public function formatModel($model)
{
    $model->formatted_name = $model->id . ': ' . $model->name;
    return $model;
}
```
