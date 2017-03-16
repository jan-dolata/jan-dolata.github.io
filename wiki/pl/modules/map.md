Mapa
===

Modele listy mogą przechowywać lokalizację wybieraną na mapie googla.

Dodaj klucz google api w `.env` w `GOOGLE_API_KEY` lub w `config/crude.php` w `googleApiKey`.

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

---

Po przekazaniu setup do widoku przez `crudeMap`, wyświetlona zostanie mapa ze wszystkimi lokalizacjami z bazy. Widok ma włączone specjalne filtry (richFilters), a w tooltipie markera wyświetlają się wszystkie wartości zdefiniowane w `setColumn`.

Przykład:

Fragment `__construct` w crude Partner:
```php
$this->crudeSetup
    ->setTitle(Partnerzy)
    ->setTrans([
        'id' => 'Id',
        'name' => 'Nazwisko',
        'province' => 'Województwo'
    ])
    ->setColumn([
        'id',
        'name'
        'province'
    ])
    ->setRichFilters([
        ['byProvince', 'Województwo', 'select', ProvincesOptions::getOptions()]
    ]);
```

Akcja w kontrolerze:
```php
public function partnersMap()
{
    return view('admin.start', [
        'crudeMap' => [CrudeMagic::view('Partner')]
    ]);
}
```

Rezultat:
![/wiki/pl/modules/map/map_1.png](/wiki/pl/modules/map/map_1.png "Widok mapy")
