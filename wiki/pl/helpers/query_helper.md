Query helper
===

Klasa `CrudeQueryHelper`

Metody:

- `public static function join(&$query, $table, $tableKey, $tableToJoin, $tableToJoinKey)` - join left ze sprawdzaniem deleted_at
- `public static function joinAndCount(&$query, $table, $tableKey, $tableToJoin, $tableToJoinKey, $countName = null)` - dodaje join i parametr z licznikiem count w select (domyślna nazwa licznika to 'num_' . $tableToJoin)

Przykłady:

```php
$query = (new Book)
    ->select(
        'books.id',
        'books.title',
        'authors.name as author_name'
    );

CrudeQueryHelper::join($query, 'books', 'author_id', 'authors', 'id');
CrudeQueryHelper::joinAndCount($query, 'books', 'id', 'reviews', 'book_id');

$books = $query->get();

// models in $books collection, have 4 attributes
// id, title, author_name, num_reviews
```
