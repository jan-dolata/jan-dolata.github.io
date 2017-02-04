Mapa
===

Modele listy mogą przechowywać lokalizację wybieraną na mapie googla.

W widoku z listą wklej poniższy kod (wraz z twoim kluczem do api google)

```html
<script src="https://maps.googleapis.com/maps/api/js?key={GOOGLE_API_KEY}&libraries=places" async defer></script>
```

Tabela bazy powiązana z modelem powinna zawierać trzy kolumny.

```php
// fragment migracji
$table->double('lat', 17, 14);
$table->double('lng', 17, 14);
$table->string('address');
```

Po wykryciu wskazanych kolumn, automatycznie:
* pole `lat`, `lng`, `address` zostanie usunięte z formularza edycji i dodawania,
* zostanie włączony moduł z mapą umożliwiający wybranie lokalizacji (zawiera wyszukiwarkę),
* w akcjach po prawej stronie wiersza listy, dodana zostanie ikona otwierania modułu,
* w domyślnych wartościach modelu znajdą się wartości z `mapDefaults` ustawione w `config/crude.php`.
