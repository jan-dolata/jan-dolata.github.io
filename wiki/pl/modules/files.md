Pliki
===

Aby włączyć opcje przechowywania plików, klasa listy musi rozszerzać interface `\CrudeWithFileInterface`. Potrzebne metody znajdują się w trait’ie `\CrudeWithFileTrait`.

Tabela bazy powiązana z modelem powinna zawierać kolumnę typu `text` o nazwie `files`.

```php
\\ fragment migracji
$table->text('files');
```

W  `$casts` modelu powinno znaleźć się `'thumbnail' => array`.

Po dodaniu kolumny i podpięciu `\CrudeWithFileTrait`, automatycznie:
* pole `files` zostanie usunięte z formularza edycji i dodawania,
* zostanie włączony moduł z dropzone umożliwiający przesyłanie plików,
* w akcjach po prawej stronie wiersza listy, dodana zostanie ikona otwierania modułu,
* kolumna `files` będzie zawierać listę plików z możliwością pobrania paczki zip (template `crude_filesColumnFormatTemplate`).

W metodach pomocniczych znajdziesz klasę `CrudeFiles` do uploadu, przydatną do obsługi plików pomijając główne api.
