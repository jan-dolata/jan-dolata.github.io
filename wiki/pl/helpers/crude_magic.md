Magic
===

Pomocnicza metoda do tworzenia instancji listy.

Metody:
* `public static function make($crudeName, $attr = null, $value = null)` - zwraca instancję klasy
* `public static function view($crudeName, $attr = null, $value = null)` - zwraca dane do widoku.

Dane z `$attr` i `$value` są zapisywane przy pomocy `CrudeData`.

Przykład:
```php
\\ fragment kontrolera
public function listsView()
{
    return view('start', [
        'crudeSetup' => [
            \CrudeMagic::view('Lista1'),
            \CrudeMagic::view('Lista2', 'title', 'Lista druga'),
            \CrudeMagic::view('Lista3', [
                'title' => 'Lista trzecia',
                'description' => 'Opis listy trzeciej'
            ])
        ]
    ]);
}
```

```php
class Lista3 extends \Crude implements \CrudeListInterface {

    use \CrudeFromModelTrait;

    public function __construct()
    {
        $this->setModel(new \App\Engine\Models\Model3);

        $this->prepareCrudeSetup();

        $this->crudeSetup
            ->setTitle( $this->getCrudeData('title')  )
            ->setDescription( $this->getCrudeData('description') )
            ;
    }
}
```
