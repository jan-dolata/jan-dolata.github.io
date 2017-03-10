Ukrywanie kolumn
===

Możliwe jest oznaczenie części kolumn, tak aby użytkownik mógł je odkrywać i zakrywać wedle uznania.

Do oznaczenia kolumn użyj metody `setExtraColumn(nazwa_kolumny, widoczność = false, opis = '')`

```php
$this->crudeSetup->setExtraColumn('nazwa_kolumny', true, 'opis');
// lub
$this->crudeSetup->setExtraColumn([
    ['nazwa_kolumny_1', true, 'opis_1'],  // odkryta z opisem
    ['nazwa_kolumny_2'],                  // zakryta bez opisu
    ['nazwa_kolumny_3', false, 'opis_3'], // zakryta z opisem
    ['nazwa_kolumny_4', true]             // odkryta bez opisu
]);
```
Wszystkie oznaczone kolumny muszą znajdować się w spisie kolumn.

Po oznaczeniu przynajmniej jednej kolumny, w prawym rogu nad listą pojawia się ikona zmiany widoczności kolumn. Ikonka otwiera modal ze spisem kolumn.

Przykład:
```php
// konstruktor listy
public function __construct()
{
    $this->setModel(new \App\Engine\Models\Book);
    $this
        ->prepareCrudeSetup()
        ->setTitle('Książki')
        ->setTrans([
            'id' => '#',
            'name' => 'Tytuł',
            'description' => 'Autor',
            'created_at' => 'Data dodania'
        ])
        ->setColumn([
            'id',
            'title',
            'author_name',
            'created_at'
        ])
        ->setExtraColumn([
            ['title', true],
            ['author_name', true, 'informacja edytowana w tabeli autorów'],
            ['created_at', false, 'data dodania pozycji do bazy danych']
        ])
        ->setColumnFormat([
            'title' => 'longtext',
            'author_name' => 'longtext',
        ])
        ;
}
```

![/wiki/pl/setup/extra_column/ec_1.png](/wiki/pl/setup/extra_column/ec_1.png "Po załadowaniu strony")

![/wiki/pl/setup/extra_column/ec_2.png](/wiki/pl/setup/extra_column/ec_2.png "Modal widoczności")

![/wiki/pl/setup/extra_column/ec_3.png](/wiki/pl/setup/extra_column/ec_3.png "Modal widoczności")

![/wiki/pl/setup/extra_column/ec_4.png](/wiki/pl/setup/extra_column/ec_4.png "Lista po zmianach")
