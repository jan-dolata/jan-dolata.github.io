Formatowanie kolumn
===

## Typy

* **default** - domyślny, rozpoznaje typ danych:
    + email - **mailto**
    + link - **href**
    + tekst - **text**
    + tablica - **object**
* **mailto** - link typu mailto
* **href** - zwykły link
* **text** - skraca tekst do 20 znaków, całość w podglądzie po kliku,
* **longtext** - wyświetla pełny tekst
* **object** - wyświetla początek tablicy (20 znaków), reszta w podglądzie po kliku,
* **link** - generuje link na podstawie podanego url i atrybutu,
* **bool** - Tak / Nie
* **files** - lista plików z możliwością pobrania (domyślne dla pola `files`),
* **status** - kolorowa etykieta ze wskazaną opcją,
* **number** - formatuje liczby (1 234 567.89)
* **integer** - formatuje liczby (1 234 567)

## Ustawienia

Do zmiany formatowania kolumny służy metoda `$this->crudeSetup->setColumnFormat()`, którą powinieneś wykorzystać w konstruktorze.

```php
$this->crudeSetup->setColumnFormat('first_name', 'longtext');
// lub
$this->crudeSetup->setColumnFormat([
    'first_name' => 'longtext',
    'last_name' => 'longtext',
    'is_admin' => 'bool',
    'points' => 'number'
]);
// lub
$this->crudeSetup->setColumnFormat([
    'first_name' => [
        'type' => 'link',
        'url' => route('user_profile'),  // url
        'attr' => 'id'                   // atrybut modelu doklejany na końcu adresu
    ],
    'task_status' => [
        'type' => 'status',
        'options' => [                   // zobacz 'Metody pomocnicze / Options'
            [
                'id' => 'new',
                'label' => 'Nowy',
                'color' => '#abcabc'
            ],
            [
                'id' => 'accepted',
                'label' => 'Zaakceptowane',
                'color' => '#bcdbcd'
            ],
            [
                'id' => 'rejected',
                'label' => 'Odrzucone',
                'color' => '#cdecde'
            ]
        ]
    ]
])
```
