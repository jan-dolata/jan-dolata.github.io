Miniatury
===

Aby włączyć opcje przechowywania miniatur, klasa listy musi rozszerzać interface `\CrudeWithThumbnailInterface`. Potrzebne metody znajdują się w trait'ie `\CrudeWithThumbnailTrait`.

Musisz też doinstalować paczkę `"intervention/image": "^2.3"`

```
composer require  intervention/image
```

Tabela bazy powiązana z modelem powinna zawierać kolumnę typu `text`

```php
\\ fragment migracji
$table->text('thumbnail')->nullable();
```

W  `$casts` modelu powinno znaleźć się `'thumbnail' => array`.

---

Metoda `setThumbnailAction` wyświetla ikonę i moduł dodawania i edycji miniatur
```php
$this->crudeSetup->setThumbnailAction();
```

Metoda `setThumbnailColumns` umożliwia ustawienie nazw kolumn przetrzymujących miniatury i ich rozmiarów (domyślnie 300 x 300),

```php
$this->crudeSetup->setThumbnailColumns('miniatura_300_300');
\\ lub
$this->crudeSetup->setThumbnailColumns(['miniatura_2_300_300', 'miniatura_3_300_300']);
\\ lub
$this->crudeSetup->setThumbnailColumns([
    'miniatura_4_300_300',
    ['miniatura_5_100_200', 100, 200]
]);
```

Domyślną wartością jest `thumbnail`. Wywołanie metody nadpisuje wcześniejsze wartości.
