Model defaults
===

Change the default values in the form of adding.

In crude class construct use `setModelDefaults`.

```php
$this->crudeSetup->setModelDefaults('attr', 'default_value');
```

or

```php
$this->crudeSetup->setModelDefaults([
    'attr_1' => 'default_value_1',
    'attr_2' => 'default_value_2'
]);
```
