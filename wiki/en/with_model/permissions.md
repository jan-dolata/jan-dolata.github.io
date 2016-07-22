Permissions
===

To change model permission, just overwrite methods:
- `permissionStore($options)`,
- `permissionUpdate($model)`,
- `permissionDelete($model)`,
- `permissionView($model)`,
- `permissionOrder($options)`,
- `permissionExport($options)`.

Methods should return boolean.

```php

    // Show all model on list
    public function permissionView($model)
    {
        return true;
    }

    // Only admin can add new model
    public function permissionStore($options)
    {
        return Auth::user()->isAdmin();
    }

    // Can edit model when user have `updatePermission`
    public function permissionUpdate($model)
    {
        return Gate::allows('updatePermission', $model);
    }

    // Can remove model whit condition
    public function permissionDelete($model)
    {
        return $model->modelDeleteCondition();
    }

```

