Kolumny
===

Ustal, które wartości i w jakiej kolejności mają wyświetlać się na liście.

Przykład:
```php
    $this->crudeSetup->setColumn(['id', 'name', 'email', 'created_at']);
```

W jednej kolumnie można wyświetlać kilka wartości.

Przykład:
```php
    $this->crudeSetup->setColumn(['id', ['name', 'email'], 'created_at']);
```

---

Dla każdego wybranego atrybutu istnieje możliwość sortowania listy.

*Jeżeli atrybut nie pochodzi z głównej tabeli lub dodałeś do niego alias, sortowanie będzie przeprowadzone na znalezionej kolekcji, co jest wolniejsze niż sortowanie w sql. Aby to poprawić wykorzystaj `scope`. Przykład:*
```php
    public function __construct()
    {
        ...
        $this->crudeSetup->setColumn(['id', 'title', 'owner_name']);
        ...
    }

    public function prepareQuery()
    {
        $this->scope['owner_name'] = 'users.name';

        return $this->model
            ->leftJoin('users', 'books.owner_id', '=', 'users.id')
            ->select('books.id', 'books.title', 'users.name as owner_name');
    }
```

*Tak przygotowana lista sortuje się po `owner_name` przy użyciu sql.*

---

Istnieje możliwość ukrycia kolumn po ich zdefiniowaniu, wystarczy wykorzystać metodę `hideColumn`.

*Przydatne gdy lista wyświetlana jest dla użytkowników o różnych uprawnieniach, lub list wykorzystanych w różnych kontekstach.*

Przykład:
```php
    $this->crudeSetup->setColumn(['id', ['name', 'email'], 'created_at']);
    // aktualna lista kolumn: ['id', ['name', 'email'], 'created_at']
    $this->crudeSetup->hideColumn('id');
    // aktualna lista kolumn: [['name', 'email'], 'created_at']
    $this->crudeSetup->hideColumn(['email', 'created_at']);
    // aktualna lista kolumn: ['name']
```

---

Pobranie ustawionych atrybutów możliwe przez dwie metody: `getColumn` i `getColumnAttr`.

Przykład:
```php
    $this->crudeSetup->setColumn(['id', ['name', 'email'], 'name']);
    $attr = $this->crudeSetup->getColumn();
    // $attr =  ['id', ['name', 'email'], 'name']
    $attr = $this->crudeSetup->getColumnAttr();
    // $attr = ['id', 'name', 'email']
```
