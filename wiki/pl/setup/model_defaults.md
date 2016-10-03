Domyślne wartości modelu
===

Dla formularzu dodawania nowego elementu listy można ustawić domyślne wartości przez `setModelDefaults`.

```php
$this->crudeSetup->setModelDefaults('attr', 'default_value');
// lub
$this->crudeSetup->setModelDefaults([
    'attr_1' => 'default_value_1',
    'attr_2' => 'default_value_2'
]);
```
