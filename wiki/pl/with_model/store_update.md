Nadpisywanie domyślnych metod Dodawania i Edycji modelu
===

Aby poprawić przesłane do api atrybuty modelu, dodaj i wypełnij jedną z metod:
- `formatStoreAttributes($attributes)`,
- `formatUpdateAttributes($attributes)`.
Metoda musi zwracać liste atrybutów.

Przykład:
```php
    public function formatStoreAttributes($attributes)
    {
        $attributes['author_id'] = Auth::check() ? Auth::user()->id : 0;
        return $attributes;
    }
```

Aby wykonać coś po zapisie, dodaj i wypełnij jedną z metod:
- `afterStore($model, $attributes)`,
- `afterUpdate($model, $attributes)`.

Jeżeli chcesz poprawić całą metodę dodawania lub edycji, nadpisz odpowiednio:
- `store($attributes)`,
- `updateById($id, $attributes)`.
Metody powinny zwracać model, zgodny z listą, więc najlepiej użyć `$this->getById($id)`.

*Metody `formatStoreAttributes`, `formatUpdateAttributes`, `afterStore` i `afterUpdate` są użyte w domyślnej postaci `store` i `updateById`, więc nie będą automatycznie wywoływane, jeżeli nadpiszesz `store` i `updateById`.*

Przykład:
```php
    public function store($attributes)
    {
        $model = $this->model->findByName($attributes['name']);

        if ($model == null)
            $model = $this->model->create($attributes);

        return $this->getById($model->id);
    }
```
