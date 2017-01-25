Domyślne sortowanie listy
===

Aby zamienić domyślne sortowanie listy wykorzystaj metodę `setDefaultSort`

```php
// sortowanie rosnąco - 'asc'
$this->crudeSetup->setDefaultSort('nazwa_atrybutu');
// sortowanie malejąco - 'desc'
$this->crudeSetup->setDefaultSort('nazwa_atrybutu', false);
```
