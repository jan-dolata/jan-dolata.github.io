Mapa
===

Modele listy mogą przechowywać lokalizację wybieraną na mapie googla.

W widoku z listą wklej poniższy kod (wraz z twoim kluczem do api google)

```html
<script src="https://maps.googleapis.com/maps/api/js?key={GOOGLE_API_KEY}&libraries=places" async defer></script>
```

Tabela bazy powiązana z modelem powinna zawierać kolumny `map_lat` i `map_lng`:

```php
// fragment migracji
$table->double('map_lat', 17, 14);
$table->double('map_lng', 17, 14);
// opcjonalne
$table->string('map_address');
$table->string('map_province');
$table->string('map_locality');
$table->string('map_postal_code');
```

Po wykryciu kolumn `map_lat` i `map_lng`, automatycznie:
* pole `map_lat`, `map_lng`, `map_address`, `map_province`, `map_locality`, `map_postal_code` zostanie usunięte z formularza edycji i dodawania,
* zostanie włączony moduł z mapą umożliwiający wybranie lokalizacji (zawiera wyszukiwarkę),
* w akcjach po prawej stronie wiersza listy, dodana zostanie ikona otwierania modułu,
* w razie braku markera, mapa będzie centrowana w punkcie definiowanym w `mapCenter` w `config/crude.php`.
