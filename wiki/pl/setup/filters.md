Filtry
===

Filtry to lista atrybutów obok wyszukiwarki w lewym dolnym rogu tabeli. Po wywołaniu `prepareCrudeSetup()` z traitem `FromModelTrait`, filtry zawierają domyślnie `’id’`.
Filtry w parametrach w `getCrudeSetupData()` zawierają również atrybuty z kolumn.

Przykład:
```php
    $this->crudeSetup->resetFilters();
    // obecne filtry: []
    $this->crudeSetup->setFilters('name');
    // obecne filtry: ['name']
    $this->crudeSetup->setFilters(['email', 'phone']);
    // obecne filtry: ['email', 'phone']
    $this->crudeSetup->setFilters(['email', 'phone', 'age', 'phone']);
    // obecne filtry: ['email', 'phone', 'age']
    $this->crudeSetup->resetFilters(['id', 'name']);
    // obecne filtry: ['id', 'name']
```
