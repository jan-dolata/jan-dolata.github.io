Query helper
===

Class `CrudeQueryHelper`

Methods:

- `public static function join(&$query, $table, $tableKey, $tableToJoin, $tableToJoinKey)`` - join left with deleted_at check
- `public static function joinAndCount(&$query, $table, $tableKey, $tableToJoin, $tableToJoinKey, $countName = null)` - join and add count to select (default count param name is 'num_' . $tableToJoin)

Example:

```php
    $query = (new Book)
        ->select(
            'books.id',
            'books.title',
            'authors.name as author_name'
        );

    QueryHelper::join($query, 'books', 'author_id', 'authors', 'id');
    QueryHelper::joinAndCount($query, 'books', 'id', 'reviews', 'book_id');

    $books = $query->get();

    // models in $books collection, have 4 attributes
    // id, title, author_name, num_reviews
```
