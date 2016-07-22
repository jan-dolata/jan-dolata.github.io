Options
===

Abstract class `CrudeOptions`

Organise select input options.

Methods:

- `public static function getOptions()`
- `public static function getLabel($name)`

Example:

Status option class

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

Trans file 'books'

```php
return [
    'types' => [
        'drama' => 'Drama',
        'comedy' => 'Comedy',
        'horror' => 'Horror, S-F'
    ]
];
```

`BookType::getOptions()` result

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
