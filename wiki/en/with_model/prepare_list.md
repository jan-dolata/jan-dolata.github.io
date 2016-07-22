Prepare list
===

To filter or change list item, just overwrite the method `prepareQuery()`.
Method `prepareQuery()` should return query.

Example:
```php
    public function prepareQuery()
    {
        return $this->model->where('status', 'active')->select('id');
    }
```

To change collection or model, just overwrite methods:
- `formatCollection($collection)`,
- `formatModel($model)`.

Example:
```php
    public function formatModel($model)
    {
        $model->formated_name = $model->id . ': ' . $model->name;
        return $model;
    }
```
