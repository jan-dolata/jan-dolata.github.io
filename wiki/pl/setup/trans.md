Etykiety atrybutów
===

Domyślnie, etykiety atrybutów pobierane są z pliku `resources/lang/en/validation.php`.

```php
'attributes' => [
    'id' => 'ID',
    'created_at' => 'Data dodania',
    'updated_at' => 'Data zmiany',
    ...
]
```

Możesz także przekazać dowolne nazwy przy pomocy `setTrans`

```php
$this->crudeSetup
    ->setTrans('id', 'ID')
    ->setTrans([
        'name' => 'Nazwa',
        'created_at' => 'Data dodania'
    ]);
```
