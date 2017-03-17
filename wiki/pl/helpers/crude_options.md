Options
===

Abstrakcyjna klasa `CrudeOptions`

Klasa pomaga zarządzać opcjami w listach wyboru formularzy (typ select), oraz przy wyświetlaniu statusów.

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

    // opcjonalne,
    // wykorzystywane przy formatowaniu kolumny stylem 'status'
    // domyślne wartości {'#92C9E3', '#FFE5A0', '#9CA5E7', '#FFD3A0'}
    protected $colors = [
        'drama' => '#abc',
        'comedy' => '#cba',
        'horror' => '#bca'
    ];
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
        'label' => 'Drama',
        'color' => '#abc'
    ],
    [
        'id' => 'comedy',
        'label' => 'Comedy',
        'color' => '#cba'
    ],
    [
        'id' => 'horror',
        'label' => 'Horror, S-F',
        'color' => '#bca'
    ]
]
```
