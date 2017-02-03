Formatowanie kolumn
===

## Typy

* text - domyślny - 20 znaków dla string’ów lub liczba elementów dla tablic
* longtext - wyświetla pełny tekst dla string’ów
* link
* bool - Tak / Nie
* files - lista plików

## Ustawienia

Do zmiany formatowania kolumny służy metoda `$this→crudeSetup→setColumnFormat()`, którą powinieneś wykorzystać w konstruktorze.

```php
$this->crudeSetup->setColumnFormat('first_name', 'longtext');
// lub
$this->crudeSetup->setColumnFormat([
    'first_name' => 'longtext',
    'last_name' => 'longtext',
    'is_admin' => 'bool'
]);
// lub
->setColumnFormat([
    'first_name' => [
        'type' => 'link',
        'url' => route('user_profile'),  // url
        'attr' => 'id'                   // atrybut modelu doklejany na końcu adresu
    ]
])
```
