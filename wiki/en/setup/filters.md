Filters
===

Filters attributes will fill list in search box under the table.
After `prepareCrudeSetup()` when `FromModelTrait` is used, filters have `'id'` attribute. Also, filters in result of `getCrudeSetupData()` will contain all column attributes.

Example:
```php
    $this->crudeSetup->resetFilters();
    // current filters: []
    $this->crudeSetup->setFilters('name');
    // current filters: ['name']
    $this->crudeSetup->setFilters(['email', 'phone']);
    // current filters: ['email', 'phone']
    $this->crudeSetup->setFilters(['email', 'phone', 'age', 'phone']);
    // current filters: ['email', 'phone', 'age']
    $this->crudeSetup->resetFilters(['id', 'name']);
    // current filters: ['id', 'name']
```

