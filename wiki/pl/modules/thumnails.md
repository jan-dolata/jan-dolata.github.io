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

W ` CrudeWithThumbnailTrait` znajdują się dwie metody do zmiany domyślnych rozmiarów miniatur (domyślnie 300x300):
* `setThumbnailWidth($width)`
* `setThumbnailHeight($height)`

---

Metoda `setThumbnailAction` wyświetla ikonę i moduł dodawania i edycji miniatur
```php
$this->crudeSetup->setThumbnailAction();
```

Metoda `setThumbnailColumns` umożliwia ustawienie nazw kolumn przetrzymujących miniatury,

```php
$this->crudeSetup->setThumbnailColumns('nazwa_kolumny');
\\ lub
$this->crudeSetup->setThumbnailColumns(['nazwa_kolumny_1', 'nazwa_kolumny_2']);
```

Domyślną wartością jest `thumbnail`. Wywołanie metody nadpisuje wcześniejsze wartości.
