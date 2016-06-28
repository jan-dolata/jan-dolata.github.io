### Column

Select which attributes are displayed in the list and in what order.

Example:
```php
    $this->crudeSetup
        ->setColumn(['id', 'name', 'email', 'created_at']);
```

Attributes of the columns can be placed one above the other.

Example:
```php
    $this->crudeSetup
        ->setColumn(['id', ['name', 'email'], 'created_at']);
```

The list can be sorted by all the attributes in columns. Make sure you set up the scope array.

Example:
```php
    public function __construct()
    {
        ...
        $this->crudeSetup->setColumn(['id', 'title', 'owner_name']);
        ...
    }

    public function prepareQuery()
    {
        $this->setScope([
            'owner_name' => 'users.name'
        ]);

        return $this->model
            ->leftJoin('users', 'books.owner_id', '=', 'users.id')
            ->select('books.id', 'books.title', 'users.name as owner_name');
    }
```

If you want to change the pre-set columns pass a new array,
or use methods to `hideColumn`.

Example:
```php
    $this->crudeSetup->setColumn(['id', ['name', 'email'], 'created_at']);
    // current column: ['id', ['name', 'email'], 'created_at']
    $this->crudeSetup->hideColumn('id');
    // current column: [['name', 'email'], 'created_at']
    $this->crudeSetup->hideColumn(['email', 'created_at']);
    // current column: ['name']
```

To get current column attributes use `getColumn` or `getColumnAttr`.

Example:
```php
    $this->crudeSetup->setColumn(['id', ['name', 'email'], 'name']);
    $attr = $this->crudeSetup->getColumn();
    // $attr =  ['id', ['name', 'email'], 'name']
    $attr = $this->crudeSetup->getColumnAttr();
    // $attr = ['id', 'name', 'email']
```