Uprawnienia
===

Do każdej akcji możesz ustawić dodatkowe uprawnienia, które będą sprawdzane przy ładowaniu listy oraz po próbie zapisu:
- `permissionStore($options)`,
- `permissionUpdate($model)`,
- `permissionDelete($model)`,
- `permissionView($model)`,
- `permissionOrder($options)`,
- `permissionExport($options)`.

Metody muszą zwracać wartość logiczną i tak będą interpretowane.

Przykłady:
```php

    // Domyślna postać, pokazuj wszystkie modele
    public function permissionView($model)
    {
        return true;
    }

    // Tylko administrator może dodawać elementy
    public function permissionStore($options)
    {
        return Auth::user()->isAdmin();
    }

    // Można edytować model, gdy użytkownik ma uprawnienie `updatePermission`
    public function permissionUpdate($model)
    {
        return Gate::allows('updatePermission', $model);
    }

    // Można usuwać model, gdy spełniony jest warunek
    public function permissionDelete($model)
    {
        return $model->modelDeleteCondition();
    }

```
