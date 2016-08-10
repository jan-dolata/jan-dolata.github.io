Title and attributes names
===

To set up title use `setTitle` in crude class construct.

```
$this->crudeSetup->setTitle('List');
```

Change default attribute names in `resources/lang/en/validation.php` files.

```php
    'attributes' => [
        'id' => 'ID',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        ...
    ]
```

or add custome attributes name

```php
    $this->crudeSetup
        ->setTrans('id', 'ID')
        ->setTrans([
            'name' => 'First name',
            'created_at' => 'Start date'
        ]);
```