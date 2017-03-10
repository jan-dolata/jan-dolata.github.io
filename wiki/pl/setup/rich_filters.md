Filtry specjalne
===

Filtry specjalne to zestaw pól, wyświetlanych nad listą, pozwalających filtrować kolekcję przez zdefiniowane metody.

---

Aby dodać filtr należy wywołać metodę `setRichFilters`:

```php
$this->crudeSetup
    ->setRichFilters('nazwaFiltra', 'Etykieta', 'typFiltra', $opcjeFiltra);
    // gdzie 'typFiltra' jest opcjonalne, domyślnie input type='text'
```

Możliwe jest też zdefiniowanie kilku filtrów jednocześnie

```php
$this->crudeSetup
    ->setRichFilters([
        'nazwaFiltra1',
        ['nazwaFiltra2', 'Etykieta2', 'typFiltra2'],
        ['nazwaFiltra3', 'Etykieta3'],
        ['nazwaFiltra4', 'Etykieta4', 'typFiltra4', $opcjeFiltra4],
        ...
    ]);
```

*Uwaga: wywołanie `setRichFilters` ukrywa "proste" filtry pod listą, można je odkryć wywołując `$this->crudeSetup->showFilters()`.*

---

Od v1.1.6 filtry są domyślnie ukryte. W prawym górnym rogu pojawi się lista, w której możemy wybrać który filtr ma zostać pokazany.

Wartości filtrów trafiają do # adresu url. Po załadowaniu takiego adresu, wszystkie wskazane filtry zostaną odkryte i wypełnione, a lista odpowiednio przefiltrowana.

---

Typy filtrów:
* text (domyślna wartość) - input type='text'
* number - input type='number'
* datetime - input z datetimepicker, w opcjach można zdefiniować parametry datepickera, np: format
* select - select, w opcjach należy przekazać listę opcji [['id' => 1, 'label' => 'etykieta 1', ... ]] (podobnie jak przy `setSelectOptions`)

---

Po umieszczeniu filtra, należy dodać jedną z metod:
* `public function richFiltersOnQuery($query, $richFilters)`
* `public function richFiltersOnCollection($collection, $richFilters)`

Metody powinny zwracać odpowiednio kwerę lub kolekcję.
W parametrze `$richFilters` otrzymujemy listę wartości dla wypełnionych filtrów.

---

Przykład:
```php
class BooksList extends \Crude implements \CRUDInterface
{
    use \CrudeFromModelTrait;

    public function __construct()
    {
        $this->setModel(new \App\Models\Book);

        $this->prepareCrudeSetup();

        $this->crudeSetup
            ->setTitle('Lista książek')
            ->setRichFilters([
                ['id', 'Id', 'number'],
                ['title', 'Tytuł', 'text'],
                ['minNumPages', 'Liczba stron', 'number'],
                ['author', 'Autor']
            ]);
    }

    public function prepareQuery()
    {
        return $this->model
            ->leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->select(
                'books.title',
                'books.num_pages',
                'books.rank',
                'authors.first_name as author_first_name',
                'authors.last_name as author_last_name'
            );
    }

    public function formatModel($model)
    {
        $model->author_full_name = $model->author_first_name . ' ' . $model->author_last_name;

        return $model;
    }

    // dla parametrów dla których można dodać filtr do kwery z prepareQuery
    public function richFiltersOnQuery($query, $richFilters)
    {
        // parametr nie znajduje się w tablicy jeśli pole filtra jest puste
        if (isset($richFilters['title']))
            $query = $query->where('books.title', 'like', "%{$richFilters['title']}%");

        if (isset($richFilters['minNumPages']))
            $query = $query->where('books.num_pages', '>=', $richFilters['minNumPages']);

        return $query;
    }

    public function richFiltersOnCollection($collection, $richFilters)
    {
        return $collection->filter(function ($model) use ($richFilters) {
            $onCollection = true;

            // filtrowanie typu 'like' na kolekcji,
            // zauważ, że przedstawiony filtr nie może działać w oparciu o kod
            // w `richFiltersOnQuery` ponieważ jest dodawany w `formatModel`
            // już po zamknięciu zapytania do bazy
            if (isset($richFilters['author'])) {
                $value = (string) $model->author_full_name;
                $value = strtolower($value);
                $search = strtolower($richFilters['author']);

                $onCollection = $onCollection && strpos($value, $search) !== false;
            }

            // ten filtr możne działać na `richFiltersOnQuery` lub tutaj
            if (isset($richFilters['id']))
                $onCollection = $onCollection && ($model->id >= (int)$richFilters['id']);

            return $onCollection;
        });
    }
}
```

![/wiki/pl/setup/rich_filters/1.png](/wiki/pl/setup/rich_filters/1.png "Przykład 1")

![/wiki/pl/setup/rich_filters/2.png](/wiki/pl/setup/rich_filters/2.png "Przykład 2")
