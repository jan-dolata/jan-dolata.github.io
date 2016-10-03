Options
===

Abstrakcyjna klasa `CrudeOptions`

Klasa pomaga zarządzać opcjami w listach wyboru formularzy (typ select).

Metody:

- `public static function getOptions()`
- `public static function getLabel($name)`

Przykład:

Klasa ze statusami

```php
<?php
class BookType extends \CrudeOptions
{
    protected $optionsTrans = 'books.types';

    const TYPE_DRAMA = 'drama';
    const TYPE_COMEDY = 'comedy';
    const TYPE_HORROR = 'horror';
}
```

Etykiety dodano w pliku translacji 'books'

```php
return [
    'types' => [
        'drama' => 'Drama',
        'comedy' => 'Comedy',
        'horror' => 'Horror, S-F'
    ]
];
```

Rezultat `BookType::getOptions()`

```php
[
    [
        'id' => 'drama',
        'label' => 'Drama'
    ],
    [
        'id' => 'comedy',
        'label' => 'Comedy'
    ],
    [
        'id' => 'horror',
        'label' => 'Horror, S-F'
    ]
]
```
