Custom Store / Update method
===

To change attributes before add or edit new model, just overwrite methods:
- `formatStoreAttributes($attributes)`,
- `formatUpdateAttributes($attributes)`.

Methods should return array with attributes.

Example:
```php
    public function formatStoreAttributes($attributes)
    {
        $attributes['author_id'] = Auth::check() ? Auth::user()->id : 0;
        return $attributes;
    }
```

To add some custom action after store / update, just overwrite methods:
- afterStore($model, $attributes)
- afterUpdate($model, $attributes)

To change all add or edit action, just overwrite methods:
- `store($attributes)`,
- `updateById($id, $attributes)`.

*Methods `formatStoreAttributes`, `formatUpdateAttributes`, `afterStore` and `afterUpdate` are used in parent `store` and `updateById` (will not be automatically triggered if you overwrite `store` or `updateById`).*

Example:
```php
    public function store($attributes)
    {
        $model = $this->model->findByName($attributes['name']);

        if ($model == null)
            $model = $this->model->create($attributes);

        return $this->getById($model->id);
    }
```
